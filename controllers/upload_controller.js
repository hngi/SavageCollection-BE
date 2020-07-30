const UploadModel = require("../models/uploads");
const { fileUpload } = require("../helpers/file_uploads");

exports.create = async (req, res) => {
    const { title, text, type} = req.body;
    console.log(req.userData);
    try {
      let image_url = '';
      let points = 0;
      if(req.file) image_url = await fileUpload(req);
      if(req.file) points += 1;
      const uploads = new UploadModel({
        title, text, type, image_url, points
      });
      console.log(points);
      await uploads.save();
      const userFound = await UploadModel.find();
      return res.status(200).json({
        succes: true,
        messgae: "Post uploaded successfully"
      });
  } catch (error) {
    return res.status(400).json({
      success: false,
      message: error.message
    });
  }
};

exports.update = async (req, res) => {
    const { title, text, type} = req.body;
    console.log(req.userData);
    try {
      const uploadFound = await UploadModel.findOne({_id: req.params._id});
      console.log(uploadFound);
      let image_url = '';
      let points = 0;
      if(req.files) image_url = await fileUpload(req);
      if(req.files) points += 1;
      const uploads = new UploadModel({
        title, text, type, image_url, points
      });
      console.log(points);
      await uploads.update({_id: uploadFound._id});
      return res.status(200).json({
        succes: true,
        messgae: "Post updated successfully"
      });
  } catch (error) {
    return res.status(400).json({
      success: false,
      message: error.message
    });
  }
};
  