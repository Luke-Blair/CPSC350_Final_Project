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
<div id="navbar">
  <a href="#default" id="logo">WebpageLogo</a>
  <div id="navbar-right">
    <a href="#about">About</a>
  </div>
</div>

<div style="margin-top:210px;padding:15px 15px 2500px;font-size:30px">
  <p><b>This ALTERED example demonstrates how to shrink a navigation bar when the user starts to scroll the page. I altered the script slightly. </b></p>
  <p>Scroll down this frame to see the effect!</p>
  <p>Scroll to the top to remove the effect.</p>
  <p><b>Note:</b> We have also made the navbar responsive, resize the browser window to see the effect.</p>
  <p>Lorem ipsum dolor dummy text to enable scrolling, sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
</div>

<script>
// When the user scrolls down 80px from the top of the document, resize the navbar's padding and the logo's font size
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if ((document.body.scrollTop > 80 && document.body.scrollTop < 500) || (document.documentElement.scrollTop > 80 && document.documentElement.scrollTop < 500)) {
    document.getElementById("navbar").style.padding = "10px 10px";
    document.getElementById("logo").style.fontSize = "18px";
    document.getElementById("navbar").style.width = "100%";
  } else if (document.body.scrollTop > 499 || document.documentElement.scrollTop > 499) {
    document.getElementById("navbar").style.padding = "0px 0px";
    document.getElementById("logo").style.fontSize = "0px";
    document.getElementById("navbar").style.width = "0%";
  } else {
    document.getElementById("navbar").style.padding = "20px 10px";
    document.getElementById("logo").style.fontSize = "35px";
    document.getElementById("navbar").style.width = "100%";
  }
}
</script>
    </body>
</html>
