const UserModel = require("../models/users");
const bcrypt = require("bcrypt");
const jwt = require("jsonwebtoken");
const mongoose = require("mongoose");

exports.RegisterUser = async (req, res) => {
  let userId = new mongoose.Types.ObjectId();
  UserModel.find({ email: req.body.email })
    .exec()
    .then((user) => {
      if (user.length >= 1) {
        return res.status(409).json({
          Message: "Email exist",
        });
      } else {
        bcrypt.hash(req.body.password, 10, (err, hash) => {
          if (err) {
            return res.status(500).json({
              Error: err,
            });
          } else {
            const users = new UserModel({
              _id: userId,
              email: req.body.email,
              username: req.body.username,
              password: hash,
            });
            users
              .save()
              .then((result) => {
                try {
                  const apiToken = jwt.sign(
                    {
                      userId,
                      username: req.body.username,
                      email: req.body.email,
                    },
                    process.env.JWT_KEY,
                    {
                      expiresIn: "1d",
                    }
                  );
                  res.cookie("auth", apiToken);
                  // req.flash("message", "User Logged in");

                  res.status(201).redirect("/post");
                } catch (error) {
                  res.send(error);
                }
              })
              .catch((err) => {
                console.log(err);
                res.status(500).json({
                  Error: err,
                });
              });
          }
        });
      }
    });
};

exports.getRegister = (req, res) => {
  res.status(200);
  res.render("register");
};
