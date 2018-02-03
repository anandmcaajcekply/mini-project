<?php
include 'connection.php';
if(!(isset($_SESSION['username'])))
{
header('location:index.php');
}
if(isset($_POST['edit']))
    {   
		$h=$_POST['sid'];
		$tid=$_SESSION['lid'];
		$sql5="select * from filmadd ,theatershowadd where filmadd.filmid=theatershowadd.filmid and theatershowadd.lid=$tid and theatershowadd.status='0'";
		$result5=mysqli_query($con,$sql5);
		$ar14=mysqli_fetch_array($result5);
		$mid14=$ar14['filmid'];
		echo $mid14;
		//$sql="select * from filmadd ,theatershowadd where filmadd.filmid=theatershowadd.filmid and theatershowadd.lid=$tid";
		//$result=mysqli_query($con,$sql);
		//SELECT `staffid`, `name`, `lname`, `address`, `contact`, `status`, `lid`, `theaterid` FROM `staffreg` WHERE 1
		//$sql2="SELECT `theaterid` FROM `staffreg` WHERE lid='$tid'";
		//$result2=mysqli_query($con,$sql2);
	    // $r=mysqli_fetch_array($result2);
		// $t=$r['theaterid'];
		// $sql1="INSERT INTO `theatershowadd`(`filmid`, `lid`, `theaterids` ,`status`) VALUES ('$h','$tid','$t',0)";
		//$sql1="INSERT INTO `theatershowadd`(`filmid`, `filmname`, `actor`, `actress`, `producer`, `category`, `language`, `lid`) VALUES ('1','hkjh','ccfg','jgj','jhgj','vv','jg','5')";	
		//$result1=mysqli_query($con,$sql1);
		//$sql3="UPDATE `theatershowadd` SET `status`= '1' WHERE theatershowadd.lid='$tid' and filmid='$mid14'";
		$sql3="UPDATE `theatershowadd` SET `status`= '1' WHERE theatershowadd.lid='$tid' and filmid='$h'";
		$result2=mysqli_query($con,$sql3);
		
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
<tr><th>PICTURE</th><th>TITLE</th><th>ACTOR</th><th>ACTRESS</th><th>PRODUCER</th><th>CATEGORY</th><th>LANGUAGE</th></tr>
<?php 

$tid=$_SESSION['lid'];

$sql="select * from filmadd ,theatershowadd where filmadd.filmid=theatershowadd.filmid and theatershowadd.lid=$tid and theatershowadd.status='0'";
$result=mysqli_query($con,$sql);
//$ar14=mysqli_fetch_array($result);
//		$mid14=$ar14['filmid'];
		//echo $mid14;
$i=0;
while($row=mysqli_fetch_array($result))
{
	?>
	
	<tr>	
	<form name="myform" action="#" method="post">
	<td><input type="text" name="pic" value="<?php echo $row['filmpic']?>"></td>
	<td><input type="text" name="Name" value="<?php echo $row['filmname']?>"></td>
	<td><input type="text" name="Actor" value="<?php echo $row['actor']?>"></td>
	<td><input type="text" name="Actress" value="<?php echo $row['actress']?>"></td>
	<td><input type="text" name="Producer" value="<?php echo $row['producer']?>"></td>
	<td><input type="text" name="Cat" value="<?php echo $row['category']?>"></td>
	<td><input type="text" name="Language" value="<?php echo $row['language']?>"></td>
	<input type="hidden" name="sid" value="<?php echo $row['filmid']?>"/>
	<td><input type="submit" name="edit"  value="Delete"></td>
	<!--  <td><input type="button" name="delete" value="Delete"></td> -->
	</tr>
	</form>
	<?php
	
}

?>
</table>
</div>
</body>
</html>