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
  width:110%;
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
	margin-top:20%;
	margin-left:10px;
	
}
</style>
<body>
<div class="topnav">
  <a class="active" href="userhome.php">Home</a>
  <a href="logout.php">Logout</a>
	<?php $mid=$_SESSION['name'];?>
  <p style="color:white; margin-left:85%;">hai...!!!<?php echo $mid;?></p>
</div>
<div class="view">
<table border=5px style="width:10px; margin-left:0%; margin-top:-10%;">
<tr><th>NAME</th><th>START NO</th><th>END NO</th><th>T SEAT</th><th>ROWS</th><th>COLS</th></tr>
<?php
$tid=$_SESSION['lid'];
echo $tid;
$today = date("Y-m-d H:i:s");
//$sql="select * from filmadd,theaterreg,theatershowadd where filmadd.filmid=theatershowadd.filmid and theatershowadd.theaterids=theaterreg.theaterid and theatershowadd.status='0' and filmadd.reldate between sysdate-15 AND sysdate";
$sql="select * from seat,theaterreg,staffreg where staffreg.lid=$tid and theaterreg.theaterid=staffreg.theaterid and seat.theaterid=theaterreg.theaterid";
$result=mysqli_query($con,$sql);

//echo $today;
//$d=date();
while($row=mysqli_fetch_array($result))
{
	?>
	
	<tr>	
	<form name="myform" action="onlineseat.php" method="post">
	<td><input type="text" name="Name" value="<?php echo $row['tname']?>"readonly></td>
	<td><input type="text" name="Start No" value="<?php echo $row['startno']?>"readonly></td>
	<td><input type="text" name="End No" value="<?php echo $row['endno']?>"readonly></td>
	<td><input type="text" name="Total Seat" value="<?php echo $row['total_seatno']?>"readonly></td>
	<td><input type="text" name="No of rows" value="<?php echo $row['row1']?>"readonly></td>
	<td><input type="text" name="col1" value="<?php echo $row['col1']?>"readonly></td>
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