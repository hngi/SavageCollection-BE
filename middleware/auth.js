const jwt = require("jsonwebtoken");
const UserModel = require("../models/users");

module.exports = async (req, res, next) => {
  //to decode and validate the token
  try {
    const token = req.cookies.auth;
    const decoded = jwt.verify(token, process.env.JWT_KEY);
    let user = await UserModel.findOne({ username: decoded.username });
    req.userData = user;
    next();
  } catch (error) {
    return res.status(401).redirect("/user/login");
  }
};
