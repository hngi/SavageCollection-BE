const UploadModel = require("../models/uploads");
const UserModel = require("../models/users");

exports.getReward = async (req, res, next) => {
  try {
    let user = {
      username: req.userData.username,
      email: req.userData.email,
      user_id: req.userData._id,
    };

    let data = await UploadModel.find({ userId: req.userData._id })
      .select()
      .exec();

    res.status(200).render("reward", {
      data,
      user,
    });
  } catch (err) {
    console.log(err);
    res.status(500).json({
      error: err,
    });
  }
};
