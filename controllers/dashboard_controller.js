const mongoose = require("mongoose");
const UploadModel = require("../models/uploads");

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

exports.getDashboard = (req, res, next) => {
  UploadModel.find()
    .select()
    .exec()
    .then((results) => {
      console.log(results);
      console.log(req.userData);
      let data = results.filter(
        (result) => result.user_id == req.userData.user
      );
      res.status(200).render("dashboard", {
        data,
      });
    })
    .catch((err) => {
      console.log(err);
      res.status(500).json({
        error: err,
      });
    });
};
