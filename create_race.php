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
    $species_name = $_POST['species_name'];   // Retrieve form data
    $homeworld = $_POST['homeworld'];
    $average_lifespan = $_POST['average_lifespan'];

    // Insert the race
    $sql_insert_race = "INSERT INTO Race (species_name, homeworld, average_lifespan) VALUES ('$species_name', $homeworld, $average_lifespan)";

    if ($conn->query($sql_insert_race) === TRUE) {
        echo "New race '$species_name' inserted successfully.";
    } else {
        echo "Error inserting data: " . $conn->error;
    }
}
?>
<html>
<head>
    <meta charset="utf-8">
    <title>Add a New Race</title>
    <script src="script.js"></script>
</head>
<body>
<h2>Add a New Race</h2>
<form method="post">
    <div>
        <label>Species Name: </label><br>
        <input type="text" name="species_name">
    </div>
    <div>
        <label>Homeworld ID: </label><br>
        <input type="text" name="homeworld">
    </div>
    <div>
        <label>Average Lifespan: </label><br>
        <input type="text" name="average_lifespan">
    </div>
    <input type="submit" value="Submit">
</form>
</body>
</html>

