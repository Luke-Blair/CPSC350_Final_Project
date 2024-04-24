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
    $hero = $_POST['hero'];

    $sql_select_power = "SELECT superpower_id FROM Superpower WHERE power='$power'";
    $result_power = $conn->query($sql_select_power);

    $sql_select_hero = "SELECT superhero_id FROM Superhero WHERE real_name='$hero'";
    $result_hero = $conn->query($sql_select_hero);

    if ($result_power->num_rows == 0 || $result_hero->num_rows == 0) {
        echo "Power or hero cannot be found. Here's an idea, try adding the correct data?";
    } else {
        $hero_row = $result_hero->fetch_assoc();
        $hero_id = $hero_row['superhero_id'];
        $power_row = $result_power->fetch_assoc();
        $power_id = $power_row['superpower_id'];

        // Check if the relationship already exists
        $sql_check_relation = "SELECT * FROM Hero_Power WHERE superhero_id=$hero_id AND superpower_id=$power_id";
        $result_check_relation = $conn->query($sql_check_relation);

        if ($result_check_relation->num_rows > 0) {
            echo "Relationship already exists";
        } else {
            // Insert the relationship
            $sql_insert_relation = "INSERT INTO Hero_Power VALUES ($hero_id,$power_id)";

            if ($conn->query($sql_insert_relation) === TRUE) {
                echo "New power hero relationship inserted successfully.";
            } else {
                echo "Error inserting data: " . $conn->error;
            }
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
<h2>Add existing power to existing hero/villain</h2>
<form method="post">
    <div>
        <label>Character: </label><br>
        <input type="text" name="hero">
    </div>
    <div>
        <label>Power: </label><br>
        <input type="text" name="power">
    </div>
    <input type="submit" value="Submit">
</form>
</body>
</html>

