const router = require("express").Router();
const login = require("../controllers/login_controllers");

router.get("/login", login.test);

module.exports = router;
