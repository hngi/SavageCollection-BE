const router = require("express").Router();
const user = require("../controllers/user_controller");

router.get("/user", user.test);

module.exports = router;
