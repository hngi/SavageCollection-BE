const express = require("express");
const mongoose = require("mongoose");
const multer = require("multer");
const Uploads = require("../models/uploads");

//to define how the file shoul be stored
const storage = multer.diskStorage({
  destination: (req, file, cb) => {
    //cb() specifies potential error and a destination
    cb(null, "./uploads");
  },
  filename: (req, file, cb) => {
    //cb() specifies potential error , and the original file name
    cb(null, file.originalname);
  },
});

const fileFilter = (req, file, cb) => {
  if (file.mimetype === "image/jpeg" || file.mimetype === "image/png") {
    //to accept the file
    cb(null, true);
  } else {
    //to reject the file
    cb(null, false);
  }
};

//to initialize multer (dest specify the folder the data should be upload)
const upload = multer({
  storage,
  limits: { filesize: 1024 * 1024 * 10 },
  fileFilter,
});

exports.create =
  (upload.single("image"),
  (req, res, next) => {
    console.log(req.file);
    //new instance of the model to store data
    const uploadmodel = new UploadModel({
      //data for the model
      _id: new mongoose.Types.ObjectId(),
      title: req.body.title,
      text: req.body.text,
      type: req.body.type,
      image_url: req.file.path,
      user: req.user.user_id,
      // productImage: req.file.path
    });
    uploadmodel
      .save()
      .then((result) => {
        console.log(result);
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
  });
