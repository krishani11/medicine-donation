<?php
require_once('db.php');
$region_id = $_GET['region_id'];
$regions_data=mysqli_query($con,"SELECT * FROM city where region_id = $region_id ORDER BY city");
$regions = array();
while($region = mysqli_fetch_assoc($regions_data)){
	array_push($regions, $region);
}
print_r(json_encode($regions));

?>