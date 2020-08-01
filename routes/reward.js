const router = require("express").Router();
const reward = require("../controllers/rewards_controller");
const auth = require("../middleware/auth");

router.get("/reward", auth, reward.getReward);

module.exports = router;
