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

exports.GetUserPost = (req, res, next) => {
  UploadModel.find()
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
      });
    })
    .catch((err) => {
      console.log(err);
      res.status(500).json({
        error: err,
      });
    });
};
