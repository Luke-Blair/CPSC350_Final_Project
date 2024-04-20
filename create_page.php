<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">

        <title>Make data easier to insert</title>
        <script src="script.js"></script>

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
            ?>
    </head>
<body>
    <h2>ONLY MARVEL HUMANS WITH UNIQUE ALIAS</h2>
    <form method="post">
    
    
    <div>
        <label>alias: </label><br>
        <input type="text" name="al">
    </div>



    <div>
        <label>real_name: </label><br>
        <input type="text" name="real_name">
    </div>

    
    <div>
        <label>gender(M/F): </label><br>
        <input type="text" name="gender">
    </div>

    
    <div>
        <label>eye_color(3 char): </label><br>
        <input type="text" name="eye_color">
    </div>

    
    <div>
        <label>hair_color: </label><br>
        <input type="text" name="hair_color">
    </div>

    
    <div>
        <label>height(inches): </label><br>
        <input type="text" name="height">
    </div>

    
    <div>
        <label>weight(lbs): </label><br>
        <input type="text" name="weight">
    </div>

    
    <div>
        <label>skin_color: </label><br>
        <input type="text" name="skin_color">
    </div>

    
    <div>
        <label>alignment(good,evil,neutral): </label><br>
        <input type="text" name="alignment">
    </div>

    
    <div>
        <label>description: </label><br>
        <input type="text" name="description">
    </div>

    
    <div>
        <label>bio: </label><br>
        <input type="text" name="bio">
    </div>

    
    <div>
        <label>identity(SI=Secret Identity, PI=Public ID, SK=Secretly known): </label><br>
        <input type="text" name="identity">
    </div>

    
    
    
    <div>
        <label>stat_id(same): </label><br>
        <input type="text" name="stat_id">
    </div>

    
    <div>
        <label>image_url(link)</label><br>
        <input type="text" name="image_url">
    </div>
    <input type="submit" value="Submit">

    </form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
    $stat_id = $_POST['stat_id'];
    $image_url = $_POST['image_url'];
    
    $sql = "INSERT INTO Hero_Alias (hero_alias) VALUES ('$hero_alias')";

    
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $sql = "SELECT alias_id FROM Hero_Alias WHERE hero_alias='$hero_alias'";
    $result = $conn->query($sql);

    $row = $result->fetch_assoc();
    $main_alias_id = $row['alias_id'];
    $race_id = 1;    
    $publisher_id = 1;

    $sql = "INSERT INTO Superhero (real_name, gender, eye_color, hair_color, height_inches, weight_lbs, skin_color, alignment, description, biography, identity_status, publisher_id, race_id, main_alias_id, stat_id, image_url) 
            VALUES ('$real_name', '$gender', '$eye_color', '$hair_color', $height, $weight, '$skin_color', '$alignment', '$description', '$bio', '$identity', $publisher_id, $race_id, $main_alias_id, $stat_id, '$image_url')";

    // Execute SQL query
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

}
?>

</body>
</html>
