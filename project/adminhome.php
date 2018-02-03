<?php
include 'connection.php';
if(!(isset($_SESSION['username'])))
{
header('location:index.php');
}
?>
<html>
<head>
<style>
.topnav {
  background-color: #333;
  height:50px;
  
}

.topnav a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
    background-color: #4CAF50;
    color: white;
}
.dropdown {
    position: relative;
    display: inline-block;
	color: white;
	margin-top:1.2%;
	
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #ddd;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    padding: 12px 16px;
    z-index: 50;
	color:red;
}

.dropdown:hover .dropdown-content {
	color:black;
    display: block;
}
#bgVideo{ 
    position: absolute;
    top: 0;
    left: 0px;
    border: 0;
	width:120%;
	
    z-index: -2;
    background-size: cover;
}
</style>
<body>
<div class="topnav">
  <a class="active" href="#home">Home</a>
  <a href="toreg.php">Add Owner</a>
  <a href="filmadd.php">Add Film</a>
  <a href="viewfilm.php">View Film</a>
  <a href="adminownerview.php">View Owners</a>
  <a href="addcountry.php">Add Places/ Category</a>
  <a href="admintheaterview.php">View Theater</a>
  <a href="changepass.php">password change</a>
  <a href="countofusers.php">visitors</a>
  <div class="dropdown">
  <span>Bank</span>
  <div class="dropdown-content">
  <a href="adminwal.php">Add Bank</a>
   <a href="adminmywal.php">My Wallet</a>
  </div>
</div> 
  <a href="adminlogout.php">Logout</a>
</div>
<video id="bgVideo" autoplay loop="videos/poster.mp4">
    <source src="images1/ultra.mp4" type="video/mp4"/>
    <!--<source src="videos/test-640x368-webmvp8-miro.webm" type="video/webm"/> -->
    <!--<source src="videos/test-640x368-theora-miro.ogv" type="video/ogg"/>    -->
</video>
</body>
</html>