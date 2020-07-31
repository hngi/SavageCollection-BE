const mongoose = require("mongoose");
const UploadModel = require("../models/uploads");

exports.CreatePost = (req, res, next) => {
  console.log(req.file);
  console.log(req.body, req.body);
  if (!req.file) {
    console.log("No file received");
    return res.send({
      success: false,
    });
  }
  //new instance of the model to store data

  const uploadModel = new UploadModel({
    //data for the model
    _id: new mongoose.Types.ObjectId(),
    title: req.body.title,
    text: req.body.text,
    type: req.body.type,
    image_url: req.file.path,
    userId: req.userData.userId,
  });
  uploadModel
    .save()
    .then((result) => {
      res.status(201).redirect("/post");
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

    .select()
    .exec()
    .then((results) => {
      results.forEach((result) => {
        console.log(result);
      });
      console.log(req.userData);
      let data = results.filter(
        (result) => result.userId == req.userData.userId
      );
      res.status(200).render("dashboard", {
        data,
exports.GetPostById = (req, res, next) => {
  UploadModel.findOne({_id: req.params._id})
    .exec()
    .then((result) => {
      return res.status(200).json({
        success: true,
        message: "Successfully retrieved post",
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

exports.DeletePost = (req, res, next) => {
  console.log('I am here');
  UploadModel.deleteOne({_id: req.params._id})
    .select()
    .exec()
    .then((result) => {
      return res.status(200).json({
        success: true,
        message: "Successfully deleted post",
        data: result,
      });
    })
      console.log(err);
      res.status(500).json({
      });
    });
};
