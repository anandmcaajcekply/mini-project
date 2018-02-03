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
  background-color: black;
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
div.view{
	border-style: solid;
	border-width: 2px;
	border-radius:5px;
}
div.view1{
	border-style: solid;
	border-width: 2px;
	border-radius:5px;
}
</style>
</head>
<body>
<div class="topnav">
  <a class="active" href="theaterhome.php">Home</a>
  <a href="ownerprofileview.php">Profile</a>
  <a href="addseat.php">Add Seat</a>
  <a href="owneraddfilm.php">Add Film</a>
  <a href="ownerviewfilm.php">view Film</a>  <a href="adminownerview.php">View Staff</a>
  <a href="ownerviewtheater.php">View Theater</a>
  <a href="logout.php">Logout</a>
  <?php $mid=$_SESSION['name'];?>
  <p style="color:white; margin-left:90%;">hai...!!!<?php echo $mid;?></p>
</div>
<div class="view">
<table style="border-style: solid;
	border-width: 2px;
	border-radius:5px;">
  <?php 
$tid=$_SESSION['lid'];
$sql="select * from filmadd ,theatershowadd where filmadd.filmid=theatershowadd.filmid and theatershowadd.lid=$tid and theatershowadd.status='0'";
$result=mysqli_query($con,$sql);
$i=0;
while($row=mysqli_fetch_array($result))
{
	?>
	<!--<img src="<?php echo $row['filmpic']?>" width=2 height=2 >  -->
	
	<form name="myform" action="#" method="post">
	
	<tr><td><img src="<?php echo $row['filmpic']?>" width=50 height=50 ></td><tr>	<td><input type="text" name="Name" value="<?php echo $row['filmname']?>"></td></tr>
	<tr><td><input type="text" name="Actor" value="<?php echo $row['actor']?>"></td>
	<td><input type="text" name="Actress" value="<?php echo $row['actress']?>"></td></tr>
	<tr><td><input type="text" name="Producer" value="<?php echo $row['producer']?>"></td>
	<td><input type="text" name="Cat" value="<?php echo $row['category']?>"></td></tr>
	<tr><td><input type="text" name="Language" value="<?php echo $row['language']?>"></td>
	<input type="hidden" name="sid" value="<?php echo $row['filmid']?>"/></tr>
	<!--<td><input type="submit" name="edit"  value="Edit"></td> -->
	
	</form>
	<?php
	
}

?>

</table>
</div>
</body>
</html>