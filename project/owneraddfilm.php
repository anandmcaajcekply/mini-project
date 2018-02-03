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
		//$uid=$_SESSION['lid'];
		$sql24="SELECT `theaterid` FROM `staffreg` WHERE lid='$tid'";
		$result24=mysqli_query($con,$sql24);
	     $r4=mysqli_fetch_array($result24);
		 $t4=$r4['theaterid'];
		$sql34="SELECT * FROM `theatershowadd` WHERE `status`='0' and `theaterids`='$t4'";
	//	echo $sql34;
		$result34=mysqli_query($con,$sql34);
	     $r34=mysqli_fetch_array($result34);
		 $t34=$r34['fid'];
		 //echo  $t34;
		 if($t34!="")
		 {
			echo "<script>if(confirm('already exist!!!!')){document.location.href='theaterhome.php'}else{document.location.href='theaterhome.php'};</script>";
  
		 }
		 else
		 {	 
		$price=0;
		$price=$price+1000;
		
		$h=$_POST['sid'];
		$tid=$_SESSION['lid'];
		$sql4="SELECT * FROM `wallet` WHERE `logid`='$tid'";
		$result4=mysqli_query($con,$sql4);
		$row4=mysqli_fetch_array($result4);
		$r1=$row4['balance'];
		
		$sql8="SELECT * FROM `wallet` WHERE `logid`='5'";
		$result8=mysqli_query($con,$sql8);
		$row8=mysqli_fetch_array($result8);
		$r2=$row8['balance'];
		//echo $r2;
		
		$ttl=$r1-1000;
		$fprice=$r2+1000;
		
		
		//echo $fprice;
		if($price>$r1)
		{
		echo "<script>if(confirm('no balance!!!!')){document.location.href='theaterhome.php'}else{document.location.href='theaterhome.php'};</script>";
  
		}
		else
		{
		
		
		$sql6="UPDATE `wallet` SET `balance`='$ttl' WHERE `logid`='$tid'";
        $result6=mysqli_query($con,$sql6);
		$sql7="UPDATE `wallet` SET `balance`='$fprice' WHERE `logid`='5'";
        $result7=mysqli_query($con,$sql7);
		//SELECT `staffid`, `name`, `lname`, `address`, `contact`, `status`, `lid`, `theaterid` FROM `staffreg` WHERE 1
		$sql2="SELECT `theaterid` FROM `staffreg` WHERE lid='$tid'";
		$result2=mysqli_query($con,$sql2);
	     $r=mysqli_fetch_array($result2);
		 $t=$r['theaterid'];
		 $sql1="INSERT INTO `theatershowadd`(`filmid`, `lid`, `theaterids` ,`status`,`no_show`) VALUES ('$h','$tid','$t',0,3)";
		//$sql1="INSERT INTO `theatershowadd`(`filmid`, `filmname`, `actor`, `actress`, `producer`, `category`, `language`, `lid`) VALUES ('1','hkjh','ccfg','jgj','jhgj','vv','jg','5')";	
		$result1=mysqli_query($con,$sql1);
	}
		 }
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

$sql="select * from filmadd";
$result=mysqli_query($con,$sql);

$i=0;
while($row=mysqli_fetch_array($result))
{
	?>
	
	<tr>	
	<form name="myform" action="#" method="post">
	<td><img src="<?php echo $row['filmpic']?>" width=35 height=35 ></td>
	<td><input type="text" name="Name" value="<?php echo $row['filmname']?>"></td>
	<td><input type="text" name="Actor" value="<?php echo $row['actor']?>"></td>
	<td><input type="text" name="Actress" value="<?php echo $row['actress']?>"></td>
	<td><input type="text" name="Producer" value="<?php echo $row['producer']?>"></td>
	<td><input type="text" name="Cat" value="<?php echo $row['category']?>"></td>
	<td><input type="text" name="Language" value="<?php echo $row['language']?>"></td>
	<input type="hidden" name="sid" value="<?php echo $row['filmid']?>"/>
	<td><input type="submit" name="edit"  value="Add "></td>
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