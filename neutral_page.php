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
<div class="image-container">
  <div class="text">NEUTRAL</div>
</div>
    </body>
</html>


