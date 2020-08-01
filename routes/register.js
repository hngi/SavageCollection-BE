const router = require("express").Router();
const register = require("../controllers/register_controller");

router.post("/user/register", register.RegisterUser);
router.get("/user/register", register.getRegister);

module.exports = router;
