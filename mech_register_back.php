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
$f_name=$_POST['mech_first_name'];
$l_name=$_POST['mech_last_name'];
$dob=$_POST['mech_dob'];
$service_type=$_POST['mech_service'];
$service_type_others=$_POST['mech_other_service'];
$house_no=$_POST['mech_house_no'];
$street=$_POST['mech_street'];
$village_city=$_POST['mech_village_city'];
$district=$_POST['mech_district'];
$email=$_POST['mech_email'];
$mob_num=$_POST['mech_mobile'];
$password=$_POST['mech_password'];

$sql = "INSERT INTO mech_details(f_name,l_name,dob,service_type,service_type_others,house_no,street,village_city,district,email,mob_num,password)
VALUES ('$f_name','$l_name','$dob','$service_type','$service_type_others','$house_no','$street','$village_city','$district','$email','$mob_num','$password')";

if(mysqli_query($conn,$sql))
{
echo "success";
}
else
{
echo "error";
}
mysqli_close($conn);
}
}
?>