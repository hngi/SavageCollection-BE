const mongoose = require("mongoose");
const UploadModel = require("../models/uploads");

exports.GetAllPost = (req, res, next) => {
  UploadModel.find()
    .select("_id image_url")
    .exec()
    .then((result) => {
      let data = [];

      result.forEach((entry, index) => {
        if (index < 30) {
          data.push(entry);
        }
      });
      res.status(200).render("index", {
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
