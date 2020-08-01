const mongoose = require("mongoose");

const UploadSchema = mongoose.Schema(
  {
    title: {
      type: String,
    },
    image_url: {
      type: String,
    },
    text: {
      type: String,
    },
    type: {
      type: String,
      emum: ["text", "image", "both"],
    },
    points: {
      type: Number,
      default: 1,
    },
    userId: {
      type: mongoose.Schema.Types.ObjectId,
      ref: "user",
    },
  },
  {
    timestamps: true,
  }
);

module.exports = mongoose.model("uploads", UploadSchema);
