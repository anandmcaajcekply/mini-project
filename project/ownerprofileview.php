<!DOCTYPE html>
<?php
include 'connection.php';
if(!(isset($_SESSION['username'])))
{
header('location:index.php');
}
$username=$_SESSION['username'];
$tid=$_SESSION['lid'];
echo $username;
$sql="SELECT * FROM `staffreg` WHERE staffreg.lid='$tid'";
$result=mysqli_query($con,$sql);
?>
<html>
<head>
<link rel="stylesheet" href="profile.css">-->
<style>
.topnav {
  overflow: hidden;
  background-color: #333;
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

.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  max-height: 500px;
  margin: auto;
  text-align: center;
  font-family: arial;
}

.title {
  color: grey;
  font-size: 18px;
}

button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}

a {
  text-decoration: none;
  font-size: 22px;
  color:white;
}

button:hover, a:hover {
  opacity: 0.7;
}
</style>
</head>
<body>
<div class="topnav">
  <a class="active" href="theaterhome.php">Home</a>
  <a href="profileview.php">Profile</a>
  <a href="#about">View Theater</a>
  <a href="logout.php">Logout</a>
  <?php $mid=$_SESSION['name'];?>
  <p style="color:white; margin-left:90%;">hai...!!!<?php echo $mid;?></p>
</div>
<h2 style="text-align:center">User Profile Card</h2>

<div class="card">
<?php
$i=0;
while($row=mysqli_fetch_array($result))
{
	?>
  <img src="11.jpg" alt="John" style="width:50%">
  <h3><?php echo $username ?></h3>
  <p><?php echo $row['name']?> &nbsp  <?php echo $row['lname']?></p>
  <p></p>
  <p><?php echo $row['contact']?></p>
  <p><?php echo $row['address']?></p>
 <!--
  <p class="title">CEO & Founder, Example</p>
  <p>Harvard University</p>-->
  <div style="margin: 24px 0;">
    <!--<a href=""><i class="fa fa-dribbble"></i></a> 
    <a href="#"><i class="fa fa-twitter"></i></a>  
    <a href="#"><i class="fa fa-linkedin"></i></a>  
    <a href="#"><i class="fa fa-facebook"></i></a> -->
<?php
}
?>	
 </div>
 <div style="background-color:black;">
 <p><a href="ownereditprof.php"><i>Edit</i></a></p>
</div>
</div>

</body>
</html>
