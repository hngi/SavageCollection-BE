const mongoose = require("mongoose");
const UploadModel = require("../models/uploads");
const UserModel = require("../models/users");

exports.getDashboard = async (req, res, next) => {
  let id = req.userData._id;
  console.log(id);
  try {
    let user = {
      username: req.userData.username,
      email: req.userData.email,
      _id: id,
    };

    let result = await UploadModel.find({ userId: id }).select().exec();

    console.log(user);
    console.log("........................................");
    console.log(result);

    // let data = result.filter((entry) => entry._id == user._id);

    res.status(200).render("dashboard", {
      data: result,
      user,
    });
  } catch (err) {
    console.log(err);
    res.status(500).json({
      error: err,
    });
  }
};
