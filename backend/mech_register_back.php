<?php
if(isset($_POST['mech_form_submit']))
{
// Create connection
$conn = mysqli_connect("localhost","root","","repairspot");
// Check connection
if (!$conn) 
{
  die("Connection failed".mysqli_connect_error());
}
else{

$name = $_POST['name'];
$service_type = $_POST['mech_service'];
$service_type_others = $_POST['mech_other_service'];
$mob_num = $_POST['mob_num'];
$otp = rand(1111,9999);
$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];


$sql = "INSERT INTO mech_details(name, service_type, service_type_others, mob_num, otp, latitude, longitude)
VALUES ('$name', '$service_type', '$service_type_others', '$mob_num', '$otp', '$latitude', '$longitude')";

if(mysqli_query($conn,$sql))
{
// echo "success";
header("Location: https://localhost/Quick-Mechanist/mech_dashboard.php");
session_start();
$_SESSION['name']=$name;
$_SESSION['service_type']=$service_type;
$_SESSION['service_type_others']=$service_type_others;
$_SESSION['mob_num']=$mob_num;
$_SESSION['otp']=$otp;
$_SESSION['latitude']=$latitude;
$_SESSION['longitude']=$longitude;
}
else
{
echo "error";
}
mysqli_close($conn);
}
}