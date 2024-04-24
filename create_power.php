<?php
// Start session
session_start();

// Database credentials
$servername = "localhost";
$DB = "Team_Panther";

include "credentials.php";

// Create connection
$conn = new mysqli($servername, $username, $password, $DB);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$perm = $conn->query("SELECT signed_in FROM AdminAccount WHERE username='admin'");;
$perm_row = $perm->fetch_assoc();
if ($perm_row['signed_in']==0) {
    echo 'What are you doing here bud?';
    die;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $power = $_POST['power'];   // Retrieve form data

    $sql_select_power = "SELECT power FROM Superpower WHERE power='$power'";
    $result_power = $conn->query($sql_select_power);

    if ($result_power->num_rows > 0) {
        echo "Power '$power' already exists.";
    } else {
        // Insert new power
        $sql_insert_power = "INSERT INTO Superpower (power) VALUES ('$power')";
        if ($conn->query($sql_insert_power) === TRUE) {
            echo "New power '$power' inserted successfully.";
        } else {
            echo "Error inserting data: " . $conn->error;
        }
    }
}
?>
<html>
<head>
    <meta charset="utf-8">
    <title>Make data easier to insert</title>
    <script src="script.js"></script>
</head>
<body>
<h2>Add a new Hero or Villain</h2>
<form method="post">
    <div>
        <label>Power: </label><br>
        <input type="text" name="power">
    </div>
    <input type="submit" value="Submit">
</form>
</body>
</html>

