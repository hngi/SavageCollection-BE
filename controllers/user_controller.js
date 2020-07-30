const mongoose = require("mongoose");
const UploadModel = require("../models/uploads");

exports.CreatePost = (req, res, next) => {
  //new instance of the model to store data
  const uploadModel = new UploadModel({
    //data for the model
    _id: new mongoose.Types.ObjectId(),
    title: req.body.title,
    text: req.body.text,
    type: req.body.type,
    image_url: req.file.path,
    user: req.userData.user_id,
  });
  uploadModel
    .save()
    .then((result) => {
      res.status(201).json({
        success: true,
        message: "Post created",
        post: result,
      });
    })
    .catch((err) => {
      console.log(err);
      res.status(500).json({
        error: err,
      });
    });
};

exports.GetAllPost = (req, res, next) => {
  UploadModel.find()
    .select()
    .exec()
    .then((result) => {
      return res.status(200).json({
        success: true,
        message: "Successfully retrieved posts",
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
