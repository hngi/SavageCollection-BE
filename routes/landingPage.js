const router = require("express").Router();
const landingPage = require("../controllers/landingPage_controller");

router.get("/posts", landingPage.GetAllPost);

module.exports = router;
