<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet" />
	<link rel="stylesheet" href="https://s3-us-west-2.amazonaws.com/s.cdpn.io/172203/bootstrap-touch-carousel.css"/>
	<link rel="stylesheet" type="text/css" href="welcomecss.css"/>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>

	<!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"> 

    <!-- Additional CSS Files-->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/lightbox.css">
	<link rel="stylesheet" href="assets/css/templatemo-grad-school.css">
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
	<link href="lib/flaticon/font/flaticon.css" rel="stylesheet">
	<link href="lib/animate/animate.min.css" rel="stylesheet">
	<link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
		


<title>Welcome</title>
</head>
<?php
$conn = new mysqli ('localhost', 'root', '', 'userdb');
session_start();

// If form submitted, insert values into the database.
if (isset($_REQUEST['username'])){
        // removes backslashes

 $fname = stripslashes($_REQUEST['fname']);
        //escapes special characters in a string
  $fname = mysqli_real_escape_string($conn,$fname); 
 
 $username= stripslashes($_REQUEST['username']);
 $username = mysqli_real_escape_string($conn,$username);

 $address= stripslashes($_REQUEST['address']);
 $address = mysqli_real_escape_string($conn,$address);
 
 $brand= stripslashes($_REQUEST['brand']);
 $brand = mysqli_real_escape_string($conn,$brand);

 $generic= stripslashes($_REQUEST['generic']);
$generic = mysqli_real_escape_string($conn,$generic);

 $quantity = stripslashes($_REQUEST['quantity']);
 $quantity = mysqli_real_escape_string($conn,$quantity);
 
 
$mt = stripslashes($_REQUEST['options']);
$mt = mysqli_real_escape_string($conn,$mt);

$var1 = rand(1111,9999);  // generate random number in $var1 variable
$var2 = rand(1111,9999);  // generate random number in $var2 variable
	
$var3 = $var1.$var2;  // concatenate $var1 and $var2 in $var3
$var3 = md5($var3);   // convert $var3 using md5 function and generate 32 characters hex number

$fnm = $_FILES["image"]["name"];    // get the image name in $fnm variable
$dst = "./all_images/".$var3.$fnm;  // storing image path into the {all_images} folder with 32 characters hex number and file name
$dst_db = "all_images/".$var3.$fnm; // storing image path into the database with 32 characters hex number and file name

move_uploaded_file($_FILES["image"]["tmp_name"],$dst);  // move image into the {all_images} folder with 32 characters hex number and image name


$query2 = "INSERT into request_form (Full_name,Login_email,Address,brand_name,generic_name,quantity,medicine_type,images)
VALUES ('$fname','$username','$address','$brand','$generic','$quantity','$mt','$dst_db')";
        $result1 = mysqli_query($conn,$query2);

        if($result1){
            echo "<div class='form'>
<h4>Your Request Form has been successfully submitted. <br> You will be intimidated about the availability of the medicine. We are grateful to help you !! </h4>
</div>";    
   }
    }else{
?>
<body> 
	<!-- Header -->
	<section id="header">
		<nav class="navbar navbar-expand-lg fixed-top navbar-dark" style="background-color:rgba(222, 184, 135, 0.6);">
			<div class="container-fluid">
			  <a class="navbar-brand" href="#">Medicine Donation Portal</a>
			  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			  </button>
			  <center>
			  <div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav me-auto mb-2 mb-lg-0">
					<!--&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp-->
				  <li class="nav-item">
					<a class="nav-link active" aria-current="page" href="#home">Home</a>
				  </li>
				  <div class="nav-item dropdown">
					<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Login</a>
					<div class="dropdown-menu">
						<a href="login.php" class="dropdown-item">Donator Login</a>
						<a href="adminlogin.php" class="dropdown-item">Admin Login</a>
						<a href="ngologin.php" class="dropdown-item">NGO Login</a>
					</div>
				  </div>
				  <li class="nav-item">
					<a class="nav-link" href="#request">Request</a>
				  </li>
				  <li class="nav-item">
					<a class="nav-link" href="#faq">FAQ</a>
				  </li>
				  <li class="nav-item">
					<a class="nav-link" href="#contact">Contact</a>
				  </li>
				</ul>
			</div>
		</center>
		</div>
	  </nav>
	</section>
	<!-- End of Header -->


			<!-- Home Section  -->
  			<section id="home">
				<div class="container">
					<div class="row">
						<div class="col-md-8 offset-md-2 info">
							<br><br><br><br><br><br>
							<i><h1 class="wow bounceInDown" data-wow-duration="1s" data-wow-delay="0.1s">
							"The measure of life is not its duration, but its donation!"</h1></i><br>
							<p class="lead wow zoomIn" data-wow-duration="2s" data-wow-delay="0.5s">
								Welcome to the Donation Community
							</p>
							<a href="login.php" class="btn btn-md text-center">Donate Now</a>
						</div>
					</div>
				</div>
			</section>

			<section class="features">
				<div class="container">
				  <div class="row">
					<div class="col-lg-4 col-12">
					  <div class="features-post">
						<div class="features-content">
						  <div class="content-show">
							<h4><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-thermometer-high" viewBox="0 0 25 25">
								<path d="M9.5 12.5a1.5 1.5 0 1 1-2-1.415V2.5a.5.5 0 0 1 1 0v8.585a1.5 1.5 0 0 1 1 1.415z"/>
								<path d="M5.5 2.5a2.5 2.5 0 0 1 5 0v7.55a3.5 3.5 0 1 1-5 0V2.5zM8 1a1.5 1.5 0 0 0-1.5 1.5v7.987l-.167.15a2.5 2.5 0 1 0 3.333 0l-.166-.15V2.5A1.5 1.5 0 0 0 8 1z"/>
							  </svg>Why Medicine?</h4>
						  </div>
						  <div class="content-hide">
							<p>Our health is a fundamental part of being human. Without it, we have nothing.
								Report shows, nearly 2 billion people have no access to basic medicines, 
								causing a cascade of preventable misery and suffering.</p>
							<p class="hidden-sm">Our health is a fundamental part of being human. Without it, we have nothing.
								Report shows, nearly 2 billion people have no access to basic medicines, 
								causing a cascade of preventable misery and suffering.</p>
						</div>
						</div>
					  </div>
					</div>
					<div class="col-lg-4 col-12">
					  <div class="features-post second-features">
						<div class="features-content">
						  <div class="content-show">
							<h4><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 25 25">
								<path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
								<path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
							  </svg>Our Vision</h4>
						  </div>
						  <div class="content-hide">
							<p>Our website drives the future of healthcare by connecting people with surplus medications.
								Our system is built to ensure compliance and provide full liability protection.</p>
								<p class="hidden-sm">Our website drives the future of healthcare by connecting people with surplus medications.
									Our system is built to ensure compliance and provide full liability protection.</p>
						</div>
						</div>
					  </div>
					</div>
					<div class="col-lg-4 col-12">
					  <div class="features-post third-features">
						<div class="features-content">
						  <div class="content-show">
							<h4><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 25 25">
								<path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
								<path fill-rule="evenodd" d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z"/>
								<path d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z"/>
							  </svg>Join Us</h4>
						  </div>
						  <div class="content-hide">
							<p>You can join us easily with different aspects to become a part of the impact. 
								You can be a Donator, Volunteer, Executive, Pharmacist or any Non Governmental Organisations.</p>
								<p class="hidden-sm">You can join us easily with different aspects to become a part of the impact. 
									You can be a Donator, Volunteer, Executive, Pharmacist or any Non Governmental Organisations.</p>
						</div>
						</div>
					  </div>
					</div>
				  </div>
				</div>
			  </section>
			  
			          <!-- Request Start -->
					  <section id="request">
					  <div class="donate"  sdata-parallax="scroll" data-image-src="medcap.jpeg">
						<div class="container">
							<div class="row align-items-center">
								<div class="col-lg-7">
									<div class="donate-content">
										<div class="section-header">
											<p>Request Now</p>
										</div>
										<div class="donate-text">
											<p>
												Not just for NGOs' but we also understand an individual's need for medicine.<br> So, if you wish to request for medicines simply fill the following form and then you can create a request for the medicines you need!
											</p>
										</div>
									</div>
								</div>
								<div class="col-lg-5">
									<div class="donate-form">
										<form method="post" enctype="multipart/form-data">
											<div class="control-group">
												<input type="text" class="form-control" name="fname" placeholder="Name" required="required" />
											</div>
											<div class="control-group">
												<input type="email" class="form-control" name="username" placeholder="Email" required="required" />
											</div>
											<div class="control-group">
												<textarea class="form-control" name="address" placeholder="Address" required="required"></textarea>
											</div>
											<div class="form-row">
												<div class="col">
												  <input type="text" class="form-control" name="brand" placeholder="Medicine Brand Name" required="required"/>
												</div>
												<div class="col">
												  <input type="text" class="form-control" name="generic" placeholder="Medicine Generic Name"required="required"/>
												</div>
											</div>
											<br>
											<div class="control-group">
												<input type="number" class="form-control" name="quantity" placeholder="Quantity" required="required" />
											</div>
											<div class="control-group">
                                                <select class="form-control" name="options" id="exampleFormControlSelect1">
                                                    <option>Select Medicine Type</option>
                                                    <option>Tablet</option>
                                                    <option>Capsule</option>
                                                    <option>Syrup</option>
                                                    <option>Cream</option>
                                                </select>
											</div>
											<div class="control-group">
											<div class="form-c">Please attach your Medicine Prescription here:</div>
												<input type="file" class="form-control" name="image" placeholder=""  required="required"/><br>
											</div>
											<div>
												<button class="btn btn-custom" name="submit" type="submit">Request Now</button>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
				<!-- Request End -->
			<?php } ?>

	<!-- Image Slider -->
	<section>
	<div class="container">
    <div id="carouselExample" class="carousel slide" data-bs-ride="carousel" data-bs-interval="2500">
   <div class="carousel-indicators">
     <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="0" class="active"></button>
     <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="1"></button>
     <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="2"></button>
   </div>
   <div class="carousel-inner">
     <div class="carousel-item active">
       <img class="d-block w-100" src="slidequote.jpeg" alt="First slide">
     </div>
     <div class="carousel-item">
       <img class="d-block w-100" src="slidequote2.jpg" alt="Second slide">
     </div>
     <div class="carousel-item">
       <img class="d-block w-100" src="slidequote3.jpg" alt="Third slide">
     </div>
   </div>
   <button class="carousel-control-prev" data-bs-target="#carouselExample" type="button" data-bs-slide="prev">
     <span class="carousel-control-prev-icon" aria-hidden="true"></span>
     <span class="visually-hidden">Previous</span>
   </button>
   <button class="carousel-control-next" data-bs-target="#carouselExample" type="button" data-bs-slide="next">
     <span class="carousel-control-next-icon" aria-hidden="true"></span>
     <span class="visually-hidden">Next</span>
   </button>
  </div>
  </div>
	</section>
  <!--End of Image Slider -->


<?php
require('db.php');
// If form submitted, insert values into the database.
if (isset($_REQUEST['email'])){
        // removes backslashes

 $fname = stripslashes($_REQUEST['fname']);
        //escapes special characters in a string
 $fname = mysqli_real_escape_string($con,$fname); 
 
 $email= stripslashes($_REQUEST['email']);
 $email = mysqli_real_escape_string($con,$email);
 
 
 $msg = stripslashes($_REQUEST['msg']);
 $msg = mysqli_real_escape_string($con,$msg);


$query = "INSERT into executive_interestform (name, email, msg)
VALUES ('$fname','$email','$msg')";
        $result = mysqli_query($con,$query);
		if($result){
            echo "<div class='form'>
<h4>Thank You for your interest in being a part of our cause.<br>After reviewing you application, we'll soon get back to you!</h4>
</div>";    
   }
    }else{
?>

			    <!-- Executive Interest form Start -->
				<section>
				   <div class="volunteer" data-parallax="scroll" data-image-src="img/volunteer.jpg">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-5">
                        <div class="volunteer-form">
                            <form>
                                <div class="control-group">
                                    <input type="text" class="form-control" placeholder="Name" name="fname" required="required" />
                                </div>
                                <div class="control-group">
                                    <input type="email" class="form-control" placeholder="Email" name="email" required="required" />
                                </div>
                                <div class="control-group">
                                    <textarea class="form-control" placeholder="Why do you want to become an executive?" name="msg" required="required"></textarea>
                                </div>
                                <div>
                                    <button class="btn btn-custom" type="submit">Become an executive</button>
                                </div>                                         
                            </form>                      
                        </div>
                     </div>                  
                    <div class="col-lg-7"> 
                        <div class="volunteer-content">
                            <div class="section-header">
                                <p>Become An executive</p>
                            </div>
                            <div class="volunteer-text">
                                <p>
                                    You can be an executive associated with our portal. Fill the form now to be able to support our cause!

                                </p>    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
	</section>
	<?php } ?>
        <!-- Executive Interest form End -->
			
					<!--FAQ Start-->
					<section id="faq" class="section">
						<div class="wrapsection">
							<div class="container">
								<div class="row">
									<div class="col-md-12 sol-sm-12">
										<div class="maintitle"><br><br>
											<h3 class="section-title">Frequently Asked Questions (FAQs)</h3>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-4 col-sm-12">
										<details>
											<summary>Can I donate only unused medicines?</summary>
											<p class="text">We directly accept medicines from pharmacies, wholesalers, and manufacturers. If you are individual with unused medicine to donate, you can donate through any of our NGO or executives. You can also contribute to our cause with a monetary donation. Every little bit helps, and we appreciate your support.</p>
										 </details>
										 <details>
											<summary>I am an individual & I want to donate my unused medicine. How?</summary>
											<p class="text">To donate your unused medicine as an individual you can be a Donator. Follow the procedure in the User Signup to create your account and then, you can get started and be a part of the Donation process.</p>
										 </details>
										 <details>
											<summary>I want to request for some medicine. How? </summary>
											<p class="text">Not just for NGOs' but we also understand an individual's need for medicine. So, if you wish to request for medicines simply go to the Request tab on our welcome page and there you can request for the medicines you need.</p>
										 </details>
									</div>
									<div class="col-md-4 col-sm-12">
										<details>
											<summary>Who are you and what is your platform for?</summary>
											<p class="text">Not taking your medications often leads to worse outcomes with respect to your health. That’s why we’re here. Our website, Medicine Donation Portal provides access to medications so that everyone gets the care they deserve.</p>
										 </details>
										 <details>
											<summary>Can I contribute to the mission being an executive volunteer?</summary>
											<p class="text">Not everyone has medicines to donate. You can join us and become a part of the impact by being an executive or volunteer. Any indivdual interested to be an intermediator between the donator and the receiving end (NGO or an individual), can apply for the same.</p>
										 </details>
										 <details>
											<summary>Where can I get medicine generic name and expiry date?</summary>
											<p class="text">You can get the generic name, expiry date and various other details of medicines from the list of donated medicines by the Donator.</p>
										 </details>
									</div>
									<div class="col-md-4 col-sm-12">
										<details>
											<summary>Can I donate expired medicines?</summary>
											<p class="text">Our system is built to ensure proper heatlhcare of people. Expired medicines are harmful to the health of any person and donation of the same is strictly prohibited.</p>
										 </details>
										 <details>
											<summary>How can NGOs register with our website?</summary>
											<p class="text">NGOs need to email us via oumdsp@gmail.com with the necessary details to get registered. NGOs who are willing to register can refer this <a href="ngoreg.php">link</a>.</p>
										 </details>
									</div>
								</div>
							</div>
						</div>
						</section>
						<!--FAQ End-->
				


<?php
require('db.php');
// If form submitted, insert values into the database.
if (isset($_REQUEST['uemail'])){
        // removes backslashes
$fname = stripslashes($_REQUEST['fname']);
$fname = mysqli_real_escape_string($con,$fname); 
 
 $email= stripslashes($_REQUEST['uemail']);
 $email = mysqli_real_escape_string($con,$email);
 
 $sub = stripslashes($_REQUEST['sub']);
 $sub = mysqli_real_escape_string($con,$sub);
 
 $msg = stripslashes($_REQUEST['msg']);
 $msg = mysqli_real_escape_string($con,$msg);


$query2 = "INSERT into user_feedback (Full_name, Login_email, Sub, Msg)
VALUES ('$fname','$email','$sub','$msg')";
        $result2 = mysqli_query($con,$query2);

        if($result2){
            echo "<div class='form1'>
<h4>Thank You for raising your query. We'll soon get back to you!</h4>
</div>";    
   }
    }else{
?>
						<!-- Contact Start -->
						<section id="contact">
								 <div class="contact">
									<div class="container">
										<div class="section-header text-center">
											<p>Get In Touch</p>
											<h2>Contact for any query</h2>
										</div>
										<div class="contact-img">
											<img src="medcap.jpeg" alt="Image">
										</div>
										<div class="contact-form">
												<div id="success"></div>
												<form id="contactForm">
													<div class="control-group">
														<input type="text" class="form-control" name="fname" id="name" placeholder="Your Name" required="required" data-validation-required-message="Please enter your name" />
														<p class="help-block text-danger"></p>
													</div>
													<div class="control-group">
														<input type="email" class="form-control" name="uemail" id="email" placeholder="Your Email" required="required" data-validation-required-message="Please enter your email" />
														<p class="help-block text-danger"></p>
													</div>
													<div class="control-group">
														<input type="text" class="form-control" name="sub" id="subject" placeholder="Subject" required="required" data-validation-required-message="Please enter a subject" />
														<p class="help-block text-danger"></p>
													</div>
													<div class="control-group">
														<textarea class="form-control" name="msg" id="message" placeholder="Message" required="required" data-validation-required-message="Please enter your message"></textarea>
														<p class="help-block text-danger"></p>
													</div>
													<div>
														<button class="btn btn-custom" type="submit" id="send">Send Message</button>
													</div>
												</form>
											</div>
									</div>
								</div>
						</section>
						<?php } ?>
						<!-- Contact End -->


			<!-- Scripts -->
			<!-- Bootstrap core JavaScript -->
			<script src="jquery.min.js"></script>
			<script src="bootstrap.min.js"></script>
			<script src="waypoints.min.js"></script>
			<script src="jquery.scrollTo.min.js"></script>
			<script src="jquery.localScroll.min.js"></script>
			<script src="jquery.magnific-popup.min.js"></script>
			<script src="validate.js"></script>
			<script src="common.js"></script>
			<script src="jquery.min.js"></script>
			<script src="bootstrap.bundle.min.js"></script>

			<script src="assets/js/isotope.min.js"></script>
			<script src="assets/js/owl-carousel.js"></script>
			<script src="assets/js/lightbox.js"></script>
			<script src="assets/js/tabs.js"></script>
			<script src="assets/js/video.js"></script>
			<script src="assets/js/slick-slider.js"></script>
			<script src="assets/js/custom.js"></script>

			<!-- JavaScript Libraries -->
			<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
			<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
			<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
			<script src="lib/easing/easing.min.js"></script>
			<script src="lib/owlcarousel/owl.carousel.min.js"></script>
			<script src="lib/waypoints/waypoints.min.js"></script>
			<script src="lib/counterup/counterup.min.js"></script>
			<script src="lib/parallax/parallax.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

			</body>
			</html>


















	