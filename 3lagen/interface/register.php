<?php
require "headerTicket.php";
?>
<main>
    <section id="login">
        <article id="titlehf">
            <h1>Haarlem festival</h1>
        </article>
        <article id="loginarticle">
            <h1>Register</h1>
            <?php
            if (isset($_GET['signup']))
            {
                if ($_GET['signup'] == "success") {
                    echo '<p>Succes! You have successfully registered an account</p>';
                }
            }
            else{
                ?>
                <form class="loginform" action="../includes/registerinc.php" method="post">
                        Name:<br>
                        <input type="text" name="username" placeholder="Full name"><br>
                        E-mail:<br>
                        <input type="text" name="email" placeholder="E-mail"><br>
                        Date of birth::<br>
                        <input type="text" name="dateOfBirth" placeholder="Date of birth 01-01-1999"><br>
                        Password:<br>
                        <input type="password" name="password" placeholder="Password"><br>
                        Retype password:<br>
                        <input type="password" name="password-repeat" placeholder="Repeat password"><br>
                    <?php
                    if (isset($_GET['error'])) {
                        if ($_GET['error'] == "emptyfields") {
                            echo '<p>Error: Not all fields are filled in!</p>';

                        } elseif ($_GET['error'] == "invalidemail") {
                            echo '<p>Error: E-mail is invalid!</p>';
                        } elseif ($_GET['error'] == "passwordnotequal") {
                            echo '<p>Error: Passwords dont match!</p>';
                        } elseif ($_GET['error'] == "usernameunavaileble") {
                            echo '<p>Error: Username is unavailable!</p>';
                        }
                    }
                    }
                    ?>
                        <input type="submit" name="cancel" value="Cancel">
                        <input type="submit" name="register" value="Register">

            </form>
        </article>
    </section>
</main>
<?php
require "footer.php";