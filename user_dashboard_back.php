<?php
//db connection
 $conn=mysqli_connect("localhost","root","","Quick Mechanist");   
  if (!$conn)
  {
   die(" connection failed".mysqli_connect_error());
   echo "database connection failed";
  }

  else{    
  if (isset($_POST['submit']))
  {    
      $email=$_POST['email'];
      $location=$_POST['location'];
      $vehicle=$_POST['vehicle_type'];
      $vehicle_problem=$_POST['vehicle_problem'];
      $query="INSERT INTO user_booking_request(email,user_request_place,vehicle_type,vehicle_problem,request_status) VALUES ('$email','$location','$vehicle','$vehicle_problem','PENDING')";

      if (mysqli_query($conn,$query))
      {
          echo "request success";

      }

      //if not present in db

      else
     {
      echo " some error";
      mysqli_close($conn);
     }
   }
  }
?>