<!DOCTYPE html>

<head>
   <title>Quick Mechanist</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
   <style type="text/css">
      * {
         margin: 0;
         padding: 0;
      }

      .main {
         width: 100%;
         background: linear-gradient(to top, rgba(0, 0, 0, 0.5)50%, rgba(0, 0, 0, 0.5)50%), url(pexels-andrea-piacquadio-3807277.jpg);
         background-position: center;
         background-size: cover;
         height: 100vh;
      }

      .navbar {
         width: 1200px;
         height: auto;
         margin: auto;
      }

      .logo {
         color: #ff7200;
         font-size: 35px;
         font-family: Arial;
         padding-left: 2%;
         float: left;
         width: 150px;
         height: 120px;
      }

      .menu {
         float: left;
         height: 70px;
         display: flex;
      }

      ul {
         float: left;
         display: flex;
         justify-content: center;
         align-items: center;
      }

      ul li {
         list-style: none;
         margin-left: 3rem;
         font-size: 14px;
      }

      ul li a {
         text-decoration: none;
         color: #fff;
         font-family: Arial;
         font-weight: bold;
         transition: 0.4s ease-in-out;
         font-size: 1rem;
      }

      .link {
         margin: auto;
         width: 50%;
      }

      .link a {
         display: flex;
         justify-content: center;
      }

      .link button {
         font-family: Arial;
         width: 50%;
         height: 40px;
         background: #ff7200;
         border: 2px solid #ff7200;
         color: #fff;
         font-size: 15px;
         font-weight: bold;
         border-radius: 5px;
         transition: ease-in-out;
         margin-top: 5%;
      }

      .link a:hover {
         color: #fff;
      }

      .link button:hover {
         background: #ff7200;
         border: 2px solid #ff7200;
         color: #fff;
      }

      button {
         cursor: pointer;
      }

      @media only screen and (max-width: 600px) {
         .navbar {
            width: 100%;
         }
         .icon{
            display: none;
         }
         ul li{
            padding-left: 0.5rem;
            margin-left: 0.5rem;
         }
         .link{
            width: 100%;
         }
         .link button{
            width: 75%;
         }
      }
   </style>
</head>

<body>
   <div class="main">
      <div class="navbar">
         <div class="icon">
            <img class="logo" src="./assets/images/logo.png" alt="">
         </div>
         <div class="menu">
            <ul class="mb-0">
               <li><a href="/"> HOME</a></li>
               <li><a href=""> SERVICES</a></li>
               <li><a href=""> CONTACT</a></li>
               <li><a href=""> SEARCH</a></li>
            </ul>

         </div>
      </div>
      <div class="link">
         <a class="noHover" href="user_register.php">
            <button class="btn">REGISTER AS VEHICLE OWNER</button><br>
         </a>
         <a class="noHover" href="mech_register.php">
            <button class="btn">REGISTER AS MECHANIC</button><br>
         </a>
         <a class="noHover" href="user_login.php">
            <button class="btn">VEHICLE OWNER LOGIN</button><br>
         </a>
         <a class="noHover" href="mech_login.php">
            <button class="btn">MECHANIC LOGIN</button><br>
         </a>
      </div>
   </div>

</body>
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script> -->

</html>
<!--<button><a href="user_register.php">REGISTER AS VEHICLE OWNER</a></button>
				<button><a href="mech_register.php">REGISTER AS MECHANIC</a></button>
				<button><a href="user_login.php">VEHICLE OWNER LOGIN</a></button>
				<button><a href="mech_login.php">MECHANIC LOGIN</a></button>-->