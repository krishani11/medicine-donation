<!DOCTYPE html>
<html>
<head>
<br><br><br>
<title>NGO Account Setup</title>
<link rel="stylesheet" type="text/css" href="logincss.css">
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
<body>
	<?php
        require('db.php');
        if(isset($_GET['token'])){
                $token= $_GET['token'];
                }
        if($_POST){
            extract($_POST);
                 if($password ==''){
                     $error[] = 'Please enter the password.';
                 }
                 if($cpassword ==''){
                     $error[] = 'Please confirm the password.';
                 }
                 if($password != $cpassword){
                     $error[] = 'Passwords do not match.';
                 }
                 if(strlen($password)<6){ // min 
                 $error[] = 'The password should be atleast 6 characters long.';
             }
              if(strlen($password)>50){ // Max 
                 $error[] = 'Password: Max length 50 Characters Not allowed';
             }
             $r="SELECT email FROM `ngo_pass_link` WHERE `token`='$token'"; 
             $emailtok='';
             $result=mysqli_query($con,$r);
             if(mysqli_num_rows($result)>0){
                $user_data=mysqli_fetch_assoc($result);
                $email= $user_data['email'];    
                if($email != '' ) {
                    $emailtok=$email;
                    }
                    else 
                      { 
                     $error[] = 'Link has been expired or something missing ';
                      $hide=1;
                      }
            }

     if(!isset($error)){
         $pass = hash('sha256', '$password');
         $c="UPDATE ngo_login SET Login_pass='$pass' WHERE Login_email='$emailtok'";
         $resultresetpass= mysqli_query($con,$c); 
         if($resultresetpass) 
         { 
                $success="<div class='form' style='font-family:Calibri;'><br><br> Your password has been created successfully! <br><br> <a class='home' href='ngologin.php'>Click here to Login </a> </div>";
     
               $resultdel = mysqli_query($con, "DELETE FROM ngo_pass_link WHERE token='$token'");
               $hide=1;
         }
     }  
         }
?>

	<div class="box">
		<img src="ngologo.jpg" class="quote">
		<h1> Setup NGO Account </h1>
<form action=" "  method="post">
<?php 
if(isset($error)){
        foreach($error as $error){
            echo '<div class="errmsg">'.$error.'</div><br>';
        }
    }
    if(isset($success)){
    echo $success;
  }
              ?>
<?php if(!isset($hide)){ ?>
<input type="password" name="password" placeholder="Password" required/>
<input type="password" name="cpassword" placeholder="Confirm Password" required/>
<input type="submit" name="Login" value="Submit">
<?php } ?>
</form>
</div>
</body>
</html>