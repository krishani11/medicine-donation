<!DOCTYPE html>
<html>
<head>
<title>Add NGO</title>
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
</head>
<link rel="stylesheet" type="text/css" href="addngocss.css"/>

<body>
	<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    
    require 'E:\Pradnya\xampp\composer\PHPMailer-master\src\Exception.php';
    require 'E:\Pradnya\xampp\composer\PHPMailer-master\src\PHPMailer.php';
    require 'E:\Pradnya\xampp\composer\PHPMailer-master\src\SMTP.php';
    require('db.php');
    // If form submitted, insert values into the database.
    if (isset($_REQUEST['username'])){
            // removes backslashes
    
     $fname = stripslashes($_REQUEST['fname']);
            //escapes special characters in a string
     $fname = mysqli_real_escape_string($con,$fname); 
     
     $username= stripslashes($_REQUEST['username']);
     $username = mysqli_real_escape_string($con,$username);
     
     $yoe = stripslashes($_REQUEST['yoe']);
     $yoe = mysqli_real_escape_string($con,$yoe);
     
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

     $query = "INSERT into `ngo_login`(Ngo_name,Login_email,Year,Contact_no,Address,City,State,Pincode,Country)
               VALUES ('$fname','$username','$yoe','$mobile','$house','$city','$state','$pincode','$country')";
        $result = mysqli_query($con,$query);
        if($result){
          echo "<div class='form'>
          <h3>NGO is registered successfully.</h3>
          <a class='home' href='admindash.php'><u>GO TO ADMIN DASHBOARD</u></a>
          </div>";
          if($_POST){ 
            $query1 = "select * from  ngo_login where (Login_email='$username')"; 
            $res = mysqli_query($con,$query1);
            $result1=mysqli_fetch_array($res);
            if($result1)
            {
            $findresult = mysqli_query($con, "SELECT * FROM ngo_login WHERE (Login_email='$username')");
            if($res = mysqli_fetch_array($findresult))
            {
            $oldftemail = $res['Login_email'];  
            }
            $token = bin2hex(random_bytes(50));
             $inresult = mysqli_query($con,"insert into ngo_pass_link values('','$oldftemail','$token')"); 
    
            if ($inresult) {
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
                    $mail->addAddress($username,$username);
    
                    $mail->isHTML();
                    $mail->Subject='NGO Account Registered Successfully';
                    $mail->Body="We are pleased to inform you that your NGO, '$fname' is successfully registered with Medicine Donation Portal.
                    To setup your account password follow the 
                    link: http://localhost/project21/ngocreatepass.php?token=$token ";
                
                    $mail->send();
                    echo 'The NGO has been informed about Account details and its setup on the NGO email.';
            }
            catch(Exception $e)
            {
                echo 'Email could not been sent.';
                echo 'Mailer Error:'. $mail->ErrorInfo;
            }
                } 
            }
        }
        }
    }else{
?>
<br><a class="home" href="admindash.php"><u>GO TO DASHBOARD</u></a>
	
  <div class="simpleform">
<form id ="registration" action="" method="post">
<h1>Add NGO</h1><br>

 <input type="text" name="fname" id="button" placeholder="Enter NGO Name" size="30" required><br><br>

<input type="email" name="username" id="button" placeholder="Enter NGO Email-Id" size="30" required><br><br>

<input type="text" name="yoe" id="button" size=20 placeholder="Year of Establishment" required><br><br>

 Contact No: <br>
<input type="text" id="phone" name="mobile"/>
<br><br>


Address:<br>
<input type="text" name="house" id="button" placeholder="Office No,Building & Area" size="30" required><br><br>
<input type="text" name="city" placeholder="City/Town/District" size="30" required><br><br>
<input type="text" name="state" placeholder="State/Union Territory" size="30" required> <br><br>
<input type="text" name="pincode" size=10 placeholder="Pincode" required><br><br>
<input type="text" name="country" placeholder="Country" size="30" required><br><br><br>
<input type="submit" name="submit" value="Create Account" > &nbsp&nbsp&nbsp
<input type="reset" name="reset" value="Reset">

</form>
</div> 
<?php } ?>
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