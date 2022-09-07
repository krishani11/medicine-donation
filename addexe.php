<!DOCTYPE html>
<html>
<head>
<title>Add Executive</title>
<style>
    a.home
    {
      font-size: 25px;
      color:black;
    }
</style>
<script type = "text/javascript" >
   function preventBack(){window.history.forward();}
    setTimeout("preventBack()", 0);
    window.onunload=function(){null};
</script>
</head>
<link rel="stylesheet" type="text/css" href="addexecss.css"/>
<body>
	<?php
require('db.php');
// If form submitted, insert values into the database.
if (isset($_REQUEST['submit'])){
        // removes backslashes

 $fname = stripslashes($_REQUEST['name']);
        //escapes special characters in a string
 $fname = mysqli_real_escape_string($con,$fname); 
 
 $username= stripslashes($_REQUEST['email']);
 $username = mysqli_real_escape_string($con,$username);
 
 $age = stripslashes($_REQUEST['age']);
 $age = mysqli_real_escape_string($con,$age);

 $r1 = stripslashes($_REQUEST['r1']);
 $r1 = mysqli_real_escape_string($con,$r1);
 
 $cc = stripslashes($_REQUEST['cc']);
 $cc = mysqli_real_escape_string($con,$cc);
 
 $mobile = stripslashes($_REQUEST['mobile']);
 $mobile = mysqli_real_escape_string($con,$mobile);

 $house= stripslashes($_REQUEST['house']);
 $house = mysqli_real_escape_string($con,$house);

$city = stripslashes($_REQUEST['city']);
 $city = mysqli_real_escape_string($con,$city);

 $state = stripslashes($_REQUEST['state']);
 $state = mysqli_real_escape_string($con,$state);

 $pincode = stripslashes($_REQUEST['pincode']);
 $pincode = mysqli_real_escape_string($con,$pincode);

 $country = stripslashes($_REQUEST['country']);
 $country  = mysqli_real_escape_string($con,$country);


$query = "INSERT into executive (Full_name,Login_email,Age,Gender,Contact_no,Address,Country)
VALUES ('$fname','$username','$age','$r1','$cc.$mobile','$house.$city.$state.$pincode','$country')";
        $result = mysqli_query($con,$query);

        if($result){
            echo "<div class='form'>
<h3>The executive is registered successfully.</h3>
<a class='home' href='admindash.php'>GO TO DASHBOARD</a>
</div>";    
   }
    }else{
?>
<br><a class="home" href="admindash.php">GO TO DASHBOARD</a>

	<div class="simpleform">
<form id ="registration" action="" method="post" name="myForm">
<h1>Add Executive</h1>
 
<input type="text" name="name" id="button" placeholder="Enter the Executive Name" size="30" required="required"><br><br>

<input type="text" name="email" id="button" placeholder="Enter the Executive Email-Id" size="30" required><br><br>  

<input type="number" name="age" id="button" size=20 placeholder="Executive Age" required><br><br>

<input type="radio" id="rd" name="r1" value="male" required>Male &nbsp&nbsp&nbsp&nbsp <input type="radio" id="rd" name="r1" value="female" required>Female <br><br>

Executive Contact No: <br> <input type="text" name="cc" id="button" size="2" value="+" required>&nbsp

<input type="text" name="mobile" id="button" size="15" required><br><br>


Executive Address:<br>
<input type="text" name="house" id="button" placeholder="House No,Building & Area" size="30" required><br><br>
<input type="text" name="city" placeholder="City/Town/District" size="30" required><br><br>
<input type="text" name="state" placeholder="State/Union Territory" size="30" required> <br><br>
<input type="text" name="pincode" size=10 placeholder="Pincode" required><br><br>
<input type="text" name="country" placeholder="Country" size="30" required><br><br><br>
<input type="submit" name="submit" value="Add Executive"> &nbsp&nbsp&nbsp
<input type="reset" name="reset" value="Reset">

</form>
</div>
<?php } ?>

<?php

$connection = new mysqli("localhost","root","","userdb");

require ('E:\Pradnya\xampp\composer\PHPMailer-master\src\Exception.php');
require ('E:\Pradnya\xampp\composer\PHPMailer-master\src\PHPMailer.php');
require ('E:\Pradnya\xampp\composer\PHPMailer-master\src\SMTP.php');

if($_POST)
{
 $fname=$_POST['name'];
 $username=$_POST['email'];
 /* $selectquery=mysqli_query($connection,"select * from executive where Login_email='{$username}'") or die(mysqli_error($connection));
  $count=mysqli_num_rows($selectquery);
  $row=mysqli_fetch_array($selectquery);*/

   
$mail=new PHPMailer\PHPMailer\PHPMailer();
try
{
 $mail->SMTPDebug=0;
 $mail->isSMTP();
 
 $mail->Host='smtp.gmail.com';
 $mail->SMTPAutoTLS = false;
 $mail->SMTPAuth=true;
 $mail->Username='oumdsp@gmail.com';
 $mail->Password='oumdsp114555';
 $mail->SMTPSecure='tls';
 $mail->Port='587';
 $mail->setFrom('oumdsp@gmail.com' , 'Admin Oumds');
 $mail->addAddress($username,$username);

 $mail->isHTML();
 $mail->Subject='Added as Executive successfully';
 $mail->Body="Congratulations $fname! You have been succesfully added as an Executive in our website, 'Medicine Donation Portal.' You'll be soon intimidated on the work of supplying the medicines by some NGO. Thank you for being a part of this cause!";
 
 $mail->send();
 echo ' Executive has been informed regarding being added to the website.';
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


























