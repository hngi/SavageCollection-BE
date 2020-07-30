exports.test = (req, res) => {
  console.log(req.userData);
  res.status(200).json({ message: "testing user route" });
};
