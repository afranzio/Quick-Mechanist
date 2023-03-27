<?php
if(isset($_POST['user_form_submit']))
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
$mob_num = $_POST['mob_num'];
$otp = rand(1000000,100);
$user_type = 'owner';
$latitude = '0';
$longitude = '0';

// name,otp,mob_num,latitude,longitude

$sql = "INSERT INTO user_details(name,otp,mob_num,latitude,longitude,user_type)
VALUES ('$name', '$otp', '$mob_num', '$latitude', '$longitude', '$user_type')";

if(mysqli_query($conn,$sql))
{
// echo "success";
header("Location: https://localhost/Quick-Mechanist/user_dashboard.php");
session_start();
$_SESSION["name"] = $name;
$_SESSION["mob_num"] = $mob_num;
$_SESSION["otp"] = $otp;
$_SESSION["user_type"] = $user_type;
$_SESSION["latitude"] = $latitude;
$_SESSION["longitude"] = $longitude;
}
else
{
echo "error";
}
mysqli_close($conn);
}
}
