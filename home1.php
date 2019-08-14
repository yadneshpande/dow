<!DOCTYPE html>
<html>
<head>
<style>
body {
         background-color:#2d2d2d;
         background-size:cover;
         background-position:center;
         height:100vh;
     }
h2{
    color:#bc973a;
    text-align:center;
  }

ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333;
    position: -webkit-sticky; /* Safari */
    position: sticky;
    top: 0;
}

li {
    float: left;
}

li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

li a:hover {
    background-color: #111;
}

.active {
    background-color: #d1ce36;
}

.mySlides {display: none;}

.slideshow-container {

  position: relative;
  margin: auto;
}

.dot {
  height: 0px;
  width: 0px;
  margin: 0px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
}

@-webkit-keyframes fade {
  from {opacity: .4}
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4}
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .text {font-size: 11px}
}

.footer {
   position: bottom;
   left: 0;
   bottom: 10%;
   width: 100%;
   background-color:#2d2d2d`;
   color: white;
   text-align: center;
}
</style>
</head>
<body>

<div class="header">
  <h2><i><b>Deals on Wheels</i></b></h2>
</div>

<ul>
  <li><a class="active" href="home1.php">Home</a></li>
  <li><a href="about.php">About Us</a></li>
   <li><a href="syc.php">Buy a Car</a></li>
    <li><a href="syc.php">Sell a Car</a></li>
    <!-- <li><a href="#na">New Arrivals</a></li> -->
     <li><a href="contact.php">Contact Us</a></li>
<li style="float:right"><a href="syc.php">Sign In</a></li>
<!-- <li style="float:right"><a href="syc.php">Admin</a></li> -->
</ul>

<div class="slideshow-container">

<div class="mySlides fade">
  <img src="me.jpg" style="width:100%">
</div>

<div class="mySlides fade">
  <img src="hom11.jpg" style="width:100%">
</div>

<div class="mySlides fade">
  <img src="hom222.jpg" style="width:100%">
</div>

</div>
<br>

 <div style="text-align:center">
  <span class="dot"></span>
  <span class="dot"></span>
  <span class="dot"></span>
</div> 

<script>
var slideIndex = 0;
showSlides();

function showSlides() {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");
    for (i = 0; i < slides.length; i++) {
       slides[i].style.display = "none";
    }
    slideIndex++;
    if (slideIndex > slides.length) {slideIndex = 1}
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";
    dots[slideIndex-1].className += " active";
    setTimeout(showSlides, 2000); // Change image every 2 seconds
}
</script>



<div class="footer">
  <p>
    <img src="de.png" alt="logo" style="float:left;width:250px;height:200px;">
    <img src="de.png" alt="logo" style="float:right;width:250px;height:200px;">
    <br>
    <br>
    <br>
    <br>
    <h3>Our Showrooms</h3>

    <ul>
      <li><b><i>LOCATION 1 :<br>  
Near Ved Vihar Apartments , Ved Bhavan Road , Kothrud - Pune - India</i></b></li>
<br>
<li><b><i>LOCATION 2 :<br>
Near Vanraje Society , Vishwashanti Marg , Kothrud – Pune – India</i></b></li>
</ul>

<br>
<br>
<br>
<br>
<br><br><br>


  </p>
</div>



</body>
</html>
