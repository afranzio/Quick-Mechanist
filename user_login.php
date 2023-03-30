<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Owner Signin</title>

    <link rel="shortcut icon" href="./assets/images/car-care.png" type="image/x-icon"/>

    <script type="text/javascript" src="https://otpless.com/auth.js"></script>
    <!-- Get user's whatsapp number and name -->

    <!-- Styles and Fonts -->
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="./assets/css/styles.css">
    <!-- Font Icon -->
    <link rel="stylesheet" href="./assets/fonts/material-icon/css/material-design-iconic-font.min.css">
    <!-- Main CSS -->
    <link rel="stylesheet" href="./assets/css/style.css">



    <script type="text/javascript">
        function otpless(otplessUser) {
            var waName = otplessUser.waName;
            var waNumber = otplessUser.waNumber;
            // Signup/signin the user and redirect to next page
        }
    </script>

    <script type="text/javascript">
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
        function showPassword() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
    <?php
    session_start();
    if (isset($_SESSION['name'])) {
        // Create connection
        $conn = mysqli_connect("localhost", "root", "", "repairspot");
        // Check connection
        if (!$conn) {
            die("Connection failed" . mysqli_connect_error());
        }
        $name = $_SESSION['name'];
        $sql = "SELECT * FROM user_details where mob_num='".$_SESSION['mob_num']."'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            header("Location: https://localhost/Quick-Mechanist/user_dashboard.php");
        }else{
            if(session_id() == '') {
                session_start();
            }
            Session_destroy();
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
        $conn->close();
    }
    ?>
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
                        <h2 class="form-title">Owner-Login</h2>
                        <form method="POST" action="user_login_back.php">
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
                            <div class="form-group form-button">
                                <input class="form-submit" name="submit" type="submit" value="Login" />
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure>
                            <img src="./assets/images/undraw_bike_ride.svg" alt="sing up image">
                        </figure>
                        <a href="https://localhost/Quick-Mechanist/mech_login.php" class="signup-image-link">Mechanic Login</a>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <?php
    include('components/justFooter.php');
    ?>
</body>

</html>