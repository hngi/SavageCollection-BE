const jwt = require("jsonwebtoken");
const UserModel = require("../models/users");
const bCrypt = require("bcrypt");

exports.LoginUser = async (req, res) => {
  const { username, password } = req.body;

  try {
    if (!username && !password) {
      return res.status(400).json({
        success: false,
        message: "Username And Password Is Required",
      });
    }
    const userFound = await UserModel.findOne({ username: username });
    if (userFound) {
      const PasswordMatch = await bCrypt.compare(password, userFound.password);
      console.log(userFound.password);
      if (PasswordMatch) {
        const apiToken = jwt.sign(
          {
            username: userFound.username,
            password: userFound.password,
            email: userFound.email,
          },
          process.env.JWT_KEY,
          {
            expiresIn: "2d",
          }
        );
        render("/");
        return res.status(200).send({
          success: true,
          message: "Log in Succesfull",
          data: {
            statusCode: 200,
            user: userFound,
            token: apiToken,
          },
        });
      } else {
        return res.status(400).json({
          success: false,
          message: "Incorrect Password",
        });
      }
    } else {
      return res.status(404).json({
        success: false,
        message: "User Doesn't Exist",
      });
    }
  } catch (error) {
    return res.status(400).json({
      success: false,
      message: error.message,
    });
  }
};

exports.getLogin = (req, res) => {
  res.status(200);
  res.render("login.ejs");
};
