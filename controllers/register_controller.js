const UserModel = require("../models/users");
const { signJWT, hashPass } = require("../utils/auth");

exports.RegisterUser = async (req, res) => {
  const { email, username, password } = req.body;
  let success = false;
  let message = "";
  try {
    if (!username && !password) {
      message = "Username And Password Is Required";
      return res.render("register", {
        success,
        message,
      });
    }

    const user = new UserModel();
    user.email = email;
    user.username = username;
    user.password = hashPass(password);
    const newUser = await user.save();
    const token = signJWT(user.email, user.username);

    res.status(201).cookie("auth", token).redirect("/user/dashboard");
  } catch (error) {
    message = "An Internal Error Occurred";
    console.log(error);
    res.render("register", {
      success,
      message,
    });
  }
};

exports.getRegister = (req, res) => {
  res.status(200);
  res.render("register");
};
