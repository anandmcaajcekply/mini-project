<!DOCTYPE html>
<?php
include 'connection.php';
if(!(isset($_SESSION['username'])))
{
header('location:index.php');
}
$username=$_SESSION['username'];
$tid=$_SESSION['lid'];
//echo $username;
$sql="SELECT * FROM `userlogin` WHERE userlogin.lid='$tid'";
$result=mysqli_query($con,$sql);

if(isset($_POST['edit'])){
	$a=$_POST['name'];
	$b=$_POST['lname'];
	$c=$_POST['contact'];
	$d=$_POST['address'];
	//$sql2="UPDATE `staffreg` set `name`='$a' ,`lname`='$b' ,`contact`='$c'`address`='$d' where staffreg.lid='$tid'";
	$sql2="UPDATE `userlogin` set `fname`='$a' where userlogin.lid='$tid'";
	$result2=mysqli_query($con,$sql2);
	$sql3="UPDATE `userlogin` set`lname`='$b' where userlogin.lid='$tid'";
	$result3=mysqli_query($con,$sql3);
	$sql4="UPDATE `userlogin` set`phone`='$c' where userlogin.lid='$tid'";
	$result4=mysqli_query($con,$sql4);
	$sql5="UPDATE `userlogin` set`address`='$d' where userlogin.lid='$tid'";
	$result5=mysqli_query($con,$sql5);
}
?>
<html>
<head>
<link rel="stylesheet" href="profile.css">
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
  max-width: 400px;
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
  <a class="active" href="userhome.php">Home</a>
  <a href="profileview.php">Profile</a>
  <a href="userviewfilms.php">Book My Show </a>
  <a href="userviewfilms.php">View films </a>
  <a href="newrelease.php">New Release </a>
  <a href="upcomming.php">Upcoming </a>
  <a href="logout.php">Logout</a>
</div>
<h2 style="text-align:center">User Profile Card</h2>

<div class="card">
<form name="myform" action="usereditprof.php" method="post">
<?php
$i=0;
while($row=mysqli_fetch_array($result))
{
	?>
	<table>
  <img src="11.jpg" alt="John" style="width:50%">
  <tr><td><h3 style="margin-left:35%;"><?php echo $username ?></h3></td></tr>
  <tr><td><i>FNAME:</i><input type="text" name="name" value="<?php echo $row['fname']?> " style="margin-left:10%;"></td></tr><tr> <td><i> LNAME:</i><input type="text" name="lname" value="<?php echo $row['lname']?>" style="margin-left:10%;"></td></tr>
  <p></p>
  <tr><td><p><i>PHONE:</i><input type="text" name="contact" value="<?php echo $row['phone']?>"style="margin-left:10%;"></p></td></tr>
  <tr><td><p><i>ADDRESS:</i><input type="text" name="address" value="<?php echo $row['address']?>"style="margin-left:4%;"></p></td></tr>
  </table>
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
 <p><input type="submit" name="edit" value="Edit"></p>
</div>
</form>
</div>

</body>
</html>
