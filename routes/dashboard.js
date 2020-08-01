const router = require("express").Router();
const dashboard = require("../controllers/dashboard_controller");
const auth = require("../middleware/auth");

router.get("/user/dashboard", auth, dashboard.getDashboard);

module.exports = router;
