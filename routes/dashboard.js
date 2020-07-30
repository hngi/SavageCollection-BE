const router = require("express").Router();
const dashboard = require("../controllers/dashboard_controller");

router.get("/user/dashboard", dashboard.getDashboard);

module.exports = router;
