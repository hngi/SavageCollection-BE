const router = require("express").Router();
const changePassword = require("../controllers/changePassword_controller");

router.post('/user/forgot-password', changePassword.forgot);

// router.post('/user/forgot-password/:token', changePassword.tokenreset);

module.exports = router;
