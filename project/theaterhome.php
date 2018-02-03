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
    z-index: 12;
	color:red;
}

.dropdown:hover .dropdown-content {
	color:black;
    display: block;
}
#bgVideo{ 
    position: absolute;
    top: 0;
    left: 0;
    border: 0;
    z-index: -2;
    background-size: cover;
}
</style>

</head>
<body>
<div class="topnav">
  <a class="active" href="theaterhome.php">Home</a>
  <a href="ownerprofileview.php">Profile</a>
  <a href="addseat.php">Add Seat</a>
  <a href="viewbooked.php">view booked</a>
  <a href="adminbookview.php">seat </a>
  <a href="onlineseat.php">Online Seat</a>
  <div class="dropdown">
  <span>Theater</span>
  <div class="dropdown-content">
  <a href="owneraddfilm.php">Add Film</a>
  <a href="ownerviewfilm.php">view Film</a>
  <a href="deleteshowadd.php">Delete Show</a>
  <a href="ownerviewtheater.php">View Theater</a>
   </div>
</div>
<a href="collection.php">Collection</a>
<a href="thchangepass.php">Change password</a>  
  <div class="dropdown">
  <span>Bank</span>
  <div class="dropdown-content">
  <a href="theaterwal.php">Add Bank</a>
   <a href="theatermywal.php">My Wallet</a>
  </div>
</div> 
  
  <a href="logout.php">Logout</a>
  <?php $mid=$_SESSION['name'];?>
  <p style="color:white; margin-left:90%; margin-top:-18px">hai...!!!<?php echo $mid;?></p>
</div>
<video id="bgVideo" autoplay loop="videos/poster.mp4">
    <source src="images1/bgg.mp4" type="video/mp4"/>
    <!--<source src="videos/test-640x368-webmvp8-miro.webm" type="video/webm"/> -->
    <!--<source src="videos/test-640x368-theora-miro.ogv" type="video/ogg"/>    -->
</video>
</body>
</html>