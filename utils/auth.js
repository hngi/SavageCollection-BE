const jwt = require("jsonwebtoken");
const bcrypt = require("bcrypt");

const hashPass = (password) => {
  return bcrypt.hashSync(password, bcrypt.genSaltSync());
};

const comparePass = (password, hash) => {
  return bcrypt.compareSync(password, hash);
};

const signJWT = (email, username) => {
  return jwt.sign(
    {
      email,
      username,
    },
    process.env.JWT_KEY,
    {
      expiresIn: "2d",
    }
  );
};

module.exports = {
  hashPass,
  comparePass,
  signJWT,
};
