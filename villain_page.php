<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {box-sizing: border-box}

body, html {
  height: 100%;
  font-family: Arial, Helvetica, sans-serif;
  margin:0;
}

body {
  background-color: white;
}

input[type=text] {
  width: 140px;
  box-sizing: border-box;
  border: 4px solid #ccc;
  border-radius: 40px;
  font-size: 13px;
  background-color: white;
  background-image: url('searchicon.png');
  background-position: 10px 10px; 
  background-repeat: no-repeat;
  padding: 12px 20px 12px 40px;
  -webkit-transition: width 0.4s ease-in-out;
  transition: width 0.4s ease-in-out;
  margin-left: 10%;
}

input[type=text]:focus {
  width: 80%;
}
.card {
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s;
  width: 15%;
  margin: 0; /* Center the cards */
  margin-bottom: 20px; /* Add some space between the cards */
  margin-right: 7px;
}

.smallcard {
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s;
  width: 11%;
  margin: 0; /* Center the cards */
  margin-bottom: 20px; /* Add some space between the cards */
  margin-right: 7px;
}


.flipped {
            transform: scaleX(-1); /* Flip horizontally */
}

.card:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}

.smallcard:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}


.container {
  padding: 2px 16px;
}

.card-container {
  display: flex;
  justify-content: center; /* Center the cards horizontally */
}

.card-image-link {
  display: block; /* Make the link cover the entire image */
}

.smallcard-container {
  display: flex;
  justify-content: center; /* Center the cards horizontally */
}

.smallcard-image-link {
  display: block; /* Make the link cover the entire image */
}

.bg-image {
  /* The image used */
  background-image: url("rohe.png");

  /* Add the blur effect */
  filter: blur(8px);
  -webkit-filter: blur(8px);

  /* Full height */
  height: 100%;

  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}

/* Position text in the middle of the page/image */
.bg-text {
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0, 0.4); /* Black w/opacity/see-through */
  color: white;
  font-weight: bold;
  border: 3px solid #f1f1f1;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  z-index: 2;
  width: 80%;
  padding: 20px;
  text-align: center;
}
.container {
  text-align: center; /* Center the content horizontally */
}

.flip-card {
  display: inline-block; /* Display the flip cards in a row */
  margin: 20px; /* Add some margin between the flip cards */
}
.flip-card-inner {
  position: relative;
  width: 300px; /* Set the width of the flip card */
  height: 300px; /* Set the height of the flip card */
  text-align: center;
  transition: transform 0.6s;
  transform-style: preserve-3d;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
}

.flip-card:hover .flip-card-inner {
  transform: rotateY(180deg);
}

.flip-card-front, .flip-card-back {
  position: absolute;
  width: 100%;
  height: 100%;
  -webkit-backface-visibility: hidden;
  backface-visibility: hidden;
}

.flip-card-front {
  background-color: #bbb;
  color: black;
}

.flip-card-back {
  background-color: #2980b9;
  color: white;
  transform: rotateY(180deg);
}

.clearfix::after {
  content: "";
  clear: both;
  display: table;
}
.divider {
  font-size: 30px;
  display: flex;
  align-items: center;
}

.divider::before, .divider::after {
  flex: 1;
  content: '';
  padding: 3px;
  background-color: black;
  margin: 5px;
}

/* Slideshow container */
.slideshow-container {
  position: relative;
  background: #f1f1f1f1;
}

/* Slides */
.mySlides {
  display: none;
  padding: 5px;
  text-align: center;
}

/* Next & previous buttons */
.prev, .next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  margin-top: -30px;
  padding: 16px;
  color: #888;
  font-weight: bold;
  font-size: 20px;
  border-radius: 0 3px 3px 0;
  user-select: none;
}
.next {
  position: absolute;
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover, .next:hover {
  background-color: rgba(0,0,0,0.8);
  color: white;
}

/* The dot/bullet/indicator container */
.dot-container {
    text-align: center;
    padding: 7px;
    background: #ddd;
}

/* The dots/bullets/indicators */
.dot {
  cursor: pointer;
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

/* Add a background color to the active dot/circle */
.active, .dot:hover {
  background-color: #717171;
}

/* Add an italic font style to all quotes */
q {font-style: italic;}

/* Add a blue color to the author */
.author {color: cornflowerblue;}

#navbar {
  overflow: hidden;
  background-color: black;
  padding: 20px 10px;
  transition: 0.8s;
  position: fixed;
  width: 100%;
  top: 0;
  z-index: 99;
}

#navbar a {
  float: left;
  color: white;
  text-align: center;
  padding: 12px;
  text-decoration: none;
  font-size: 18px;
  line-height: 10px;
  border-radius: 4px;
}

#navbar #logo {
  font-size: 35px;
  font-weight: bold;
  transition: 0.4s;
}

#navbar a:hover {
  background-color: #ddd;
  color: black;
}

#navbar a.active {
    background-color: darkgray;
    color: white;
}

#navbar-right {
  float: right;
}

@media screen and (max-width: 580px) {
  #navbar {
    padding: 20px 10px !important;
  }
  #navbar a {
    float: none;
    display: block;
    text-align: left;
  }
  #navbar-right {
    float: none;
  }
}


img {
  max-width: 100%;
  height: auto;
}

.image-container {
  background-image: url("test2.jpg");
  background-size: cover;
  position: relative;
  height: 300px;
}
.text {
  background-color: white;
  color: black;
  font-size: 10vw;
  font-weight: bold;
  margin: 0 auto;
  padding: 10px;
  width: 50%;
  text-align: center;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  mix-blend-mode: screen;
}

                                            
</style>
        <title>Culmination Project</title>
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

<div id="navbar">
  <a href="https://cpsc.umw.edu/Team_Panther/CPSC350_Final_Project/home_page.php" id="logo">Home</a>
  <div id="navbar-right">
    <a href="https://cpsc.umw.edu/Team_Panther/CPSC350_Final_Project/hero_page.php">Heroes</a>
    <a class="active" href="https://cpsc.umw.edu/Team_Panther/CPSC350_Final_Project/villain_page.php">Villains</a>
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


<body style="background-color: black;">


<!--<div class="image-container">
  <div class="text">HEROES</div>
</div>-->

<!--<div class="bg-image"></div>

<div class="bg-text">
  <h1 style="font-size:100px">Heroes</h1>
  <p>everyone wants to be one</p>
  <p>image looks better w/ no blur, may change bakc</p>
</div>-->

<img src="rohe.png">

<!--
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
-->

<br>
<br>
<br>
<br>
<img src="featured.png" alt="featured heroes">
<br>
<br>
<br>
<br>
<div style="background-color: white;">
<br>
<div class="card-container">
  <div class="card">
    <a href="https://cpsc.umw.edu/Team_Panther/CPSC350_Final_Project/character_page.php?character=24">
    <img src="https://www.designbolts.com/wp-content/uploads/2014/06/Red-skull.jpg" alt="Avatar" style="width:100%" class="flipped">
    </a>
    <div class="container">
      <h4><b>Red Skull</b></h4>
      <p>Hasn't been on a data ever since that^^^</p>
    </div>
  </div>
  <div class="card">
    <a href="https://cpsc.umw.edu/Team_Panther/CPSC350_Final_Project/character_page.php?character=30">
    <img src="https://www.designbolts.com/wp-content/uploads/2014/06/Loki.jpg" alt="Avatar" style="width:100%" class="flipped">
    </a>
    <div class="container">
      <h4><b>Loki</b></h4>
      <p>Don't lie, everyone cried when he bit the dust.</p>
    </div>
  </div>
</div>
<div class="slideshow-container">
<div class="mySlides">
  <br>
  <q>This website is perfectly balanced, like all things should be.</q>
  <p class="author">- What Thanos wanted to say</p>
</div>

<div class="mySlides">
  <br>
  <q>HEEEHEHEHEHHEEEHEEHE</q>
  <p class="author">- Literally every villain ever</p>
</div>

<div class="mySlides">
  <br>
  <q>My Mother-In-Law was in town, so I wasnt.</q>
  <p class="author">- Some forgettable villain (or hero?).</p>
</div>

<a class="prev" onclick="plusSlides(-1)">❮</a>
<a class="next" onclick="plusSlides(1)">❯</a>

</div>

<div class="dot-container">
  <span class="dot" onclick="currentSlide(1)"></span>
  <span class="dot" onclick="currentSlide(2)"></span>
  <span class="dot" onclick="currentSlide(3)"></span>
</div>

<br>
<br>
<img src="discover.png" alt="discover text">
<br>
<br>
<br>
<div style="background-color: white;">
<br>
<form>
  <input type="text" name="search" placeholder="Find a villain..." onkeydown="return handleEnter(event)">
</form>
<br>
<div class="smallcard-container">
<?php

try {
    $result = $conn->query("SELECT s.superhero_id AS id, s.image_url AS url, a.hero_alias AS al, s.description AS d FROM Superhero s INNER JOIN Hero_Alias a ON a.alias_id=s.main_alias_id AND s.alignment='evil' AND s.superhero_id NOT IN (30,24);");
} catch (Exception $e) {
    echo "Invalid Expression Entered, Check Syntax of Values Entered.<br>";
    $result = $conn->query("SELECT * FROM Superhero");
}
while($row = $result->fetch_assoc()) {
    echo "<div class=\"smallcard\">";
    echo "<a href=\"https://cpsc.umw.edu/Team_Panther/CPSC350_Final_Project/character_page.php?character=" . $row['id'] . "\">";
    if ($row['id']>14 && $row['id']<18) {
        echo "<img src=\"" . $row['url'] . "\" alt=\"Avatar\" style=\"width:100%\">";
    } else {
        echo "<img src=\"" . $row['url'] . "\" alt=\"Avatar\" style=\"width:100%\" class=\"flipped\">";
    }
    echo "</a>"; 
    echo "<div class=\"container\">";
    echo "<h4><b>" . $row['al'] . "</b></h4>";
    echo "<p>" . $row['d'] . "</p>";
    echo "</div>";
    echo "</div>";
}
?>
</div>
</div>
<script>
    function handleEnter(event) {
        if (event.key === "Enter") {
            event.preventDefault();
            // Add your search functionality here
            alert("Searching for: " + event.target.value);
            return false; // Prevent form submission
        }
    }

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

    </body>
</html>
