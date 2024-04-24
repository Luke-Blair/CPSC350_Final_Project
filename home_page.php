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
                $logo = "logo_small.jpg";
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
    <a href="https://cpsc.umw.edu/Team_Panther/CPSC350_Final_Project/home_page.php" id="logo"><img src="<?= $logo ?>" style="width:100px; height: auto;"></a>
  <!--<a href="#default" id="logo"><img src="test2.jpg" style="width:10%; float: left; height:auto;"></a>-->
  <div id="navbar-right">
    <a href="https://cpsc.umw.edu/Team_Panther/CPSC350_Final_Project/hero_page.php">Heroes</a>
    <a href="https://cpsc.umw.edu/Team_Panther/CPSC350_Final_Project/villain_page.php">Villains</a>
    <a href="https://cpsc.umw.edu/Team_Panther/CPSC350_Final_Project/login.php">Log In</a>
  </div>
</div>

<img src="team.png" alt="layironman">
<br>
<div class="slideshow-container">

<div class="mySlides">
  <q>a person who is admired or idealized for courage, outstanding achievements, or noble qualities</q>
  <p class="author">- Oxford</p>
</div>

<div class="mySlides">
  <q> a mythological or legendary figure often of divine descent endowed with great strength or ability</q>
  <p class="author">- Webster</p>
</div>

<div class="mySlides">
  <q>another term for submarine</q>
  <p class="author">- No really, google it</p>
</div>

<a class="prev" onclick="plusSlides(-1)">❮</a>
<a class="next" onclick="plusSlides(1)">❯</a>

</div>

<div class="dot-container">
  <span class="dot" onclick="currentSlide(1)"></span> 
  <span class="dot" onclick="currentSlide(2)"></span> 
  <span class="dot" onclick="currentSlide(3)"></span> 
</div>

<script>
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
}
</script>

<br>
<br>
<div class="divider" style="color: black; font-family: Roboto, sans-serif;">what we store</div>
<br>
<br>
<div style="background-color: black;">
<div class="container">
  <div class="flip-card">
    <div class="flip-card-inner">
      <div class="flip-card-front">
        <img src="marvel2.jpg" alt="Avatar" style="width:300px;height:300px;">
      </div>
      <div class="flip-card-back">
        <h1>Marvel</h1> 
        <p>Heroes and villains from the MCU</p> 
      </div>
    </div>
  </div>

  <div class="flip-card">
    <div class="flip-card-inner">
      <div class="flip-card-front">
        <img src="dc.jpg" alt="Avatar" style="width:300px;height:300px;">
      </div>
      <div class="flip-card-back">
        <h1>DC</h1> 
        <p>The lesser Marvel</p>

      </div>
    </div>
  </div>

  <div class="flip-card">
    <div class="flip-card-inner">
      <div class="flip-card-front">
        <img src="dh.jpg" alt="Avatar" style="width:300px;height:300px;">
      </div>
      <div class="flip-card-back">
        <h1>Dark Horse Comics</h1> 
        <p>They make stuff.</p> 
</div>    
</div>  
</div>

  <div class="flip-card">
    <div class="flip-card-inner">
      <div class="flip-card-front">
        <img src="lucas.jpg" alt="Avatar" style="width:300px;height:300px;">
      </div>
      <div class="flip-card-back">
        <h1>Lucasfilm</h1> 
        <p>We store characters from both the light and dark side (that sounded nerdier than anticipated)</p>
      </div>
    </div>
  </div>
</div>

</div>

<br>
<br>
<div class="divider" style="color: black; font-family: Roboto, sans-serif;">database brought to you by</div>
<br>
<br>
<img src="cpsc.png" alt="layironman">


<script>
// When the user scrolls down 80px from the top of the document, resize the navbar's padding and the logo's font size
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if ((document.body.scrollTop > 80 && document.body.scrollTop < 500) || (document.documentElement.scrollTop > 80 && document.documentElement.scrollTop < 500)) {
    document.getElementById("navbar").style.padding = "10px 10px";
    document.getElementById("logo").style.fontSize = "18px";
    document.getElementById("navbar").style.top = "0";
    document.getElementById("logo").style.width="50px";
  } else if (document.body.scrollTop > 499 || document.documentElement.scrollTop > 499) {
    document.getElementById("navbar").style.padding = "0px 0px";
    document.getElementById("logo").style.fontSize = "0px";
    document.getElementById("navbar").style.top = "-100px"
  } else {
    document.getElementById("navbar").style.padding = "20px 10px";
    document.getElementById("logo").style.fontSize = "35px";
    document.getElementById("navbar").style.top = "0";
    document.getElementById("logo").style.width="100px";    
  }
}
</script>
    </body>
</html>
