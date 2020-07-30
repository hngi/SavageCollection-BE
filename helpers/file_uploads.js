const multer  = require('multer');
module.exports = {
    fileUpload: async (req) => {
        const storage = multer.diskStorage({
            destination: "./public/uploads/",
            filename: function(req, file, cb){
                cb(null,req.userData.username + '_' + Date.now() + path.extname(file.originalname));
            }
          });
          const upload = multer({
            storage: storage
          }).single('file');
          const image_url = upload(req, (err) => {
            // if(err){
            //     return null;
            // } 
        });
        const data = req.file.filename;
        return data;
    }
}