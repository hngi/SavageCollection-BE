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
  console.log(req.userData);
  try {
    let user = {
      username: req.userData.username,
      email: req.userData.email,
      user_id: req.userData._id,
    };

    let data = await UploadModel.find({ userId: req.userData._id })
      .select()
      .exec();

    res.status(200).render("dashboard", {
      data,
      user,
    });
  } catch (err) {
    console.log(err);
    res.status(500).json({
      error: err,
    });
  }
};
