const router = require("express").Router();
const register = require("../controllers/register_controller");

router.get("/register", register.test);

module.exports = router;
