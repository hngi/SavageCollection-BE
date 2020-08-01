const UploadModel = require("../models/uploads");
const UserModel = require("../models/users");

exports.getReward = async (req, res, next) => {
  res.status(200).render("reward");
};
