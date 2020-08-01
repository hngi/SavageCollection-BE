const router = require("express").Router();
const landingPage = require("../controllers/landingPage_controller");

router.get("/", landingPage.GetAllPost);

module.exports = router;
