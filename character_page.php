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
                $conn = new mysqli($servername, $username, $password, $DB);

                if(mysqli_connect_errno()) {
                    echo "unable to connect :(";
                } else {
                }
$bottomCols = array("12"=>"#090C13","5"=>"#F8E7D7","13"=>"#FFC608");
$topCols = array("12"=>"#FFB53D","5"=>"#AA0B0F","13"=>"#77C5D2");

if(isset($_GET['character']) && !empty($_GET['character'])) {
    $char = htmlentities($_GET['character']);
}

        ?>
    <style>
.bottom-bar {
    background-color: black;
    color: white;
    padding: 10px;
    position: fixed;
    bottom: 0;
    left: 0;
    width: 100%;
    text-align: center;
}

/* Style for the home link */
.home-link {
    color: white;
    font-weight: bold;
    font-family: Centurty Gothic, sans-serif;
}
    .colored-box {
        border: 7px solid currentColor;
        padding: 10px;
        display: inline-block;
        margin-left: 80%;
    }
    .colored-line {
        border-bottom: 20px solid currentColor;
        margin-top: -100px;
    }
    .parallax {
  /* The image used */
        background-image: url('<?php echo $char . ".png"; ?>');

  /* Set a specific height */
        min-height: 1080px; 

  /* Create the parallax scrolling effect */
        background-attachment: fixed;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }
  .bookmark {
    position: fixed;
    top: 30%;
    right: 20px; /* Adjust as needed */
    transform: translateY(-50%);
    width: 150px; /* Adjust width as needed */
    height: 400px;
    padding: 10px;
    background-color: #FFB53D;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.1);
    text-align: center;
  }
  .padding-left {
    text-align: center;
    padding-left: 300px;
  }

    </style>
    </head>
    <body style="background-color: <?php echo $bottomCols["$char"]; ?>; color: <?php echo $topCols["$char"]; ?>; font-family: Century Gothic, sans-serif; font-size: 5em;">


<?php
try {
    $result = $conn->query("SELECT * FROM Superhero WHERE superhero_id = $char");
} catch (Exception $e) {
    echo "Invalid Expression Entered, Check Syntax of Values Entered.<br>";
    $result = $conn->query("SELECT * FROM Superhero WHERE real_name = 'Tony Stark'");
}

echo '<div class="parallax"></div>';
//echo "<img src=\"" . $char . ".png\">";
$fields = $result->fetch_fields();
//foreach ($fields as $col) {
//    echo "<h5>" . $col->name . "</h5>";
//}
$row = $result->fetch_assoc();
//foreach ($row as $data) {
//    echo "<p>" . $data . "</p>";
//}
echo "<br>";
echo "<br>";
echo '<h5 style="margin-left: 10%">' . $row['real_name'] . "</h5>";
echo '<div class="colored-line"></div>';
echo '<p style="margin-left: 7%; margin-right: 67%; font-size: 27px">' . $row['biography'] . "</p>";
echo '<p class="colored-box" style="font-size: 27px">' . 'gender: ' . $row['gender'];
echo '<br>' . 'eye color: ' . $row['eye_color'];
echo '<br>' . 'hair color: ' . $row['hair_color'];
echo '<br>' . 'height: ' . $row['height_inches'] . 'in.';
echo '<br>' . 'weight: ' . $row['weight_lbs'] . 'lbs.';
echo '<br>' . 'skin color: ' . $row['skin_color'];
echo '<br>' . 'identity: ';
if($row['identity_status']=='PI') {
    echo 'public';
} else if ($row['identity_status']=='SI') {
    echo 'secret';
} else {
    echo 'secretly known';
}
echo '</p>';


?>
<div class="parallax"></div>
<!--  

<div class="bookmark">
  <p>This is a bookmark</p>
  <p>You can put any text here</p>
</div>
-->

</body>
</html>
