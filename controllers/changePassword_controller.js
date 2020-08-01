const crypto = require("crypto");
const nodemailer = require("nodemailer");
const User = require('../models/users');
const bcrypt = require('bcrypt');

exports.forgot = async (req, res)  => {
    console.log("gmail user", process.env.GMAIL_USER);
    console.log("gmail pass", process.env.GMAIL_PASS);
    // console.log("body", req.body)
    const {email} = req.body;
    try {
      await crypto.randomBytes(20, function(err, buf) {
        let token = buf.toString('hex');
        if (err) {
            return res.status(400).render("forgotPassword", {
                success: false,
                message: "Error Occured",
                data: {
                    statusCode: 400,
                    error: err.message
                }
            });
        }
  
      User.findOne({ email: email }, function(err, user) {
        if (err) {
          return res.status(400).render("forgotPassword", {
            success: false,
            message: "Error finding user in DB",
            data: {
                statusCode: 400,
                error: err.message
            }
        });
        }
        if (!user) {
        return res.status(400).render("forgotPassword", {
            success: false,
            message: "User Not Found. Make sure the email is rightly spelt",
            data: {
                statusCode: 400,
                error: "User Dosen't Exist"
            }
        });
        }
        user.resetPasswordToken = token;
        user.resetPasswordExpires = Date.now() + 3600000; // 1 hour
        user.save((err) => {
          if (err) {
            return res.status(400).render("forgotPassword", {
              success: false,
              message: "Error saving user",
              data: {
                  statusCode: 400,
                  error: err.message
              }
          });
          }
            let smtpTransport = nodemailer.createTransport({
              service: 'gmail',
              auth: {
                user: process.env.GMAIL_USER,
                pass: process.env.GMAIL_PASS
              }
            });
            let mailOptions = {
              to: user.email,
              from: 'passwordreset@savagecollection.com',
              subject: 'Savage Collection User Password Reset',
              text: 'You are receiving this because you (or someone else) have requested the reset of the password for your account.\n\n' +
                'Please click on the following link, or paste this into your browser to complete the process:\n\n' +
                'http://' + req.headers.host + '/user/forgot-password/' + token + '\n\n' +
                'If you did not request this, please ignore this email and your password will remain unchanged.\n'
            };
            smtpTransport.sendMail(mailOptions, function(err, info) {
              if (err) {
                return res.status(400).render("forgotPassword", {
                  success: false,
                  message: "Error sending email ",
                  data: {
                      statusCode: 400,
                      error: err.message
                  }
              });
              }
            return res.status(200).render("forgotPassword", {
                success: true,
                message: "Email Sent" + info.response,
                data: {
                    statusCode: 200,
                    message: 'An e-mail has been sent to ' + user.email + ' with further instructions.'
                }
            });
        });
        }, (user) => { //incase no error there, use this
            let smtpTransport = nodemailer.createTransport({
                service: 'gmail',
                auth: {
                  user: process.env.GMAIL_USER,
                  pass: process.env.GMAIL_PASS
                }
            });
            let mailOptions = {
                to: user.email,
                from: 'passwordreset@savagecollection.com',
                subject: 'Savage Collection User Password Reset',
                text: 'You are receiving this because you (or someone else) have requested the reset of the password for your account.\n\n' +
                  'Please click on the following link, or paste this into your browser to complete the process:\n\n' +
                  'http://' + req.headers.host + '/user/forgot-password/' + token + '\n\n' +
                  'If you did not request this, please ignore this email and your password will remain unchanged.\n'
            };
            smtpTransport.sendMail(mailOptions, function(err, info) {
                if (err) {
                    return res.status(400).render("forgotPassword", {
                        success: false,
                        message: "Error sending email.Possibly User has no email",
                        data: {
                            statusCode: 400,
                            error: err.message
                        }
                    });
                }
                return res.status(200).render("forgotPassword", {
                    success: true,
                    message: "Email Sent" + info.response,
                    data: {
                        statusCode: 200,
                        message: 'An e-mail has been sent to ' + user.email + ' with further instructions.'
                    }
                });
                
            });
        });
  
  
  
    });
  
  
  
  });
    } 
  catch (error) {
    return res.status(500).render("forgotPassword", {
      success: false,
      message: "Internal server Error",
      data: {
        statusCode: 400,
        error: error.message
      }
    });      
  }

};
  
exports.tokenreset = async(req, res) => {
  let token = req.params.token;
  if (req.body.password === undefined || req.body.password == "") {
    return res.status(400).render("forgotPassToken", {
      success: false,
      message: "Password Can't Be Empty",
      data: {
        statusCode: 400,
        error: "password is required"
      }
    });
  }
  try {
    const password = await bcrypt.hash(req.body.password, 10);
    User.findOne({ resetPasswordToken: req.params.token, resetPasswordExpires: { $gt: Date.now() } },
    function(err, user) {
      if (err) {
        return res.status(400).render("forgotPassToken", {
          token: token,
          success: false,
          message: "Error From DB",
          data: {
            statusCode: 400,
            error: err.message
        }
      });
      }
      if (!user) {
        return res.status(400).render("forgotPassToken", {
          token: token,
          success: false,
          message: "Password Reset Token Is Invalid or has expired",
          data: {
            statusCode: 400,
            error: "Invalid Token"
        }
      });
    }
      user.password = password;
      user.resetPasswordToken = undefined; //turn reset password to something not needed
      user.resetPasswordExpires = undefined;
  
      user.save(function(err) {
        if (err) {
          return res.status(400).render("forgotPassToken", {
            token: token,
            success: false,
            message: "Couldn't save to DB",
            data: {
              statusCode: 400,
              error: err.message
            }
          });
        }
        let smtpTransport = nodemailer.createTransport({
          service: 'gmail',
          auth: {
            user: process.env.GMAIL_USER,
            pass: process.env.GMAIL_PASS
          }
        });
        let mailOptions = {
          to: user.email,
          from: 'admin@savagecollection.com',
          subject: 'Your SavageCollection Account password has been changed',
          text: 'Hello,\n\n' +
            'This is a confirmation that the password for your account with the username ' + user.username + ' has just been changed.\n'
        };
        smtpTransport.sendMail(mailOptions, function(err) {
          if (err) {
            return res.status(200).render("forgotPassToken", {
              token: token,
              success: false,
              message: "Password Changed Succesfully. But Error Sending Email Notification",
              data: {
                statusCode: 200,
                error: err.message
            }
          });
          }
          return res.status(200).render("forgotPassToken", {
            token: token,
            success: true,
            message: "Email Notification Sent",
            data: {
              statusCode: 200,
              message: "Password Changed Succesfully"
          }
        });
      });
  
      });
    });    
  } catch (error) {
    
  }

};

exports.render = (req, res) => {
  return res.status(200).render("forgotPassword");
};

exports.renderToken = (req, res) => {
  let token = req.params.token;
  return res.status(200).render("forgotPassToken", {
    token: token
  });
};