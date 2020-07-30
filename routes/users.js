const router = require("express").Router();
const user = require("../controllers/user_controller");
const auth = require("../middleware/auth");

router.get("/create", auth, user.create);

module.exports = router;
