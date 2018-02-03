<!doctype html>
<?php
include 'connection.php';
if(!(isset($_SESSION['username'])))
{
header('location:index.php');
}
$tid=$_SESSION['lid'];
$sql="select * from staffreg where staffreg.lid=$tid";
//$sql="select * from staffreg,theaterrreg where staffreg.theaterid=theaterreg.theaterid and staffreg.lid='$tid'";
$results=mysqli_query($con,$sql);
$ar=mysqli_fetch_array($results);
$mid=$ar['lid'];
//echo $mid;
$m=$ar['theaterid'];
//echo $m;
//while($row=mysqli_fetch_array($results))
//{
	//?>
<!--	<form name="myform" action="#" method="post">
	<table>
	<tr>	
	
	<td><input type="text" name="pic" value="<?php echo $row['lid']?>"></td>
	
	</tr>
	</table>
	</form>
	<?php
//}
if(isset($_POST['add']))
 {
	$a=$_POST['seat'];
	$b=$_POST['range1'];
	$c=$_POST['range2'];
	$d=$_POST['row1'];
	$e=$_POST['col1'];
	$sql="INSERT INTO `seat`(`total_seatno`,`theaterid`, `startno`, `endno`, `row1`, `col1`) VALUES('$a','$m','$b','$c','$d','$e')";
	$result1=mysqli_query($con,$sql);
}
	?>
	-->
<html>
<head>
<script src="reg.js"></script>
<link rel="stylesheet" href="toreg.css" />
<html>
<head>
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
</style>
</head>
<body>
<div class="topnav">
  <a class="active" href="theaterhome.php">Home</a>
  <a href="ownerprofileview.php">Profile</a>
  <a href="addseat.php">Add Seat</a>
  <a href="owneraddfilm.php">Add Film</a>
  <a href="ownerviewfilm.php">view Film</a>
  <a href="adminownerview.php">View Staff</a>
  <a href="ownerviewtheater.php">View Theater</a>
  <a href="logout.php">Logout</a>
  <?php $mid=$_SESSION['name'];?>
  <p style="color:white; margin-left:90%;">hai...!!!<?php echo $mid;?></p>
</div>
<form name="treg" id="msform" method="post" action="addseat.php">
    <fieldset>
  <table style="margin-left:25%;">
    <tr><th style="align:center;"><h2 class="fs-title">Add Seat Details</h2></th></tr>
	<tr><td><input type="text" name="seat" placeholder="Total No of seats" /></td></tr>
	<!--<tr style="align:center;"><td>Personal Details</td></tr> -->
	<tr><td><input type="text" name="range1" placeholder="Starting Seat No" /></td></tr>
			<tr><td><input type="text" name="range2" placeholder="Last Seat No" /></td></tr>
	<tr><td><input type="text" name="row1" placeholder="No of rows" /></td></tr>
	<tr><td><input type="text" name="col1" placeholder="No of Columns" />
	</td>
	</tr>
	<tr><td><input type="submit" name="add" value="Add"></td></tr>
	
	
	</table>
	</fieldset>
</form>
</body>
</html>