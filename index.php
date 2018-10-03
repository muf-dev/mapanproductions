<?php 
error_reporting(0);
session_start();
include "koneksi.php";
include "fungsi_kalender.php";
?>
<html>
<head>
	<title>Selamat datang di E-Learning </title>
	<link rel="stylesheet" type="text/css" href="style.css" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script type="text/javascript">
		function myFunction() {
		    $(".sembunyikan").hide();
		}
	</script>
	<script>
		$(document).ready(function(){
			$(".tombol").click(function(){
				$("#hide").toggle(1000);
			});
		});

		$(document).ready(function(){
			$(".tombol1").click(function(){
				$("#hide1").toggle(1000);
			});
		});
	</script>
	
	<style>
	* {box-sizing:border-box}
body {font-family: Verdana,sans-serif;}
.mySlides {display:none}

	/* Slideshow container */
.slideshow-container {
  max-width: 1080px;
  position: relative;
  margin: auto;
}

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active {
  background-color: #717171;
}

/* Fading animation */
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
</style>
	
</head>
<body onLoad="myFunction()">
<div id='container'>
	
		<ul id='menu'>
			<?php if ($_SESSION[level]=='admin'){ ?>
				<li><a href='index.php?page=edit&id=1'>Beranda </a></li>
				<li><a href='index.php?page=edit&id=2'>Kelola Profile</a></li>
				<li><a href='index.php?page=kelolasiswa'>Kelola Siswa</a></li>
				<li><a href='index.php?page=kelolaguru'>Kelola Guru</a></li>
				<li><a href='logout.php'>Logout</a></li>
				
			<?php }elseif ($_SESSION[level]=='siswa'){ ?>
				<li><a href='index.php?page=home'>Home </a></li>
				<li><a href='index.php?page=profile'>Profile</a></li>
				<li><a href='index.php?page=materiajar'>Materi Ajar</a></li>
				<li><a href='index.php?page=tugas'>Tugas</a></li>
				<li><a href='index.php?page=laporannilaisiswa'>Laporan Nilai</a></li>
				<li><a href='logout.php'>Logout</a></li>

			<?php }elseif ($_SESSION[level]=='guru'){ ?>
				<li><a href='index.php?page=home'>Home </a></li>
				<li><a href='index.php?page=profile'>Profile</a></li>
				<li><a href='index.php?page=materiajarguru'>Upload Materi</a></li>
				<li><a href='index.php?page=kirimtugas'>Kirim Tugas</a></li>
				<li><a href='index.php?page=laporannilai'>Laporan Nilai</a></li>
				<li><a href='logout.php'>Logout</a></li>

			<?php }else{ ?>
				<li><a href='index.php?page=home'>Home </a></li>
				<li><a href='index.php?page=profile'>Profile</a></li>
				<li><a href='index.php?page=infopendaftaran'>Info Pendaftaran</a></li>
				<li><a href='index.php?page=pendaftaran'>Pendaftaran</a></li>
				<li><a href='index.php?page=login'>Login</a></li>
			<?php } ?>
		</ul>
		<div class="slideshow-container">

<div class="mySlides fade">
  <div class="numbertext">1 / 3</div>
  <img src="header.jpg" style="width:100%">
  <div class="text">Caption Text</div>
</div>

<div class="mySlides fade">
  <div class="numbertext">2 / 3</div>
  <img src="header2.jpg" style="width:100%">
  <div class="text">Caption Two</div>
</div>

<div class="mySlides fade">
  <div class="numbertext">3 / 3</div>
  <img src="header3.jpg" style="width:100%">
  <div class="text">Caption Three</div>
</div>

</div>
<br>

<div style="text-align:center">
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 

	</div>

	<div id='contentt'>
		<?php 
			include "content.php";
			include "content-admin.php";
		?>
	</div>

	<br><div id='sidebar'>
		<div class='sidebar'>
			<?php include "sidebar-left.php"; ?> 
		</div>
	</div>
	<div style='clear:both'></div><br>
	<div id='footer'>
	<center style='margin-top:10px'>
	  Copyright 2017
	</center>
	</div>
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
</body>
</html>