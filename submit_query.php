<?php
// Start session
session_start();

// Database credentials
$servername = "localhost";
$DB = "Team_Panther";

include "credentials.php";

// Create connection
$connection = new mysqli($servername, $username, $password, $DB);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $query = $_POST['query'];

    //$sanitized_query = mysqli_real_escape_string($connection, $query); // $connection is your database connection

    //$result = mysqli_query($connection, $sanitized_query);
    $result = $connection->query($query);

    if ($result) {
        echo "Query executed successfully!";
    } else {
        echo "Error executing query: " . mysqli_error($connection);
    }

    mysqli_close($connection);
}
?>
