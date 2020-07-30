const router = require("express").Router();
const login = require("../controllers/login_controllers");

router.post("/login", login.LoginUser);

module.exports = router;
