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

// display design
div.heading{
background-color:black;
text_align:center;
width:100%;
height:140px;
border:2px solid black;
color:white;
}
div.form1
{
position:absolute;
width:70%;
margin-top:100px;
border:2px;
}
table, th, td {
    padding: 10px;
	font-weight:bold;
	
}
table {
    border-spacing: 10px;
}
div.view
{
	position:absolute;
	margin-top:10%;
	margin-left:10px;
	
}
</style>
<body>
<div class="topnav">
  <a class="active" href="#home">Home</a>
  <a href="toreg.php">Add Owner</a>
  <a href="filmadd.php">Add Film</a>
  <a href="#">View Owners</a>
  <a href="#about">View Theater</a>
  <a href="adminlogout.php">Logout</a>
</div>
<div class="view">
<table border=5px style="width:10px; margin-left:0%; margin-top:-10%;">
<tr><th>OWNERNAME</th><th>THEATER NAME</th><th>LOCATION</th><th>CONTACT</th><th>MODE</th><th>SCREEN</th><th>SEAT NO</th></tr>
<?php 
$tid=$_SESSION['lid'];
$sql="select * from staffreg,theaterreg,screen where staffreg.theaterid=theaterreg.theaterid and screen.theaterid=theaterreg.theaterid";
$result=mysqli_query($con,$sql);

$i=0;
while($row=mysqli_fetch_array($result))
{
	?>
	
	<tr>	
	<form name="myform" action="adminownerview.php" method="post">
	<td><input type="text" name="owner" value="<?php echo $row['name']?>"></td>
	<td><input type="text" name="tname" value="<?php echo $row['tname']?>"></td>
	<td><input type="text" name="location" value="<?php echo $row['location']?>"></td>
	<td><input type="text" name="contact" value="<?php echo $row['contact']?>"></td>
	<td><input type="text" name="mode" value="<?php echo $row['tmode']?>"></td>
	<td><input type="text" name="screen" value="<?php echo $row['noscreen']?>"></td>
	<td><input type="text" name="seat" value="<?php echo $row['seatno']?>"></td>
	<input type="hidden" name="sid" value="<?php echo $row['id']?>"/>
	<!-- <td><input type="submit" name="edit"  value="Edit"></td>
	 <td><input type="button" name="delete" value="Delete"></td> -->
	</tr>
	</form>
	<?php
}
?>
</table>
</div>
</body>
</html>