const mongoose = require("mongoose");

const UploadSchema = mongoose.Schema(
  {
    title: {
      type: String,
      required: true
    },
    image_url: {
      type: String
    },
    text: {
      type: String
    },
    type: {
      type: String,
      emum: ["text", "image", "both"]
    },
    points: {
      type: Number
    },
    user: {
      type: mongoose.Schema.Types.ObjectId,
      ref: "user"
    }
  },
  {
    timestamps: true
  }
);

module.exports = mongoose.model("user", UploadSchema);
