<!DOCTYPE html>
<html>
<head>
   <style>
    a.home
    {
      font-size: 25px;
      color:black;
    }
</style>
<link href='https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/css/intlTelInput.min.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/intlTelInput.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/utils.min.js"></script>
<script type = "text/javascript" >
   function preventBack(){window.history.forward();}
    setTimeout("preventBack()", 0);
    window.onunload=function(){null};
</script>
	<title> Assign Executive</title>
</head>
<link rel="stylesheet" type="text/css" href="assignexecss.css"/>
<body>
	<?php
require('db.php');
// If form submitted, insert values into the database.
if (isset($_REQUEST['eemail'])){
        // removes backslashes

 $ename = stripslashes($_REQUEST['ename']);
        //escapes special characters in a string
 $ename = mysqli_real_escape_string($con,$ename); 
 
 $eemail= stripslashes($_REQUEST['eemail']);
 $eemail = mysqli_real_escape_string($con,$eemail);
 
 $dname = stripslashes($_REQUEST['dname']);
 $dname = mysqli_real_escape_string($con,$dname);

 $demail = stripslashes($_REQUEST['demail']);
 $demail = mysqli_real_escape_string($con,$demail);

 $dmobile = stripslashes($_REQUEST['mobile']);
 $dmobile = mysqli_real_escape_string($con,$dmobile);
 
 $daddr = stripslashes($_REQUEST['daddr']);
 $daddr = mysqli_real_escape_string($con,$daddr);
 
 $brand = stripslashes($_REQUEST['brand']);
 $brand = mysqli_real_escape_string($con,$brand);

 $generic= stripslashes($_REQUEST['generic']);
 $generic = mysqli_real_escape_string($con,$generic);

$quantity = stripslashes($_REQUEST['quantity']);
 $quantity = mysqli_real_escape_string($con,$quantity);

 $exp = stripslashes($_REQUEST['exp']);
 $exp = mysqli_real_escape_string($con,$exp);

 $coll = stripslashes($_REQUEST['coll']);
 $coll = mysqli_real_escape_string($con,$coll);

 $ctime = stripslashes($_REQUEST['ctime']);
 $ctime  = mysqli_real_escape_string($con,$ctime);


$query = "INSERT into assignexecutive (e_name, e_email, d_name, d_email, Mobile_no, d_address, brand_name, generic_name, quantity, expiry_date, collection_date, c_time)
VALUES ('$ename','$eemail','$dname','$demail','$dmobile','$daddr','$brand','$generic','$quantity','$exp','$coll','$ctime')";
        $result = mysqli_query($con,$query);

        if($result){
            echo "<div class='form'>
<h3>The Executive has been assigned successfully.</h3>
<a class='home' href='ngodashboard.php'>GO TO DASHBOARD</a>
</div>";    
   }
    }else{
?>
<br><a class="home" href="ngodashboard.php">GO TO DASHBOARD </a>

<div class="simpleform">
<form id ="registration" action="" method="post" enctype="multipart/form-data">
<h3>Executive Details</h3>
 <input type="text" name="ename" id="button" placeholder="Enter Executive's Name" size="30" required><br><br>

 <input type="text" name="eemail" id="button" placeholder="Enter Executive's Email Id" size="30" required><br><br>

 <h3> Donator details </h3>
 <input type="text" name="dname" id="button" placeholder="Enter Donator's Name" size="30" required><br><br>
 <input type="text" name="demail" id="button" placeholder="Enter Donator's Email Id" size="30" required><br><br>
 <input type="text" name="daddr" id="button" placeholder="Enter Donator's Address" size="30" required><br><br>
 Donator's Contact No: <br>
<input type="text" name="mobile" id="phone" size="19" required/>
<br><br>

 <h3> Details of Donated Medicines </h3>
 <input type="text" name="brand" id="button" placeholder="Enter the medicine brand name " size="30" required><br><br>
 <input type="text" name="generic" id="button" placeholder="Enter the medicine generic name " size="30" required><br><br>
 <input type="text" name="quantity" id="button" placeholder="Enter quantity of medicines donated " size="30" required><br><br>

Expiry Date:<br>
 <input type="Date" name="exp" id="button" placeholder="" size="30" required><br><br>

 <h4> Executive should collect the Donated Medicines from Donator's Address on: </h4>
 <input type="Date" name="coll" id="button" placeholder="" size="30" required><br><br>

 Time:
 <input type="time" name="ctime" id="button" required><br><br>
<input type="submit" name="submit" value="Assign Executive"> &nbsp&nbsp&nbsp
<input type="reset" name="reset" value="Reset">

</form>
</div>
<?php } ?> 
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$connection = new mysqli("localhost","root","","userdb");

require 'E:\Pradnya\xampp\composer\PHPMailer-master\src\Exception.php';
require 'E:\Pradnya\xampp\composer\PHPMailer-master\src\PHPMailer.php';
require 'E:\Pradnya\xampp\composer\PHPMailer-master\src\SMTP.php';

if($_POST)
{
  $ename= $_POST['ename'];
  $eemail=$_POST['eemail'];
  $dname= $_POST['dname'];
  $demail=$_POST['demail'];
  $dmobile=$_POST['mobile'];
  $daddr=$_POST['daddr'];
  $brand=$_POST['brand']; 
  $generic=$_POST['generic'];
  $quantity=$_POST['quantity'];
  $exp=$_POST['exp'];
  $coll=$_POST['coll'];
  $ctime=$_POST['ctime'];
  $selectquery=mysqli_query($connection,"select * from assignexecutive where e_email='{$eemail}'") or die(mysqli_error($connection));
  $count=mysqli_num_rows($selectquery);
  $row=mysqli_fetch_array($selectquery);
  
   

$mail=new PHPMailer();
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
 $mail->addAddress($eemail,$eemail);

 $mail->isHTML();
 $mail->Subject='Details for collection of donated medicines';
 $mail->Body=" Hi $ename, hope you're doing well! Please refer to the below details for collection of medicines from the donator.";
 $mail->Body.=" Donator's Name: {$dname}";
$mail->Body.=" Donator's Email Id: {$demail}";
$mail->Body.=" Donator's Contact No.: {$dmobile}";
$mail->Body.=" Donator's Address: {$daddr}";
$mail->Body.=" Medicine's Brand Name: {$brand}";
$mail->Body.=" Medicine's Generic Name: {$generic}";
$mail->Body.=" Quantity of medicines donated: {$quantity}";
$mail->Body.=" Medicine's Expiry Date: {$exp}";
$mail->Body.=" Medicines to be collected from donator on:{$coll} at {$ctime}";

 $mail->send();
 echo 'Medicine collection details has been mailed to the assigned executive.';
}
catch(Exception $e)
{
  echo 'Email could not been sent.';
  echo 'Mailer Error:'. $mail->ErrorInfo;
}
}

?>
<script>
    var input = document.querySelector("#phone");
    intlTelInput(input, {
      initialCountry: "auto",
      geoIpLookup: function (success, failure) {
        $.get("https://ipinfo.io", function () { }, "jsonp").always(function (resp) {
          var countryCode = (resp && resp.country) ? resp.country : "in";
          success(countryCode);
        });
      },
    });
</script>
</body>
</html>