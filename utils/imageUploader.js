const cloudinary = require("../config/cloudinary");
const imageParser = require("image-data-uri");
const path = require("path");

const dataUri = (req) => {
  const fileBuffer = req.file.buffer;
  const fileExt = path.extname(req.file.originalname).toString();
  return imageParser.encode(fileBuffer, fileExt);
};

const uploadImage = async (file) => {
  const imageData = await cloudinary.uploader.upload(file);
  return imageData.secure_url;
};

module.exports = {
  dataUri,
  uploadImage,
};
