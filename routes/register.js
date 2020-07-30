const router = require("express").Router();
const register = require("../controllers/register_controller");

router.post("/user/register", register.RegisterUser);

module.exports = router;
