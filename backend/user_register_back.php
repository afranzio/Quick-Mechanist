<?php
// name,otp,mob_num,latitude,longitude

if (isset($_POST['user_form_submit'])) {

  // Create connection
  $conn = mysqli_connect("localhost", "root", "", "repairspot");

  // Check connection
  if (!$conn) {
    die("Connection failed" . mysqli_connect_error());
  } else {
    $name = $_POST['name'];
    $mob_num = $_POST['mob_num'];
    $otp = rand(1111, 9999);

    $sql = "INSERT INTO user_details(name,otp,mob_num) VALUES ('$name', '$otp', '$mob_num')";
    if (mysqli_query($conn, $sql)) {

      $jayParsedAry = [
        "messages" => [
          [
            "channel" => "whatsapp",
            "to" => "'91" . $mob_num . "'",
            "content" => $otp
          ],
          [
            "channel" => "sms",
            "to" => "'91" . $mob_num . "'",
            "content" => $otp
          ]
        ]
      ];

      print_r($jayParsedAry);

      // Send OTP
      $url = 'https://platform.clickatell.com/v1/message';

      $options = array(
        'http' => array(
          'header'  => "Content-type: application/json\r\n, Authorization: aGvBybhRR0eNevM7QqSU1g==",
          'method'  => 'POST',
          'content' => http_build_query($jayParsedAry),
        )
      );

      $context  = stream_context_create($options);
      $result = file_get_contents($url, true, $context);

      var_dump($result);
      print_r($result);

      // header("Location: https://localhost/Quick-Mechanist/user_dashboard.php");
      // session_start();
      $_SESSION["name"] = $name;
      $_SESSION["mob_num"] = $mob_num;
      $_SESSION["otp"] = $otp;
    } else {
      echo "error";
    }
    mysqli_close($conn);
  }
}
