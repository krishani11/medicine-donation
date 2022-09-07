<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8"> 
  	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet" />
	<link rel="stylesheet" type="text/css" href="donatordashcss.css"/>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
<script type = "text/javascript" >
   function preventBack(){window.history.forward();}
    setTimeout("preventBack()", 0);
    window.onunload=function(){null};
</script>
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
		


<title>Donator Dashboard</title>
</head>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "userdb"; 

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
session_start();
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT  ID, Full_name, Login_email, Contact_no, Address, Country, brand_name, generic_name, quantity, medicine_type,images FROM request_form";
$result = mysqli_query($conn, $sql);

?>
<body> 
	<!-- Header -->
	<section id="header">
		<nav class="navbar navbar-expand-lg fixed-top navbar-dark" style="background-color:rgba(222, 184, 135, 0.5);" >
			<div class="container-fluid">
			  <a class="navbar-brand" href="#">Medicine Donation Portal</a>
			  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			  </button>
              <center>
			  <div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav me-auto mb-2 mb-lg-0">
				  <li class="nav-item">
					<a class="nav-link" href="#home">View Requested Medicines</a>
				  </li>
				  <li class="nav-item">
					<a class="nav-link" href="#ngodetails">View Registered NGOs</a>
				  </li>
				  <li class="nav-item">
					<a class="nav-link" href="donation.php">Donate</a>
				  </li>
                  <li class="nav-item">
					<a class="nav-link" href="#mydonations">My Donations</a>
				  </li>
                  <li class="nav-item">
					<a class="nav-link" href="logout.php">Logout</a>
				  </li>
				</ul> 
			</div>
            </center>
		</div>
	  </nav>
	</section>

		<!-- View Requested Medicines -->
		<section id="home">
			<div class="container">
			<div class="row">
			<div class="col-md-12">
			<br><br><br><br><br><br>
				<h4 class="text-center mb-4">Individuals who had requested for specific medicines are listed below with all the necessary details. 
							Feel free to donate those requested medicines if you've got them!</h4>
				<div class="table-wrap">
					<table class="table">
					<thead class="thead-primary">
					  <tr>
						<th>Full Name</th>
						<th>Email-Id</th>
						<th>Address</th>
						<th>Brand Name</th>
						<th>Generic Name</th>
						<th>Quantity</th>
						<th>Medicine Type</th>
						<th>Prescription</th>
						<th>Donate</th>
					  </tr>
					</thead>
					<tbody>
					<?<?php 
						while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
						?>
						<tr>
							<td><?php echo $row['Full_name'];?></td>
							<td><?php echo $row['Login_email'];?></td>
							<td><?php echo $row['Address'];?></td>
							<td><?php echo $row['brand_name'];?></td>
							<td><?php echo $row['generic_name'];?></td>
							<td><?php echo $row['quantity'];?></td>
							<td><?php echo $row['medicine_type'];?></td>
							<td><a class="btn" href="<?php echo $row['images']; ?>" target="_blank">View Image</a></td>
							<td><a href="donationindividual2.php" class="btn">Donate</a></td>   
						</tr>
						</div>
						<?php 
						}
						?>
					</tbody>
				  </table>
				</div>
			</div>
		</div>
	</div>
	</section>

			<!-- View Registered NGOs Section  -->
  			<section id="ngodetails">
                <div class="container">
				<div class="row">
				<div class="col-md-12">
                <br><br><br><br>
					<h4 class="text-center mb-4">To make the donations for NGOs, you can donate to any of these below registered NGOs with our website. </h4>
					<div class="table-wrap">
						<table class="table">
					    <thead class="thead-primary">
						<tr>
						<th rowspan='2'>NGO Name</th>
						<th rowspan='2'>Email-Id</th>
						<th rowspan='2'>Contact No.</th>
						<th colspan="5"><center>Address</center></th>
					  </tr>
					<tr>
					  <th>Office</th>
						<th>City</th>
						<th>State</th>
						<th>Pincode</th>
						<th> Country </th>
					</tr>
					</thead>
					<tbody>
					<?php 
					$sql1 = "SELECT ID, Ngo_name, Login_email, Year, Contact_no, 
					Address, Country,State,Pincode,City,Country FROM ngo_login";

					$result1 = mysqli_query($conn, $sql1);

					while($row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC)) {
						?>
						<tr>
							<td><?php echo $row1['Ngo_name'];?></td>
							<td><?php echo $row1['Login_email'];?></td>
							<td><?php echo $row1['Contact_no'];?></td>
							<td><?php echo $row1['Address'];?></td>
							<td><?php echo $row1['City'];?></td>
							<td><?php echo $row1['State'];?></td>
							<td><?php echo $row1['Pincode'];?></td>  
							<td><?php echo $row1['Country'];?></td>
						</tr>
						</div>
						<?php 
							}
						?>
					    </tbody>
					  </table>
					</div>
				</div>
			</div>
		</div>
			</section>

			<!-- My donations -->
					<section id="mydonations">
					<div class="container">
					<div class="row">
					<div class="col-md-12">
					<br><br><br><br>
						<h4 class="text-center mb-4">My Donations</h4>
						<div class="table-wrap">
							<table class="table">
							<thead class="thead-primary">
							  <tr>
								<th>Full Name</th>
								<th>Email-Id</th>
								<th>Brand Name</th>
								<th>Generic Name</th>
								<th>Quantity</th>
								<th>Expiry Date</th>
								<th>Medicine Type</th>
								<th>Donation Type</th>
								<th>Receiver's Email</th>
							  </tr>
							</thead>
							<tbody>
							<?php 
							$user=$_SESSION["username"]; 
							$query3="SELECT * from user_login where Login_email='$user'";
							$result3 = mysqli_query($conn, $query3) or die( mysqli_error($conn));
							$row3=mysqli_fetch_array($result3,MYSQLI_ASSOC);
							$id=$row3["ID"];
							$sql3 = "SELECT * FROM donation_form WHERE user_id=$id";
							$result3= mysqli_query($conn, $sql3) or die( mysqli_error($conn));
							$rowcount=mysqli_num_rows($result3);
							for($i=1;$i<=$rowcount;$i++)
							{
								$row3=mysqli_fetch_array($result3,MYSQLI_ASSOC);
								?>
								<tr>
									<td><?php echo $row3['Full_name'];?></td>
									<td><?php echo $row3['Login_email'];?></td>
									<td><?php echo $row3['brand_name'];?></td>
									<td><?php echo $row3['generic_name'];?></td>
									<td><?php echo $row3['quantity'];?></td>
									<td><?php echo $row3['expiry_date'];?></td>
									<td><?php echo $row3['medicine_type'];?></td>
									<td><?php echo $row3['donation_type'];?></td>
									<td><?php echo $row3['receiver_email'];?></td> 
								</tr>
								</div>
								<?php 
								error_reporting(E_ALL ^ E_WARNING); 
								mysqli_close($conn);
							}
							?>
							</tbody>
						  </table>
						</div>
					</div>
				</div>
			</div>
			</section>

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
			<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
			<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
			<script src="lib/easing/easing.min.js"></script>
			<script src="lib/owlcarousel/owl.carousel.min.js"></script>
			<script src="lib/waypoints/waypoints.min.js"></script>
			<script src="lib/counterup/counterup.min.js"></script>
			<script src="lib/parallax/parallax.min.js"></script>
			
			<!-- Contact Javascript File -->
			<script src="mail/jqBootstrapValidation.min.js"></script>
			<script src="mail/contact.js"></script>
</body>
</html>


















	