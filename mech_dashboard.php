<?php
session_cache_limiter('private, must-revalidate');
session_cache_expire(60);
session_start();
?>
<html>

<head>
	<title>Mechanic Dashboard</title>
	<link rel="shortcut icon" href="./assets/images/car-care.png" type="image/x-icon"/>
	<!-- Styles and Fonts -->
	<!-- Bootstrap -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
	<!-- Custom CSS -->
	<link rel="stylesheet" href="./assets/css/styles.css">
	<!-- Font Icon -->
	<link rel="stylesheet" href="./assets/fonts/material-icon/css/material-design-iconic-font.min.css">
	<!-- Main CSS -->
	<link rel="stylesheet" href="./assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="./assets/css/file.css">
	
</head>

<body>
	<?php
	include('components/navbar.php');
	?>
	<div class="blur">
		<h5 class="my-3">Welcome <?Php echo $_SESSION['name']; ?>!</h5>
		<div class="cur-req">
			<h2>CURRENT ORDERS</h2>
			<form action="mech_approved.php" method="POST"><input type="hidden" name="mech_email" value="<?php echo $_SESSION['name']; ?>"><input type="hidden" name="mech_mobile_num" VALUE="<?php include 'mech_mobile.php'; ?>">
				<?php {
					// Create connection
					$conn = mysqli_connect("localhost", "root", "", "repairspot");
					// Check connection
					if (!$conn) {
						die("Connection failed" . mysqli_connect_error());
					}
					$sql = "SELECT last_updated,order_id,name,user_request_place,vehicle_type,vehicle_problem,request_status,latitude,longitude FROM user_booking_request WHERE request_status='PENDING'";
					$result = $conn->query($sql);

					if ($result && $result->num_rows > 0) {
						echo "<table><tr><th>ORDER ID</th><th>DATE & TIME</th><th>CUSTOMER NAME</th><th>LOCATION</th><th>VEHICLE TYPE</th><th>VEHICLE PROBLEM</th><th>Google Map</th></tr>";
						// output data of each row
						while ($row = $result->fetch_assoc()) {
							if ($row) {
								$gmapwith = "https://www.google.com/maps/dir/?api=1&origin=".$_SESSION['latitude'].",".$_SESSION['longitude']."&destination=" . $row['latitude'] . "," . $row['longitude'] . "";
								echo "<tr><td>" . $row["order_id"] . "</td><td>" . $row["last_updated"] . "</td><td>" . $row["name"] . "</td><td>" . $row["user_request_place"] . "</td><td>" . $row["vehicle_type"] . "</td><td>" . $row["vehicle_problem"] . "</td><td><a href='".$gmapwith."' target=_blank> Google Map </a></td><td><input type='submit' class='btn btn-success rounded-0' name='approve' value='Approve'></td></tr>";
							}
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
	<?php
	include('components/justFooter.php');
	?>
</body>

</html>