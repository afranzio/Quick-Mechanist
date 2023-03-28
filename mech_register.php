<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<title> MECHANIC REGISTER</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
	<link rel="stylesheet" href="./assets/css/styles.css">
	<link rel="stylesheet" href="./assets/fonts/material-icon/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" href="./assets/css/style.css">

	<link rel="shortcut icon" href="./assets/images/car-care.png" type="image/x-icon"/>
	<style type="text/css">
		* {
			padding: 0;
			margin: 0;
		}

		.form-select {
			border: none;
			border-radius: 0;
			border-bottom: 1px solid #999;
			font-size: inherit;
			padding-left: 25px;
		}

		.form-select:focus {
			border-bottom: 1px solid #999;
		}

		.mech_other_service {
			display: none;
		}
	</style>
	<script type="text/javascript">
		//mechanic service=others...to open textbox
		function checkvalue() {
			var service = document.getElementById('mech_service_type').value;
			if (service == 'stype') {
				document.getElementById("other_service").style.display = 'none';
			}

			if (service == 'others') {
				document.getElementById("other_service").style.display = 'block';
			} else {
				document.getElementById("other_service").style.display = 'none';
			}
		}
		//password match
		function Validate() {
			var password = document.getElementById("password").value;
			var confirmPassword = document.getElementById("confirm_password").value;
			if (password != confirmPassword) {
				alert("Passwords do not match.");
				return false;
			}
			return true;
		}
		//password checkbox
		function myFunction() {
			var x = document.getElementById("password");
			if (x.type === "password") {
				x.type = "text";
			} else {
				x.type = "password";
			}
		}
	</script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<body>
	<div>
		<?php
		include('components/navbar.php');
		?>
		<section class="signup mt-3 mb-0">
			<div class="container">
				<div class="signup-content">
					<div class="signup-form">
						<h2 class="form-title">Mechanic</h2>
						<form name="my" method="POST" action="mech_register_back.php">
							<div class="form-group">
								<input type="text" name="name" id="name" placeholder="Name" />
							</div>
							<div class="form-group">
								<select class="form-select" onchange="checkvalue(this.value)" id="mech_service_type" required name="mech_service" required>
									<option value="stype" hidden>Select Service Type</option>
									<option value="bike_mechanic">
										Bike Mechanic
									</option>
									<option value="car_mechanic">
										Car Mechanic
									</option>
									<option value="others">
										Others
									</option>
								</select>
							</div>
							<div class="form-group mech_other_service" id="other_service">
								<input type="text" name="mech_other_service" id="mech_other_service" placeholder="If Others:" />
							</div>
							<div class="form-group">
								<div class="d-flex">
									<input type="tel" name="mob_num" id="email" placeholder="Phone Number" />
									<button type="button" class="btn btn-secondary" style="font-size: 8px;">
										Get OTP
									</button>
								</div>
							</div>
							<div class="form-group">
								<input type="password" name="otp" id="pass" placeholder="OTP" />
							</div>
							<input type="text" hidden name="latitude" id="latitude">
							<input type="text" hidden name="longitude" id="longitude">
							<div class="form-group form-button">
								<input class="form-submit" type="submit" id="btnsubmit" name="mech_form_submit" value="Register" onclick="return Validate()" />
							</div>
						</form>
					</div>
					<div class="signup-image">
						<figure>
							<img src="./assets/images/undraw_automobile_repair.svg" alt="sing up image">
							<!-- <img src="./assets/images/signup-image.jpg" alt="sing up image"> -->
						</figure>
						<a href="https://localhost/Quick-Mechanist/user_register.php" class="signup-image-link">Owner Register</a>
					</div>
				</div>
			</div>
		</section>
	</div>
	<div>
		<?php
		include('components/justFooter.php');
		?>
	</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
<script>
	$(document).ready(function() {
		if (navigator.geolocation) {
			navigator.geolocation.getCurrentPosition(showLocation);
		} else {
			$('#location').html('Geolocation is not supported by this browser.');
		}
	});

	function showLocation(position) {
		var latitude = position.coords.latitude;
		var longitude = position.coords.longitude;
		document.getElementById("latitude").value = latitude;
		document.getElementById("longitude").value = longitude;
	}
</script>

</html>