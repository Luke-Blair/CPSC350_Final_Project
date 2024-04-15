<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Culmination Project</title>
        <link rel = "stylesheet" href="stylesheet.css">
        <script src="script.js"></script>

        <?php
                $servername = "localhost";
                $DB = "Team_Panther";
                include "credentials.php";
                $connection = mysqli_connect($servername, $username, $password, $DB);

                if(mysqli_connect_errno()) {
                    echo "Failed to connect to server";
                } else {
                    echo "Connection succesful";
                }
            ?>
    </head>
    <body>
<div class="bg-img">
  <form action="/action_page.php" class="container">
    <h1>Login</h1>

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>

    <button type="submit" class="btn">Login</button>
  </form>
</div>

    </body>
</html>
