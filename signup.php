
<!DOCTYPE html>
<html>
<head>
<title> Registration Form</title>
<style>
    a.home
    {
      font-size: 25px;
      color:black;
    }
  </style>
<link rel="stylesheet" type="text/css" href="signupcss.css"/>
<link href='https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/css/intlTelInput.min.css" />
<link href="css/bootstrap.min.css" rel="stylesheet">
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.min.js"></script>
<script src="js/custom.js"></script>  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/intlTelInput.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/utils.min.js"></script>
</head>
<body>
    <?php
require('db.php');
// If form submitted, insert values into the database.
if (isset($_REQUEST['username'])){
        // removes backslashes

 $fname = stripslashes($_REQUEST['fname']);
        //escapes special characters in a string
 $fname = mysqli_real_escape_string($con,$fname); 
 
 $username= stripslashes($_REQUEST['username']);
 $username = mysqli_real_escape_string($con,$username);
 
 $password = stripslashes($_POST['password']);
 $password = mysqli_real_escape_string($con,$password);
 $epassword = hash('sha256', '$password'); 

 $cpassword = stripslashes($_REQUEST['cpassword']);
 $cpassword = mysqli_real_escape_string($con,$cpassword);
 
 $r1 = stripslashes($_REQUEST['r1']);
 $r1 = mysqli_real_escape_string($con,$r1);
 
 $age = stripslashes($_REQUEST['age']);
 $age = mysqli_real_escape_string($con,$age);
  
 $mobile = stripslashes($_REQUEST['mobile']);
 $mobile = mysqli_real_escape_string($con,$mobile);

 $bg = stripslashes($_REQUEST['bg']);
 $bg = mysqli_real_escape_string($con,$bg);

$pn = stripslashes($_REQUEST['pn']);
 $pn = mysqli_real_escape_string($con,$pn);
 
 $house= stripslashes($_REQUEST['house']);
 $house = mysqli_real_escape_string($con,$house);

$city = stripslashes($_REQUEST['city']);
$city = mysqli_real_escape_string($con,$city);

 $state = stripslashes($_REQUEST['region']);
 $state = mysqli_real_escape_string($con,$state);

 $pincode = stripslashes($_REQUEST['pincode']);
 $pincode = mysqli_real_escape_string($con,$pincode);

 $country = stripslashes($_REQUEST['country']);
 $country  = mysqli_real_escape_string($con,$country);

 if ($_POST["password"] == $_POST["cpassword"]) {
    
       $query = "INSERT into user_login (Full_name,Login_email,Login_pass,Gender,Age,Mobile_no,Blood_group,Address,City,State,Pincode,cid)
VALUES ('$fname','$username','$epassword','$r1','$age','$mobile','$bg.$pn','$house','$city','$state','$pincode','$country')";
        $result = mysqli_query($con,$query);
        if($result){
            echo " <div class='form' style='font-size:25px;'>
<h3>You are registered successfully.</h3>
<br/>Click here to <a class='home' href='login.php'><u>Login</u></a></div>";
        }
 }
 else{
    echo " <div class='form'>
    <h3>Password and Confirm Password does not match.</h3>
    <br/>Click here to <a href='signup.php'>Register</a> again</div>";

 } 
        
    }else{
    
?>
<div class="simpleform">
<form id ="registration" action="" method="post">
<h1>Sign Up</h1><br>

 <input type="text" name="fname" id="button" placeholder="Enter Your Full Name" size="25" required><br><br>

<input type="email" name="username" id="button" placeholder="Enter Your Email-Id" size="25" required><br><br>

<input type="password" name="password" id="button" placeholder="Enter Your Password" size="25" required><br><br>

<input type="password" name="cpassword" id="button" placeholder="Confirm Your Password" size="25" required><br><br>

 <input type="radio" id="rd" name="r1" value="male" required> Male &nbsp&nbsp&nbsp&nbsp <input type="radio" id="rd" name="r1" value="female" required> Female <br><br>

<input type="number" name="age" id="button" placeholder=" Age" required><br><br>

Contact No: <br>
<input type="text" name="mobile" id="phone" size="19" required/>
<br><br>

Blood Group:<br>
<select id="bg" name="bg" required> <option> A </option>
     <option> B </option>
 <option> AB</option>
 <option> O </option> &nbsp&nbsp
</select>
<select name="pn" required> <option> +ve </option>
     <option> -ve </option>
    </select><br> <br>

Address:<br>
<input type="text" name="house" id="button" placeholder="House No, Building & Area" size="25" required><br><br>
<select name="country" id="country" required>
	        <option value="0">Select Country</option>	
	        <?php
				$countries=mysqli_query($con,"SELECT * FROM country ORDER BY country");
				while($country = mysqli_fetch_assoc($countries)){
					echo "<option value='".$country['cid']."'>".$country['country']."</option>";
				}
				echo mysqli_error();
			?>
	        </select>
          <br><br>
          <select name="region" id="region" required>
	        	<option value="0">Select State/Union Territory</option>
	        </select> 
          <br><br>
          <select name="city" id="city" required>
	        <option value="0">Select City</option>
	        </select>
          <br><br>
<input type="text" name="pincode" size=10 placeholder="Pincode" required><br><br><br>
<input type="submit" name="submit" value="Create Account" > &nbsp&nbsp&nbsp
<input type="reset" name="reset" value="Reset">

</form>

</div>
<?php }?>
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