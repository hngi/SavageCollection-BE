const mongoose = require("mongoose");
const jwt = require("jsonwebtoken");
const bcrypt = require("bcrypt");

const UserSchema = new mongoose.Schema(
  {
    _id: mongoose.Schema.Types.ObjectId,
    email: {
      type: String,
      required: true,
      unique: true,
      match: /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/,
    },
    password: {
      type: String,
      required: true,
    },
    resetPasswordToken: {
      type: String,
      required: false,
    },
    resetPasswordExpires: {
      type: Date,
      required: false,
    },
    username: {
      type: String,
      required: true,
    },
  },
  {
    timestamps: true,
  }
);

UserSchema.static("hashPass", function (password) {
  return bcrypt.hashSync(password, bcrypt.genSaltSync());
});

UserSchema.methods.compareHash = function (password) {
  return bcrypt.compareSync(password, this.password);
};

UserSchema.methods.signJWt = function () {
  return jwt.sign(
    {
      email: this.email,
      username: this.username,
    },
    process.env.JWT_KEY,
    {
      expiresIn: "2d",
    }
  );
};

module.exports = mongoose.model("user", UserSchema);
