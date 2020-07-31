const UserModel = require("../models/users");

exports.LoginUser = async (req, res) => {
  const { username, password } = req.body;
  let success = false;
  let message = "";

  if (!username && !password) {
    message = "Username And Password Is Required";
    return res.render("login", {
      success,
      message,
    });
  }

  try {
    const userFound = await UserModel.findOne({ username: username });
    if (userFound) {
      const PasswordMatch = UserModel.compareHash(password);
      if (PasswordMatch) {
        const token = UserModel.signJWT();
        res.cookie("auth", token).redirect("/user/dashboard");
      } else {
        message = "Incorrect Password";
        return res.render("login", {
          success,
          message,
        });
      }
    } else {
      message = "User Doesn't Exist";
      return res.render("login", {
        success,
        message,
      });
    }
  } catch (error) {
    message = "An Internal Error Occurred";
    return res.render("login", {
      success,
      message,
    });
  }
};

exports.getLogin = (req, res) => {
  res.status(200);
  res.render("login");
};
