const createError = require("http-errors");
const express = require("express");
const path = require("path");
const logger = require("morgan");
const mongoose = require("mongoose");
const bodyParser = require("body-parser");
const cors = require("cors");
require("dotenv").config();
const { MONGO_URI } = process.env;

const login = require("./routes/login");
const register = require("./routes/register");
const user = require("./routes/users");
const changePassword = require("./routes/changePassword");

const app = express();
app.use(cors());

//database code
mongoose
  .connect(MONGO_URI, {
    useNewUrlParser: true,
    useUnifiedTopology: true,
    useCreateIndex: true,
  })
  .catch((err) => console.error(err));
mongoose.Promise = global.Promise;
mongoose.connection
  .on("connected", () => {
    console.log("mongoose connection open");
  })
  .on("error", (error) => {
    console.log(`connection error ${error.message}`);
  });

//morgan middleware for logging
app.use(logger("dev"));

//to make the uploads folder publicly accessible
app.use("/uploads", express.static("uploads"));

//body-parser middleware for url endoded data and json data
app.use(bodyParser.urlencoded({ extended: true }));
app.use(bodyParser.json());

//routes
app.use(login);
app.use(register);
app.use(user);
app.use(changePassword);

// view engine setup
app.set("views", path.join(__dirname, "views"));
app.set("view engine", "ejs");

app.use(express.static(path.join(__dirname, "public")));
app.use("/css", express.static(path.join(__dirname, "/public/stylesheets")));
app.use("/js", express.static(path.join(__dirname, "/public/javascripts")));
app.use("/img", express.static(path.join(__dirname, "/public/images")));

// catch 404 and forward to error handler
app.use(function (req, res, next) {
  next(createError(404));
});

// error handler
app.use(function (err, req, res, next) {
  // set locals, only providing error in development
  res.locals.message = err.message;
  res.locals.error = req.app.get("env") === "development" ? err : {};

  // render the error page
  res.status(err.status || 500);
  res.json({
    message: err.message,
    error: err,
  });
});

module.exports = app;
