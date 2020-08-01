const mongoose = require("mongoose");
const UploadModel = require("../models/uploads");
const UserModel = require("../models/users");

// exports.getDashboard = (req, res) => {
//   UploadModel.find()
//     .select()
//     .exec()
//     .then((result) => {
//       res.status(200).render("dashboard", {
//         data: result,
//       });
//     })
//     .catch((err) => {
//       console.log(err);
//       res.status(500).json({
//         error: err,
//       });
//     });
// };

exports.getDashboard = async (req, res, next) => {
  let id = req.userData.user;
  try {
    let user = await UserModel.findOne({ id }).select("username email _id");

    let data = await UploadModel.find({ user_id: id }).select().exec();

    res.status(200).render("dashboard", {
      data,
      user
    });
  } catch (err) {
    console.log(err);
    res.status(500).json({
      error: err
    });
  }
};
