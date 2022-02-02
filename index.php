<?php
session_start();
session_destroy();
?><!DOCTYPE html>
<html>
<head>
  <link rel = "icon" href = "images/pic5.jpg" type = "image/x-icon"> 
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700&display=swap"
    rel="stylesheet"
  />
 
  <link rel="shortcut icon" href="assets/images/favicon-icon/favicon.png">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>Criminal Record Management System</title>   
<style type="text/css">
    body{
            margin: 0;
            padding: 0;
            width: 100%;
            height: 400px;
            font-family: sans-serif;
    }


.fa:hover {
    opacity: 0.7;
}

.fa-facebook {
  padding: 20px;
  font-size: 30px;
  width: 50px;
  text-align: center;
  text-decoration: none;
  margin: 5px 2px;
  background: #3B5998;
  color: white;
}

.fa-twitter {
  padding: 20px;
  font-size: 30px;
  width: 50px;
  text-align: center;
  text-decoration: none;
  margin: 5px 2px;
  background: #55ACEE;
  color: white;
}

.fa-google {
  padding: 20px;
  font-size: 30px;
  width: 40px;
  text-align: center;
  text-decoration: none;
  margin: 5px 2px;
  
  background: #dd4b39;
  color: white;
}

.fa-linkedin {
  padding: 20px;
  font-size: 30px;
  width: 50px;
  text-align: center;
  text-decoration: none;
  margin: 5px 2px;
  background: #007bb5;
  color: white;
}

.topnav {
  overflow: hidden;
  background-color: #111;
}

.topnav a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  align-items: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}
   
    .topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #03b6fc;
  color: white;
}

.topnav .icon {
  display: none;
}

.footer{
    background-color:#111;
    height:100%;
    width:100%;

}

.footer a{
    color:white;
    font-size:20px;
    margin:10px;
    padding-top:8px;
}

.footer_para{
    color:white;text-align:center;}
    div img{
        background-image: none;
    }
    .slideshow-container {
  max-width: 1000px;
  position: relative;
  margin: auto;
}

.btn{
    background-color: #03b6fc;
    border-radius: 0.5cm;
    width: 130px;
}

input{
    background: transparent;
        outline: none;
          color: #fff;
        border: 1px solid #fff;
        font-size: 16px;
        height: 40px;
       
        text-align: center;
}

button{
    font-size: 16px;
    color: white;
    height: 40px;
}

a.right{
    float: right;
}

.bgimage{
  
  width: 100%;  
  height: 100%;
 padding: 0;
 margin: 0;
}

.dot {
  height: 15px;
  width: 15px;
  margin: 0 2px;
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

@media only screen and (max-width: 300px) {
  .text {font-size: 11px}
  a.right{
    float: left;
  }
  
}
@media screen and (max-width: 600px) {
  .topnav a:not(:first-child) {display: none;}
  .topnav a.icon {
    float: right;
    display: block;
  }
}

@media screen and (max-width: 600px) {
  .topnav.responsive {position: relative;}
  .topnav.responsive .icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  .topnav.responsive a {
    float: none;
    display: block;
    text-align: left;
  }
}

</style>
</head>

<body>
    <header>
   <div class="topnav" id="myTopnav">
  <a href="#" class="active">Home</a>
  <a class="right"  href="newlogreg.php">Login/Register</a>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
  <br>
</div>
 <div class="bgimage">
 </div>   
<div class="slideshow-container">

<div class="mySlides fade">
  <img src="images/pic5.jpg" style="width:100%">  
</div>

<div class="mySlides fade">  
  <img src="images/pic5.jpg" style="width:100%">
</div>

<div class="mySlides fade">
  <img src="images/pic5.jpg" style="width:100%">
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


function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
</script>

</header>

   
        <div class="footer">
          <form method="post" action="">
<div><p class="footer_para"> <br>
<br>
<hr>
<br>
<p class="footer_para">
  Created by <b style="color: lightblue;">Benaka H N</b><b style="color: #03b6fc;">&reg;</b><br><br>
  <a href="https://www.facebook.com/benaka.nagesh.05/" class="fa fa-facebook"></a>
<a href="https://twitter.com/Benakanagesh05" class="fa fa-twitter"></a>
<a href="https://www.linkedin.com/in/benaka-h-n-46b5b61a4/" class="fa fa-linkedin"></a>

</p>



</div>
</p></div>

</form>
</div>

</body>

</html>
