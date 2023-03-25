<?php
  session_cache_limiter('private, must-revalidate');
session_cache_expire(60);
   session_start();
   ?>
<html>
<head>
	<title>dashboard</title>
	<link rel="stylesheet" type="text/css" href="file.css">
	<script type="text/javascript">
		alert('Login Success');
	</script>
</head>
<body>
	<div class="cointainer">
		<div class="logo">
			<h3>Quick Mechanist</h3>
			<h3>YOUR Email ID:</h3><b><?php echo $_POST['name'];?></b>
			<div class="body">
				         <H2>CURRENT ORDERS</H2>
				         <div>
				         	<form action="mech_approved.php" method="POST"><input type="hidden" name="mech_email" value="<?php echo $_POST['name']; ?>"><input type="hidden" name="mech_mobile_num" VALUE="<?php include 'mech_mobile.php';?>">
				         <?php
{
// Create connection
$conn = mysqli_connect("localhost","root","","repairspot");
// Check connection
if (!$conn) 
{
  die("Connection failed".mysqli_connect_error());
}
$sql = "SELECT last_updated,order_id,email,user_request_place,vehicle_type,vehicle_problem,request_status FROM user_booking_request WHERE request_status='PENDING'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  echo "<table><tr><th>ORDER ID</th><th>DATE & TIME</th><th>CUSTOMER EMAIL</th><th>LOCATION</th><th>VEHICLE TYPE</th><th>VEHICLE PROBLEM</th></tr>";
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<tr><td><input type='text' name='order_id'value='".$row["order_id"]."'readonly></td><td><input type='text' name='last_updated' value='".$row["last_updated"]."' readonly></td><td><input type='text' name='user_email' value='".$row["email"]."' readonly></td><td><input type='text' name='user_request_place' value='".$row["user_request_place"]."' readonly></td><td><input type='text' name='vehicle_type' value='".$row["vehicle_type"]."' readonly></td><td><input type='text' name='vehicle_problem' value='".$row["vehicle_problem"]."' readonly></td><td><input type='submit' name='approve' value='approve'></td></tr>";
  }
  echo "</table>";
} else {
  echo "0 results";
}
$conn->close();
}
?>
</form>
				<div class="content">
					    
				</div>
			</div>
		</div>
	</div>

</body>
</html>