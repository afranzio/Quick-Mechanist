<?php
session_cache_limiter('private, must-revalidate');
session_cache_expire(60);
session_start();
?>
<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    body {
      font-family: Arial, Helvetica, sans-serif;
    }

    * {
      box-sizing: border-box;
    }

    /* Button used to open the contact form - fixed at the bottom of the page */
    .open-button {
      background-color: #555;
      color: white;
      margin-left: 40%;
      padding: 16px 20px;
      border: none;
      cursor: pointer;
      opacity: 0.8;
      position: center;
      bottom: 23px;
      right: 28px;
      width: 280px;
    }

    /* The popup form - hidden by default */
    .form-popup {
      display: none;
      margin-right: 30%;
      margin-bottom: 3%;
      position: fixed;
      bottom: 0;
      right: 15px;
      border: 3px solid #f1f1f1;
      z-index: 9;
    }

    /* Add styles to the form container */
    .form-container {
      max-width: 500px;
      padding: 10px;
      background-color: white;
    }

    /* Full-width input fields */
    .form-container input[type=text],
    .form-container input[type=password] {
      width: 100%;
      padding: 15px;
      margin: 5px 0 22px 0;
      border: none;
      background: #f1f1f1;
    }

    /* When the inputs get focus, do something */
    .form-container input[type=text]:focus,
    .form-container input[type=password]:focus {
      background-color: #ddd;
      outline: none;
    }

    /* Set a style for the submit/login button */
    .form-container .btn {
      background-color: #04AA6D;
      color: white;
      padding: 16px 20px;
      border: none;
      cursor: pointer;
      width: 100%;
      margin-bottom: 10px;
      opacity: 0.8;
    }

    /* Add a red background color to the cancel button */
    .form-container .cancel {
      background-color: red;
    }

    /* Add some hover effects to buttons */
    .form-container .btn:hover,
    .open-button:hover {
      opacity: 1;
    }

    /* table for current orders */
    table,
    th,
    td {
      border: 2px solid green;
    }
  </style>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<body>

  <h2>Quick Mechanist</h2>
  <p>YOUR EMAIL ID: <?Php echo $_POST['name']; ?></p>
  <p align="center">ANY REPAIR OF YOUR VEHICLE</p>

  <button class="open-button" onclick="openForm()">REQUEST TO REPAIR</button>

  <div class="form-popup" id="myForm">
    <form action="user_dashboard_back.php" method="POST" class="form-container">
      <h1>REPAIR REQUEST</h1>

      <label for="email"><b>EMAIL</b></label>
      <input type="text" value="<?Php echo $_POST['name'];?>" name="email" readonly>

      <label for="location"><b>LANDMARK</b></label>
      <input type="text" placeholder="Enter Address" name="location" required autocomplete="off">

      <label for="vehicle"><b>VEHICLE</b></label>
      <input type="text" placeholder="bike,car,truck etc" name="vehicle_type" required autocomplete="off">

      <label for="vehicle_problem"><b>VEHICLE PROBLEM</b></label>
      <input type="text" placeholder="puncher,break failure,engine malfunction etc" name="vehicle_problem" required autocomplete="off">

      <input type="text" hidden name="latitude" id="latitude">
      <input type="text" hidden name="longitude" id="longitude">

      <input class="btn" type="submit" name="submit">
      <button type="button" class="btn cancel" onclick="closeForm()">Cancel</button>
    </form>
  </div>
  <div class="cur-req">
    <h2>CURRENT ORDERS</h2>
    <form method="POST" action="user_cancel.php">
      <?php {
        // Create connection
        $conn = mysqli_connect("localhost", "root", "", "repairspot");
        // Check connection
        if (!$conn) {
          die("Connection failed" . mysqli_connect_error());
        }
        $email = $_POST['name'];
        $sql = "SELECT order_id,last_updated,user_request_place,vehicle_type,vehicle_problem FROM user_booking_request where email='$email' AND request_status='PENDING'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          echo "<table><tr><th>ORDER ID</th><th>DATE&TIME</th><th>LANDMARK</th><th>VEHICLE TYPE</th><th>VEHICLE PROBLEM</th></tr>";
          // output data of each row
          while ($row = $result->fetch_assoc()) {
            echo "<tr><td><input type='text' name='order_id' value='" . $row["order_id"] . "' readonly></td><td>" . $row["last_updated"] . "</td><td>" . $row["user_request_place"] . "</td><td>" . $row["vehicle_type"] . "</td><td>" . $row["vehicle_problem"] . "</td><td><input type='submit' name='cancel' value='cancel'></td></tr>";
          }
          echo "</table>";
        } else {
          echo " NO ORDERS FOUND";
        }
        $conn->close();
      }
      ?>
    </form>
  </div>
  <div class="approved-orders">
    <h2>APPROVED ORDERS</h2>
    <form method="POST" action="">
      <?php {
        // Create connection
        $conn = mysqli_connect("localhost", "root", "", "repairspot");
        // Check connection
        if (!$conn) {
          die("Connection failed" . mysqli_connect_error());
        }
        $email = $_POST['name'];
        $sql = "SELECT order_id,approved_mech_email,mech_mobile_num,order_status,approved_datetime FROM mech_approved where user_email='$email'";
        $result = $conn->query($sql);

        if ($result && $result->num_rows > 0) {
          echo "<table><tr><th>ORDER ID</th><th>MECHANIC EMAIL</th><th>MECHANIC MOBILE NUM</th><th>ORDER STATUS</th><th>APPROVED DATE&TIME</th></tr>";
          // output data of each row
          while ($row = $result->fetch_assoc()) {
            echo "<tr><td><input type='text' name='order_id' value='" . $row["order_id"] . "' readonly></td><td>" . $row["approved_mech_email"] . "</td><td>" . $row['mech_mobile_num'] . "</td><td>" . $row["order_status"] . "</td><td>" . $row["approved_datetime"] . "</td></tr>";
          }
          echo "</table>";
        } else {
          echo " NO ORDERS FOUND";
        }
        $conn->close();
      }
      ?>
    </form>

  </div>
  <div class="odr-htry">
    <h2>ORDER HISTORY</h2>
    <?php {
      // Create connection
      $conn = mysqli_connect("localhost", "root", "", "repairspot");
      // Check connection
      if (!$conn) {
        die("Connection failed" . mysqli_connect_error());
      }
      $email = $_POST['name'];
      $sql = "SELECT order_id,last_updated,user_request_place,vehicle_type,vehicle_problem,request_status FROM user_booking_request where email='$email' AND request_status='CANCELLED' or request_status='COMPLETED'";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        echo "<table><tr><th>ORDER ID</th><th>ORDER CANCELLED/COMPLETED<br>DATE&TIME</th><th>LOCATION</th><th>VEHICLE TYPE</th><th>VEHICLE PROBLEM</th><th>ORDER STATUS</th></tr>";
        // output data of each row
        while ($row = $result->fetch_assoc()) {
          echo "<tr><td>" . $row["order_id"] . "</td><td>" . $row["last_updated"] . "</td><td>" . $row["user_request_place"] . "</td><td>" . $row["vehicle_type"] . "</td><td>" . $row["vehicle_problem"] . "</td><td>" . $row['request_status'] . "</td></tr>";
        }
        echo "</table>";
      } else {
        echo " NO ORDERS FOUND";
      }
      $conn->close();
    }
    ?>
  </div>
  <script>

    function openForm() {
      document.getElementById("myForm").style.display = "block";
    }

    function closeForm() {
      document.getElementById("myForm").style.display = "none";
    }
    /*var x = document.getElementById("demo");

    function getLocation() {
      if (navigator.geolocation) {
        navigator.geolocation.watchPosition(showPosition);
      } else { 
        x.innerHTML = "Geolocation is not supported by this browser.";
      }
    }
        
    function showPosition(position) {
        x.innerHTML="Latitude: " + position.coords.latitude + 
        "<br>Longitude: " + position.coords.longitude;*/
  </script>

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
      var gmap = `https://maps.google.com/?q=${latitude},${longitude}`
      var gmapwith = `https://www.google.com/maps/dir/?api=1&origin=${latitude},${longitude}&destination=34.059808,-118.368152`
      document.getElementById("location").innerHTML = `<a href=${gmapwith} target=_blank> Google Map </a>`
    }
  </script>

</body>

</html>