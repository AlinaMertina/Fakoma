var express = require('express');  
var cors = require('cors');  
var app = express();  
var bodyParser = require('body-parser');  
var nodemailer = require('nodemailer');
// Create application/x-www-form-urlencoded parser  
var urlencodedParser = bodyParser.urlencoded({ extended: false })  
app.use(express.static('public'));  
app.use(cors());  
app.get('/index.html', function (req, res) {  
   res.sendFile( __dirname + "/" + "index.html" );  
})
app.post('/process_post', urlencodedParser, function (req, res) {  
   // Prepare output in JSON format  
   console.log(req.body);
   console.log(req.query);
   console.log(req.params);
   response = {  
       destinataire:req.body.destinataire,  
       objet:req.body.objet,  
       message:req.body.message,  
   };  
   console.log(response); 
   console.log("Stringify: "+JSON.stringify(response)); 
   res.end(JSON.stringify(response));  

   console.log(response.destinataire); 
   console.log(response.objet); 
   console.log(response.message); 
   var olona =  "L'utilisateur: "+response.destinataire + " nous a envoye ce message >> " + response.message;
   console.log(olona);

   var transporter = nodemailer.createTransport({
      service: 'gmail',
      auth: {
        user: 'fakomadagascar@gmail.com',
        pass: 'kacilbyyrtczigtg'
      }
    });
    
    var mailOptions = {
      from:'fakomadagascar@gmail.com',
      to:'fakomadagascar@gmail.com',
      subject: response.objet,
      html: olona
    }; 
    var mailRedirect = {
      from:'fakomadagascar@gmail.com',
      to:response.destinataire,
      subject: "Réponse " + response.objet,
      html:"Votre message a bien été reçu, nous vous tenons informer. -- Fako'Ma"
    }; 
    transporter.sendMail(mailOptions, function(error, info){
      if (error) {
        console.log(error);
      } else {
        console.log('Email sent: ' + info.response);
      }
    });
    transporter.sendMail(mailRedirect, function(error, info){
      if (error) {
        console.log(error);
      } else {
        console.log('Email sent: ' + info.response);
      }
    });
    
    console.log("envoie du mail en cours...")
})  
var server = app.listen(8000, function () {  
  var host = server.address().address  
  var port = server.address().port  
  console.log("Example app listening at http://%s:%s", host, port)  
}) 