const router = require("express").Router();
const upload = require("../controllers/upload_controller");
const auth = require("../middleware/auth");

router.post("/upload/create", auth, upload.create);
router.post("/upload/:_id/update", auth, upload.update);

module.exports = router;
