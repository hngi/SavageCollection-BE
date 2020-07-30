const crypto = require("crypto");
const nodemailer = require("nodemailer");
const User = require('../models/users');
const bcrypt = require('bcrypt');

exports.forgot = async (req, res)  => {
    const {username} = req.body;
    await crypto.randomBytes(20, function(err, buf) {
        let token = buf.toString('hex');
        if (err) {
            return res.status(404).json({
                success: "false",
                message: "Error Occured",
                data: {
                    statusCode: 404,
                    error: err.message
                }
            });
        }
  
      User.findOne({ username: username }, function(err, user) {
        if (err) {
          return res.status(404).json({
            success: "false",
            message: "Error finding user in DB",
            data: {
                statusCode: 404,
                error: err.message
            }
        });
        }
        if (!user) {
        return res.status(404).json({
            success: "false",
            message: "User Not Found. Make sure the username is rightly spelt",
            data: {
                statusCode: 404,
                error: "User Dosen't Exist"
            }
        });
        }
        user.resetPasswordToken = token;
        user.resetPasswordExpires = Date.now() + 3600000; // 1 hour
        user.save((err) => {
          if (err) {
            return res.status(404).json({
              success: "false",
              message: "Error saving user",
              data: {
                  statusCode: 404,
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
                return res.status(400).json({
                  success: "false",
                  message: "Error sending email.Possibly User has no email",
                  data: {
                      statusCode: 400,
                      error: err.message
                  }
              });
              }
            return res.status(200).json({
                success: "true",
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
                    return res.status(400).json({
                        success: "false",
                        message: "Error sending email.Possibly User has no email",
                        data: {
                            statusCode: 400,
                            error: err.message
                        }
                    });
                }
                return res.status(200).json({
                    success: "true",
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
};
  
