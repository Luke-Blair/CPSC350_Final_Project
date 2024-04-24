<?php
    session_start();
?>    
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Log In</title>
    <?php
        $servername = "localhost";
        $DB = "Team_Panther";
        include "credentials.php";
        $conn = new mysqli($servername, $username, $password, $DB);

        $signout = "UPDATE AdminAccount SET signed_in=0";
        mysqli_query($conn, $signout);
    ?>

<style>
#mySidenav a {
  position: absolute;
  left: -80px;
  transition: 0.3s;
  padding: 15px;
  width: 100px;
  text-decoration: none;
  font-size: 20px;
  color: white;
  border-radius: 0 5px 5px 0;
}

#mySidenav a:hover {
  left: 0;
}


#tab5 {
  top: 1100px;
  background-color: black;
}

#tab1 {
  top: 1030px;
  background-color: black;
}

#tab2 {
  top: 970px;
  background-color: black;
}

#tab3 {
  top: 910px;
  background-color: black
}

#tab4 {
  top: 850px;
  background-color: black;
}
</style>

  </head>
  <body>
      <form action="login.php" method="post">
        <br>
        <div class="imgcontainer">
          <img src="rohe.png" alt="Avatar" class="avatar">
        </div>

      <div class="container">
        <label for="uname"><b>Username</b></label>
        <input type="text" placeholder="Enter Username" name="uname" required>

        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="psw" required>

        <button type="submit">Login</button>
      </div>
    </form>

    <a href="https://cpsc.umw.edu/Team_Panther/CPSC350_Final_Project/login.php">Sign out?</a>
    <a href="https://cpsc.umw.edu/Team_Panther/CPSC350_Final_Project/home_page.php">Return Home</a>

    <?php

        if(empty($_POST["uname"]) && empty($_POST["psw"])) {
            $username = "user";
            $password = "pswd";
        } else {
            $username = $_POST["uname"];
            $password = $_POST["psw"];
        }

        $sql_select = "SELECT username, password FROM AdminAccount";
        $results = mysqli_query($conn, $sql_select);
        $row = mysqli_fetch_assoc($results);
        if($row["username"] == $username && $row["password"] == $password) {
            $sql_update = "UPDATE AdminAccount SET signed_in=1";

            if($conn->query($sql_update) == TRUE) {
                echo "<p>Successfully logged in</p>";
                echo '<br>';
                echo '<div id="mySidenav" class="sidenav">';
                echo '<a href="https://cpsc.umw.edu/Team_Panther/CPSC350_Final_Project/directquery.php" id="tab5">database</a>
  <a href="https://cpsc.umw.edu/Team_Panther/CPSC350_Final_Project/create_hero.php" id="tab1">a character</a>
  <a href="https://cpsc.umw.edu/Team_Panther/CPSC350_Final_Project/create_power.php" id="tab2">a power</a>
  <a href="https://cpsc.umw.edu/Team_Panther/CPSC350_Final_Project/create_relation.php" id="tab3">a relation</a>
  <a href="https://cpsc.umw.edu/Team_Panther/CPSC350_Final_Project/create_race.php" id="tab4">a race</a>';
                echo '</div>';

                echo '<div style="margin-left:80px; font-family: Century Gothic, sans-serif;">
                <h2>create something new</h2>
                <p>...</p>
                <br><br><br><br><br><br>
                <h2>or send a direct query</h2>
                <p>...</p>
                </div>';
                
            } else {
                echo "Fail" . $conn->error;
            }
        }
         
    ?>
  </body>
</html>

