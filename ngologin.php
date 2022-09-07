<!DOCTYPE html>
<html>
<head>
<br><br><br>
<title> NGO Login</title>
<link rel="stylesheet" type="text/css" href="logincss.css"> 
</head>
<body>
	<?php
require('db.php');
session_start();
// If form submitted, insert values into the database.
if (isset($_POST['Login'])){
        // removes backslashes
 $username = stripslashes($_REQUEST['username']);    
        //escapes special characters in a string
 $username = mysqli_real_escape_string($con,$username);
 $password = mysqli_real_escape_string($con,$_POST['password']);
 $epassword = hash('sha256', '$password');
 //$epassword = SHA2('$password',256);
 //Checking is user existing in the database or not
        $query = "SELECT * FROM `ngo_login` WHERE Login_email='$username'
and Login_pass= '$epassword' ";
 $result = mysqli_query($con,$query) or die(mysqli_error($query));
 $rows = mysqli_num_rows($result);
        if($rows==1){
     $_SESSION['username'] = $username;
            // Redirect user to ngodashboard.php
     header("Location: ngodashboard.php");
         }
         else{
 echo "<div class='form'>
<h3>Username/password is incorrect.</h3>
<br/>Click here to <a href='ngologin.php'>Login</a></div>";
 }
    }else{
?>
	<div class="box">
		<img src="ngologo.jpg" class="quote">
		<h1> NGO Login </h1>
<form action=" "  method="post">
        
<input type="text" name="username" placeholder="Enter Email Id" required/>
<input type="password" name="password" placeholder="Enter Password" required/>
<input type="submit" name="Login" value="Login">
 

</form>
</div>
<?php } ?>
</body>
</html>   