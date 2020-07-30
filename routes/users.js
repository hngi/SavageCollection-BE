const router = require("express").Router();
const user = require("../controllers/user_controller");
const auth = require("../middleware/auth");

router.get("/user", auth, user.test);

module.exports = router;
