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
    </head>
    <body>
        <?php
                $servername = "localhost";
                $DB = "Team_Panther";
                include "credentials.php";
                $conn = new mysqli($servername, $username, $password, $DB);

                if(mysqli_connect_errno()) {
                    echo "Failed to connect to server";
                } else {
                    echo "Connection succesful";
                }


if(isset($_GET['character']) && !empty($_GET['character'])) {
    $char = htmlentities($_GET['character']);
}

try {
    $result = $conn->query("SELECT * FROM Superhero WHERE superhero_id = $char");
} catch (Exception $e) {
    echo "Invalid Expression Entered, Check Syntax of Values Entered.<br>";
    $result = $conn->query("SELECT * FROM Superhero WHERE real_name = 'Tony Stark'");
}

$fields = $result->fetch_fields();
foreach ($fields as $col) {
    echo "<h5>" . $col->name . "</h5>";
}
$row = $result->fetch_assoc();
foreach ($row as $data) {
    echo "<p>" . $data . "</p>";
}


?>




    </body>
</html>
