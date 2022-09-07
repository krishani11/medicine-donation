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
<title>Medicine Donation</title>
</head>
<link rel="stylesheet" type="text/css" href="donationcss.css"/>
<body>
	<?php
$conn = new mysqli ('localhost', 'root', '', 'userdb');
session_start();
$user=$_SESSION["username"]; 
$query="SELECT * from user_login where Login_email='$user'";
$result = mysqli_query($conn, $query) or die( mysqli_error($conn));
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
$id=$row["ID"];
// If form submitted, insert values into the database.
if (isset($_REQUEST['username'])){
        // removes backslashes


 $fname = stripslashes($_REQUEST['fname']);
        //escapes special characters in a string
  $fname = mysqli_real_escape_string($conn,$fname); 
 
 $username= stripslashes($_REQUEST['username']);
 $username = mysqli_real_escape_string($conn,$username);

 $mobile= stripslashes($_REQUEST['mobile']);
 $mobile = mysqli_real_escape_string($conn,$mobile);

 $house= stripslashes($_REQUEST['house']);
 $house = mysqli_real_escape_string($conn,$house);

$city = stripslashes($_REQUEST['city']);
 $city = mysqli_real_escape_string($conn,$city);

 $state = stripslashes($_REQUEST['state']);
 $state = mysqli_real_escape_string($conn,$state);

 $pincode = stripslashes($_REQUEST['pincode']);
 $pincode = mysqli_real_escape_string($conn,$pincode);

 $country = stripslashes($_REQUEST['country']);
 $country  = mysqli_real_escape_string($conn,$country);
 
 $brand= stripslashes($_REQUEST['brand']);
 $brand = mysqli_real_escape_string($conn,$brand);

 $generic= stripslashes($_REQUEST['generic']);
$generic = mysqli_real_escape_string($conn,$generic);
 
 $quantity = stripslashes($_REQUEST['quantity']);
 $quantity = mysqli_real_escape_string($conn,$quantity);
 
 $expiry = stripslashes($_REQUEST['expiry']);
 $expiry = mysqli_real_escape_string($conn,$expiry);


$mt = stripslashes($_REQUEST['mt']);
 $mt = mysqli_real_escape_string($conn,$mt);

 $dt = stripslashes($_REQUEST['dt']);
 $dt= mysqli_real_escape_string($conn,$dt);

 $email = stripslashes($_REQUEST['email']);
 $email = mysqli_real_escape_string($conn,$email);

 $var1 = rand(1111,9999);  // generate random number in $var1 variable
 $var2 = rand(1111,9999);  // generate random number in $var2 variable

 $var3 = $var1.$var2;  // concatenate $var1 and $var2 in $var3
 $var3 = md5($var3);   // convert $var3 using md5 function and generate 32 characters hex number

 $fnm = $_FILES["image"]["name"];    // get the image name in $fnm variable
 $dst = "./all_images/".$var3.$fnm;  // storing image path into the {all_images} folder with 32 characters hex number and file name
 $dst_db = "all_images/".$var3.$fnm; // storing image path into the database with 32 characters hex number and file name

 move_uploaded_file($_FILES["image"]["tmp_name"],$dst);  // move image into the {all_images} folder with 32 characters hex number and image name


$query2 = "INSERT into donation_form (Full_name,Login_email,Mobile_no,Address,Country,brand_name,generic_name,quantity,expiry_date,medicine_type,donation_type,receiver_email,user_id,images)
VALUES ('$fname','$username','$mobile','$house.$city.$state.$pincode','$country','$brand','$generic','$quantity','$expiry','$mt','$dt','$email','$id','$dst_db')";
        $result1 = mysqli_query($conn,$query2);

        if($result1){
            echo "<div class='form'>
<h3>Your Donation Form has been successfully submitted. Your donated medicines will be soon collected by the NGO or some individual. Thank You for donating!! </h3>
<a class='home' href='donatordash.php'><u>GO TO DASHBOARD</u></a>
</div>";    
   }
    }else{
?>
<br><a class="home" href="donatordash.php"><u>DONOR DASHBOARD</u></a>
	<div class="simpleform">
<form id ="registration" action="" method="post" enctype="multipart/form-data">
 <h1>Medicine Details</h1> 
Full Name:<br><input type="text" name="fname" id="button" placeholder="" size="25" required><br><br>

Email Id: <br><input type="text" name="username" id="button" placeholder="" size="25" required><br><br>

Contact No: <br>
<input type="text" name="mobile" id="phone" size="19" required/>
<br><br>

Address for Medicine Collection:<br>
<input type="text" name="house" id="button" placeholder="House No,Building & Area" size="25" required><br><br>
<input type="text" name="city" placeholder="City/Town/District" size="25" required><br><br>
<input type="text" name="state" placeholder="State/Union Territory" size="25" required> <br><br>
<input type="text" name="pincode" size=10 placeholder="Pincode" required><br><br>
<input type="text" name="country" placeholder="Country" size="25" required><br><br>

Brand Name:<br>
<input type="text" name="brand" id="button" placeholder="" size="25" required><br><br>

Generic Name:<br>
<input type="text" name="generic" id="button" placeholder="" size="25" required><br><br>

Quantity: &nbsp&nbsp<input type="number" name="quantity" id="button" size="5" placeholder="" required><br><br>

Expiry Date: &nbsp&nbsp<input type="Date" name="expiry" id="button" placeholder="" size="25" required><br><br>

Medicine Type:<br>
<select id="mt" name="mt" required> <option>Select Medicine Type</option>
	<option> Capsule</option>
	 <option> Tablet</option>
 <option>Syrup</option>
 <option>Cream</option>
</select>
<br><br>


Donation Type:&nbsp&nbsp<input type="radio" name="dt" id="dt" value="NGO" checked="checked"> NGO
<br><br>

NGO's Email:<br>
<input type="text" name="email" size="25" required><br><br>

Attach Medicine(s) Image to be donated:<br>
<input type="file" name="image" Required><br><br><br>

<input type="submit" name="submit" value="Submit"> &nbsp&nbsp&nbsp
<input type="reset" name="reset" value="Clear">
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