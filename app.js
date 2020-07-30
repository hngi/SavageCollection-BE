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
const upload = require("./routes/upload");

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

// // view engine setup
// app.set("views", path.join(__dirname, "views"));
// app.set("view engine", "jade");

//morgan middleware for logging
app.use(logger("dev"));

//body-parser middleware for url endoded data and json data
app.use(bodyParser.urlencoded({ extended: false }));
app.use(bodyParser.json());

//routes
app.use(login);
app.use(register);
app.use(user);
app.use(upload);

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
  res.render("error");
});

module.exports = app;
