const mongoose = require("mongoose");
const UploadModel = require("../models/uploads");

exports.GetAllPost = (req, res, next) => {
  UploadModel.find()
    .select("_id image_url")
    .exec()
    .then((result) => {
      // console.log(result[image_url]);
      res.status(200).render("index", {
        data: result,
      });
    })
    .catch((err) => {
      console.log(err);
      res.status(500).json({
        error: err,
      });
    });
};
