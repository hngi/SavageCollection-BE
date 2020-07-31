exports.getDashboard = (req, res) => {
  res.status(200).render("dashboard.ejs", { message: req.flash("message") });
};
