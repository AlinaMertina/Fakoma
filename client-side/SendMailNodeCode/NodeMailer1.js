var http = require('http');
var url = require('url');
var nodemailer = require('nodemailer');

var ivelany ="Erico Ivelany";
var anatiny ="Erico Anatiny";

http.createServer(function (req, res) {
  res.writeHead(200, {'Content-Type': 'text/html'});
  res.write("<br> URL: " + req.url);
  var b = url.parse(req.url, true);

  var txt ="<a href='http://localhost:8089/'>Resend mail</a>";
  res.write("<br> "+txt);
  // res.write("<br> q: "+String(q));
  res.end('<br> Hello World ERICO! mandeh le send mail');

  console.log("anatiny: "+anatiny);


  var transporter = nodemailer.createTransport({
    service: 'gmail',
    auth: {
      user: 'ericonomena@gmail.com',
      pass: 'jdsburkiovsjqurw'
    }
  });
  
  var mailOptions = {
    from: 'ericonomena@gmail.com',
    to: 'ericonomena@gmail.com',
    subject: 'Sending Email using Node.js',
    text: 'That was easy! i waiting for you Lili'
  };
  
  transporter.sendMail(mailOptions, function(error, info){
    if (error) {
      console.log(error);
    } else {
      console.log('Email sent: ' + info.response);
    }
  });


}).listen(8089);


console.log("ivelany: "+ivelany);