<?php {
  // Create connection
  $conn = mysqli_connect("localhost", "root", "", "repairspot");
  // Check connection
  if (!$conn) {
    die("Connection failed" . mysqli_connect_error());
  }

  $order_id = $_POST['order_id'];
  $mech_name = $_POST['mech_email'];
  $mech_mobile_num = $_POST['mech_mobile_num'];
  $user_name = $_POST['user_name'];
  $location = $_POST['user_request_place'];
  $vehicle_type = $_POST['vehicle_type'];
  $vehicle_problem = $_POST['vehicle_problem'];
  $sql = "INSERT INTO mech_approved(order_id,user_name,approved_mech_name,mech_mobile_num,vehicle_type,vehicle_problem,location,order_status) 
  VALUES ('$order_id','$user_name','$mech_name','$mech_mobile_num','$vehicle_type','$vehicle_problem','$location','APPROVED')";
  if (mysqli_query($conn, $sql)) {
    echo "<script>
        alert('order approved');
      </script>";
    include 'mech_login.php';
  } else {
    echo "error";
  }
  mysqli_close($conn);
}
