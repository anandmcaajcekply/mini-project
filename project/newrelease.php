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
  <?php $mid=$_SESSION['fname'];?>
  <p style="color:white; margin-left:85%;">hai...!!!<?php echo $mid;?></p>
</div>
<div class="view">
<table border=5px style="width:10px; margin-left:0%; margin-top:-10%;">
<tr><th>THEATER</th><th>PICTURE</th><th>TITLE</th><th>ACTOR</th><th>ACTRESS</th><th>PRODUCER</th><th>CATEGORY</th><th>LANGUAGE</th></tr>
<?php
//$tid=$_SESSION['id'];
$today = date("Y-m-d H:i:s");
//$sql="select * from filmadd,theaterreg,theatershowadd where filmadd.filmid=theatershowadd.filmid and theatershowadd.theaterids=theaterreg.theaterid and theatershowadd.status='0' and filmadd.reldate between sysdate-15 AND sysdate";
$sql="select * from filmadd,theaterreg,theatershowadd where filmadd.filmid=theatershowadd.filmid and theatershowadd.theaterids=theaterreg.theaterid and theatershowadd.status='0' and filmadd.reldate <= CURRENT_DATE AND filmadd.reldate >= ( CURRENT_DATE - INTERVAL 1 WEEK )";
$result=mysqli_query($con,$sql);

//echo $today;
//$d=date();
$i=0;
while($row=mysqli_fetch_array($result))
{
	?>
	
	<tr>	
	<form name="myform" action="userviewfilms.php" method="post">
	<td><input type="text" name="Name" value="<?php echo $row['tname']?>"readonly></td>
	<td><img src="<?php echo $row['filmpic']?>" width=50 height=50 ></td>
	<td><input type="text" name="Name" value="<?php echo $row['filmname']?>"readonly></td>
	<td><input type="text" name="Actor" value="<?php echo $row['actor']?>"readonly></td>
	<td><input type="text" name="Actress" value="<?php echo $row['actress']?>"readonly></td>
	<td><input type="text" name="Producer" value="<?php echo $row['producer']?>"readonly></td>
	<td><input type="text" name="Cat" value="<?php echo $row['category']?>"readonly></td>
	<td><input type="text" name="Language" value="<?php echo $row['language']?>"readonly></td>
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