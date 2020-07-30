const jwt = require("jsonwebtoken");
const UserModel = require("../models/users");
const bCrypt = require('bcrypt');


exports.LoginUser = async (req, res) => {
  const { username, password} = req.body;

  try {
    if (!username && !password) {
      return res.status(400).json({
        success: false,
        message: "Username And Password Is Required"
      });

  }
  const userFound = await UserModel.findOne({username: username});
  if (userFound) {
    const PasswordMatch = await bCrypt
      .compare(userFound.password, password);
    if (PasswordMatch) {
      const apiToken = jwt.sign(
        {
          username: userFound.username,
          password: userFound.password,
          email: userFound.email
        },
        process.env.JWT_KEY,
        {
          expiresIn: "2d",
        }
      );
      userFound.api_token = apiToken;
      await userFound.save();
      res.status(200).json({
        success: true,
        message: "Log in Succesfull",
        data: {
          statusCode: 200,
          user: userFound,
        },
      });
    }
  }

  } catch (error) {
    
  }
  res.status(200).json("testing login route");
};
