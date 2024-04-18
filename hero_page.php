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

<div id="navbar">
  <a href="#default" id="logo">WebpageLogo</a>
  <div id="navbar-right">
    <a href="https://cpsc.umw.edu/Team_Panther/CPSC350_Final_Project/home_page.php">Home</a>
    <a class="active" href="https://cpsc.umw.edu/Team_Panther/CPSC350_Final_Project/hero_page.php">Heroes</a>
    <a href="https://cpsc.umw.edu/Team_Panther/CPSC350_Final_Project/villain_page.php">Villains</a>
    <a href="https://cpsc.umw.edu/Team_Panther/CPSC350_Final_Project/neutral_page.php">Neutrals</a>
    <a href="https://cpsc.umw.edu/Team_Panther/CPSC350_Final_Project/about_page.html">About</a>
  </div>
</div>


<script>
// When the user scrolls down 80px from the top of the document, resize the navbar's padding and the logo's font size
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if ((document.body.scrollTop > 80 && document.body.scrollTop < 500) || (document.documentElement.scrollTop > 80 && document.documentElement.scrollTop < 500)) {
    document.getElementById("navbar").style.padding = "10px 10px";
    document.getElementById("logo").style.fontSize = "18px";
    document.getElementById("navbar").style.top = "0";
  } else if (document.body.scrollTop > 499 || document.documentElement.scrollTop > 499) {
    document.getElementById("navbar").style.padding = "0px 0px";
    document.getElementById("logo").style.fontSize = "0px";
    document.getElementById("navbar").style.top = "-50px"
  } else {
    document.getElementById("navbar").style.padding = "20px 10px";
    document.getElementById("logo").style.fontSize = "35px";
    document.getElementById("navbar").style.top = "0";
  }
}
</script>

    <body>
<!--<div class="image-container">
  <div class="text">HEROES</div>
</div>-->
<div class="slideshow-container">

<div class="mySlides">
  <q>I am Iron Man</q>
  <p class="author">- You know who</p>
</div>

<div class="mySlides">
  <q>Avengers, assemble.</q>
  <p class="author">- America's Ass</p>
</div>

<div class="mySlides">
  <q>With great power comes great responsibility</q>
  <p class="author">- Some old dude</p>
</div>

<a class="prev" onclick="plusSlides(-1)">❮</a>
<a class="next" onclick="plusSlides(1)">❯</a>

</div>

<div class="dot-container">
  <span class="dot" onclick="currentSlide(1)"></span>
  <span class="dot" onclick="currentSlide(2)"></span>
  <span class="dot" onclick="currentSlide(3)"></span>
</div>


    <body>
    </body>
</html>
