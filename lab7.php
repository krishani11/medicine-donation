<!DOCTYPE html>
<html>
<head>
<title>PHP Send Mail</title>
</head>
<body>
<div class="simpleform">
<form id ="registration" action="" method="post" name="myForm">
<h1>PHP Mail Lab 7</h1>
 
<input type="text" name="name" id="button" placeholder="Name" size="30" required="required"><br><br>

<input type="text" name="email" id="button" placeholder="Email-Id" size="30" required><br><br>  

<input type="text" name="sub" id="button" size=20 placeholder="Subject" required><br><br>

<textarea name="msg" id="body" rows="5" placeholder="Type Message"></textarea>
<br><br>
<input type="submit" name="submit" value="Send">
</form>
</div>

<?php

$connection = new mysqli("localhost","root","","userdb");

require ('E:\Pradnya\xampp\composer\PHPMailer-master\src\Exception.php');
require ('E:\Pradnya\xampp\composer\PHPMailer-master\src\PHPMailer.php');
require ('E:\Pradnya\xampp\composer\PHPMailer-master\src\SMTP.php');

if($_POST)
{
 $fname=$_POST['name'];
 $username=$_POST['email'];
 $sub=$_POST['sub'];
 $msg=$_POST['msg'];
$mail=new PHPMailer\PHPMailer\PHPMailer();
try
{
 $mail->SMTPDebug=0;
 $mail->isSMTP();
 
 $mail->Host='smtp.gmail.com';
 $mail->SMTPAutoTLS = false;
 $mail->SMTPAuth=true;
 $mail->Username='abc@gmail.com';
 $mail->Password='hidden';
 $mail->SMTPSecure='tls';
 $mail->Port='587';
 $mail->setFrom('abc@gmail.com' , 'ABC XYZ');
 $mail->addAddress($username,$username);

 $mail->isHTML();
 $mail->Subject=$sub;
 $mail->Body=$msg;
 
 $mail->send();
 echo ' Email Sent successfully!';
}
catch(Exception $e)
{
  echo 'Email could not been sent.';
  echo 'Mailer Error:'. $mail->ErrorInfo;
}
}

?>

</body>
</html>


























