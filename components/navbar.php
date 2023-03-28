<div class="navbar" style="background-color: #dee2e6;">
    <div class="w-75 m-auto d-flex justify-content-between align-self-center">
        <a href="/" style="text-decoration: none; color: rgba(33, 37, 41, 0.75);">
            <div class="icon align-self-center">
                <img src="./assets/images/car-care.png" alt="" srcset="" class="logoImg">
                <h5>
                    Mechanist
                </h5>
            </div>
        </a>
        <div class="menu">
            <ul class="mb-0">
                <li><a href="/"> HOME</a></li>
                <li><a href=""> SERVICES</a></li>
                <li><a href=""> CONTACT</a></li>
                <li><a href=""> SEARCH</a></li>
                <?php
                if (isset($_SESSION['name'])) {
                    echo '<li><a href="https://localhost/Quick-Mechanist/auth/logout.php">LOGOUT</a></li>';
                }
                ?>
            </ul>
        </div>
    </div>
</div>