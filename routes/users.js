const router = require("express").Router();
const user = require("../controllers/user_controller");
const multer = require("multer");

const auth = require("../middleware/auth");

//to define how the file shoul be stored
const storage = multer.memoryStorage();

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
  storage: storage,
  limits: { filesize: 1024 * 1024 * 10 },
  fileFilter: fileFilter,
});

router.post("/post/create", auth, upload.single("image"), user.CreatePost);
router.get("/post", auth, user.GetUserPost);
router.get("/posts", user.GetAllPost);
// router.get("/user/posts", auth, user.GetAllpost);
router.get("/post/:id/details", user.GetPostById);
router.get("/post/:id/delete", user.DeletePost);

router.get("/user/logout", user.Logout);

module.exports = router;
