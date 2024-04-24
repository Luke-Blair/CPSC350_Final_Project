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
    // Retrieve form data
    $hero_alias = $_POST['al'];
    $real_name = $_POST['real_name'];
    $gender = $_POST['gender'];
    $eye_color = $_POST['eye_color'];
    $hair_color = $_POST['hair_color'];
    $height = $_POST['height'];
    $weight = $_POST['weight'];
    $skin_color = $_POST['skin_color'];
    $alignment = $_POST['alignment'];
    $description = $_POST['description'];
    $bio = $_POST['bio'];
    $identity = $_POST['identity'];
    $publisher = $_POST['pub'];
    $race = $_POST['race'];
    $image_url = $_POST['image_url'];

    // Check if the race exists
    $sql_select_race = "SELECT race_id FROM Race WHERE species_name='$race'";
    $result_race = $conn->query($sql_select_race);
    if ($result_race->num_rows == 0) {
        echo "Please add the race '$race' before adding a character.";
        die;
    }
    $row_race = $result_race->fetch_assoc();
    $race_id = $row_race['race_id'];

    // Check if the alias already exists
    $sql_select_alias = "SELECT alias_id FROM Hero_Alias WHERE hero_alias='$hero_alias'";
    $result_alias = $conn->query($sql_select_alias);
    if ($result_alias->num_rows > 0) {
        echo "Alias '$hero_alias' already exists.";
    } else {
        // Insert new alias
        $sql_insert_alias = "INSERT INTO Hero_Alias (hero_alias) VALUES ('$hero_alias')";
        if ($conn->query($sql_insert_alias) === TRUE) {
            echo "New alias '$hero_alias' inserted successfully.";
        } else {
            echo "Error inserting alias: " . $conn->error;
        }
    }

    // Retrieve publisher ID
    $sql_select_publisher = "SELECT publisher_id FROM Publisher WHERE company_name='$publisher'";
    $result_publisher = $conn->query($sql_select_publisher);
    if ($result_publisher->num_rows == 0) {
        // Insert new publisher if not exists
        $sql_insert_publisher = "INSERT INTO Publisher (company_name) VALUES ('$publisher')";
        if ($conn->query($sql_insert_publisher) === TRUE) {
            $publisher_id = $conn->insert_id;
        } else {
            echo "Error inserting publisher: " . $conn->error;
        }
    } else {
        $row_publisher = $result_publisher->fetch_assoc();
        $publisher_id = $row_publisher['publisher_id'];
    }

    // Insert new superhero
    $sql_insert_superhero = "INSERT INTO Superhero (real_name, gender, eye_color, hair_color, height_inches, weight_lbs, skin_color, alignment, description, biography, identity_status, publisher_id, race_id, main_alias_id, image_url) VALUES ('$real_name', '$gender', '$eye_color', '$hair_color', $height, $weight, '$skin_color', '$alignment', '$description', '$bio', '$identity', $publisher_id, $race_id, (SELECT alias_id FROM Hero_Alias WHERE hero_alias='$hero_alias'), '$image_url')";
    if ($conn->query($sql_insert_superhero) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error inserting superhero: " . $conn->error;
    }
}

// Close connection
$conn->close();
?>
<!DOCTYPE html>
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
        <label>Alias: </label><br>
        <input type="text" name="al">
    </div>

    <div>
        <label>Real Name: </label><br>
        <input type="text" name="real_name">
    </div>

    <div>
        <label>Gender (M/F): </label><br>
        <input type="text" name="gender">
    </div>

    <div>
        <label>Eye Color (3 char): </label><br>
        <input type="text" name="eye_color">
    </div>

    <div>
        <label>Hair Color: </label><br>
        <input type="text" name="hair_color">
    </div>

    <div>
        <label>Height (inches): </label><br>
        <input type="text" name="height">
    </div>

    <div>
        <label>Weight (lbs): </label><br>
        <input type="text" name="weight">
    </div>

    <div>
        <label>Skin Color: </label><br>
        <input type="text" name="skin_color">
    </div>

    <div>
        <label>Alignment (good, evil, neutral): </label><br>
        <input type="text" name="alignment">
    </div>

    <div>
        <label>Description: </label><br>
        <input type="text" name="description">
    </div>

    <div>
        <label>Bio: </label><br>
        <input type="text" name="bio">
    </div>

    <div>
        <label>Identity (SI=Secret Identity, PI=Public ID, SK=Secretly known): </label><br>
        <input type="text" name="identity">
    </div>

    <div>
        <label>Publisher: </label><br>
        <input type="text" name="pub">
    </div>

    <div>
        <label>Race: </label><br>
        <input type="text" name="race">
    </div>

    <div>
        <label>Image URL (link)</label><br>
        <input type="text" name="image_url">
    </div>

    <input type="submit" value="Submit">
</form>
<a href="https://cpsc.umw.edu/Team_Panther/CPSC350_Final_Project/login.php">Back to Login</a>
<br>
<a href="https://cpsc.umw.edu/Team_Panther/CPSC350_Final_Project/home_page.php">Go Home</a>
</body>
</html>

