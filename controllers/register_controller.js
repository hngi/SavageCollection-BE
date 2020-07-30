const UserModel = require("../models/users");
const bCrypt = require("bcrypt");

exports.RegisterUser = async (req, res) => {
  const { email, username, password } = req.body;
  try {
    if (!username && !password) {
      return res.status(400).json({
        success: false,
        message: "Username And Password Is Required",
      });
    } else {
      let hashedPassword = await bCrypt.hash(password, 10);
      const user = new UserModel({
        email: email,
        username: username,
        password: hashedPassword,
      });
      await user.save();
      req.flash("message", "User created");
      res.status(201).redirect("/user/dashboard");
      // return res.status(200).json({

      //   succes: true,
      //   messgae: "Registration Succesfull",
      // });
    }
  } catch (error) {
    req.flash("message", `${error}`);
  }
};

exports.getRegister = (req, res) => {
  res.status(200);
  res.render("register.ejs");
};
