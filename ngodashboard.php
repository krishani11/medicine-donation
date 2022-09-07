
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet" />
	<link rel="stylesheet" type="text/css" href="ngodashboardcss.css"/>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    
	<!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"> 
<script type = "text/javascript" >
   function preventBack(){window.history.forward();}
    setTimeout("preventBack()", 0);
    window.onunload=function(){null};
</script>
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
		


<title>NGO Dashboard</title>
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
                        <a class="nav-link" href="#donationlist">View Donation List</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#assignexe">Assign Executive</a>
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

	<!-- Donation List -->
    <section id="donationlist">
		<center>
                <div class="container">
			<div class="row">
				<div class="col-md-12">
                <br><br><br><br>
					<h4 class="text-center mb-4">Donated Medicines</h4>
					<div class="table-wrap">
						<table class="table">
					    <thead class="thead-primary">
					      <tr>
                            <th> Donator's Name </th>
                            <th> Donator's Email-Id </th>
							<th> Donator's Contact No.</th>
                            <th> Donator's Address</th>
                            <th> Medicine Brand Name </th>
                            <th> Medicine Generic Name </th>
                            <th> Quantity</th>
                            <th> Expiry Date </th>
                            <th> Medicine Type </th>
                            <th> Your Email-Id</th>
					    </tr>
					    </thead>
					    <tbody>
							<?php
							$ngo=$_SESSION['username'];
							$query1="SELECT * from ngo_login where Login_email='$ngo'";
							$result1 = mysqli_query($conn, $query1) or die( mysqli_error($conn));
							$row1=mysqli_fetch_array($result1,MYSQLI_ASSOC);
							$id1=$row1["Login_email"];

							$sql1 = "SELECT * FROM donation_form WHERE receiver_email='$id1'";
							$result1 = mysqli_query($conn, $sql1) or die( mysqli_error($conn));
							$rowcount=mysqli_num_rows($result1);
							for($i=1;$i<=$rowcount;$i++)
							{
								$row1=mysqli_fetch_array($result1,MYSQLI_ASSOC); 
								

							?>
								<tr>
									<td><?php echo $row1['Full_name'];?></td>
									<td><?php echo $row1['Login_email'];?></td>
									<td><?php echo $row1['Mobile_no'];?></td>
									<td><?php echo $row1['Address'];?></td>
									<td><?php echo $row1['brand_name'];?></td>
									<td><?php echo $row1['generic_name'];?></td>
									<td><?php echo $row1['quantity'];?></td>
									<td><?php echo $row1['expiry_date'];?></td>
									<td><?php echo $row1['medicine_type'];?></td>
									<td><?php echo $row1['receiver_email'];?></td>
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
		</center>
		</section>


    <?php
    $sql = "SELECT  ID, Full_name, Login_email, Age, Gender, Address, Contact_no  FROM executive";
    $result = mysqli_query($conn, $sql);
    ?>

	<!-- Assign Executive -->
    <section id="assignexe">
			<div class="container">
		<div class="row">
			<div class="col-md-12">
			<br><br><br><br><br><br>
				<h4 class="text-center mb-4">Executive Details</h4>
				<div class="table-wrap">
					<table class="table">
					<thead class="thead-primary">
					<tr>
                        <th> Executive Name </th>
                        <th> Email-Id </th>
                        <th> Age </th>
                        <th> Gender </th>
                        <th> Address </th>
                        <th> Contact </th>
                        <th> Assign Executive</th>
					</tr>
					</thead>
					<tbody>
					<?<?php 
					while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
					?>
					<tr>
						<td><?php echo $row['Full_name'];?></td>
						<td><?php echo $row['Login_email'];?></td>
						<td><?php echo $row['Age'];?></td>
						<td><?php echo $row['Gender'];?></td>
						<td><?php echo $row['Address'];?></td>
						<td><?php echo $row['Contact_no'];?></td>
						<td><a href="assignexe.php" class="btn">Assign</a></td>   
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


















	