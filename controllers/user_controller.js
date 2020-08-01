const mongoose = require("mongoose");
const UploadModel = require("../models/uploads");
const imageUploader = require("../utils/imageUploader");
const UserModel = require("../models/users");

exports.CreatePost = async (req, res, next) => {
  if (!req.file) {
    return res.redirect("/user/dashboard");
  }

  const imagUri = imageUploader.dataUri(req);
  const imageURL = await imageUploader.uploadImage(imagUri);

  //new instance of the model to store data
  const uploadModel = new UploadModel({
    image_url: imageURL,
    userId: req.userData._id
  });

  const data = await uploadModel.save();

  console.log(data);

  return res.redirect("/user/dashboard");
};

exports.GetAllPost = (req, res, next) => {
  UploadModel.find()
    .select("_id image_url")
    .exec()
    .then(results => {
      res.status(200).render("views", {
        data: results
      });
    })
    .catch(err => {
      console.log(err);
      res.status(500).json({
        error: err
      });
    });
};

exports.GetUserPost = async (req, res, next) => {
  let id = req.userData.user;
  console.log(id);
  try {
    let user = await UserModel.findOne({ id }).select("username email _id");

    let data = await UploadModel.find({ user_id: id }).select().exec();

    res.status(200).render("dashboard", {
      data,
      user
    });
  } catch (err) {
    return res.redirect("/user/dashboard");
  }
};

exports.GetPostById = (req, res, next) => {
  UploadModel.findOne({ _id: req.params.id })
    .select()
    .exec()
    .then(result => {
      return res.status(200).json({
        success: true,
        message: "Successfully retrieved post",
        data: result
      });
    })
    .catch(err => {
      console.log(err);
      res.status(500).json({
        error: err
      });
    });
};

exports.DeletePost = (req, res, next) => {
  UploadModel.deleteOne({ _id: req.params.id })
    .select()
    .exec()
    .then(result => {
      return res.redirect("/user/dashboard");
    })
    .catch(error => {
      return res.redirect("/user/dashboard");
    });
};

exports.Logout = (req, res) => {
  res.clearCookie("auth");
  res.redirect("/posts");
};
