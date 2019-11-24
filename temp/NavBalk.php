<?php
require "Header.php";
?>
<header>
    <nav>
        <a href="#">
            <img src="#" alt="logo">
        </a>

        <ul>
            <li><a href="../test/index.php">HOME</a></li>
            <li><a href="#">SEARCH OTHER PEOPLE</a></li>
            <li><a href="#">CONTACT</a></li>
        </ul>

        <div>
            <form action="../logic/login.logic.php" method="post">
                <input type="text" name="mailuid" placeholder="Enter you email address...">
                <input type="password" name="pwd" placeholder="Enter you email password...">
                <button type="sumbit" name="login-btn">Login</button>
            </form>

            <a href="signup.php">Signup</a>

            <form action="../logic/logout.logic.php" method="post">
                <button type="sumbit" name="logout-btn">Logout</button>
            </form>
        </div>
    </nav>
</header>
<?php
require "Footer.php";
?>
