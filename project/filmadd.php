<!doctype html>
<?php
include 'connection.php';
if(!(isset($_SESSION['username'])))
{
header('location:index.php');
}
	if(isset($_POST['submit']))
    {   
	//film details
		//$a=$_POST["email"];
		//echo $a;
		//$b=$_POST["pass"];
	//	echo $b;
		//$g=$_POST["cpass"];
		
		$b=$_POST["fname"];
		echo $b;
		$c=$_POST["actor"];
		echo $c;
		$d=$_POST["heroine"];
		echo $d;
		$e=$_POST["producer"];
		//echo $e1;
		//theater detalis
		$path= "upload/".$_FILES['fileupload']['name'];
		echo($path);
        copy($_FILES['fileupload']['tmp_name'], $path);
		$i=$_POST["cat"];
		$j=$_POST["lang"];
		$k=$_POST["release"];
		//$l=$_POST["email1"];
		//$m=$_POST["mode"];
		//$n=$_POST["screen"];
		//$o=$_POST["seatno"];
		$sql1="SELECT * FROM `filmadd` where `filmname`='$b'";
		$result1=mysqli_query($con,$sql1);
	   $row=mysqli_fetch_array($result1);
	   if($row['filmname']=="")
	   {
		$sql="INSERT INTO `filmadd`(`filmpic`, `filmname`, `actor`, `actress`, `producer`, `category`, `language`, `reldate`) VALUES('$path','$b','$c','$d','$e','$i','$j','$k')";
		$result=mysqli_query($con,$sql);
		}
	else
	   {
		   echo "<script>if(confirm('film already exists!!!!')){document.location.href='filmadd.php'}else{document.location.href='#'};</script>";
       
	   }
	}
	?>
<html>
<head>
<script src="validation.js"></script>
<script src="reg.js"></script>
<link rel="stylesheet" href="filmadd.css" />
</head>
<body>
<div class="menu">
  <table  style="color: #fff;
						font-size: 2em;
						font-weight: 200;
						font-family: 'Georgia', cursive;
						align="right";
						>
			<tr><td><a class="links" style="color: #DC6180;text-decoration: none;" href="index.html">
			
	HOME&nbsp|&nbsp
	</a></td>
	<td><a class="links" style="color: #DC6180;text-decoration: none;" href="adminlogout.php">
			
	LOGOUT &nbsp&nbsp
	</a></td></tr>
	</table>
	</div>
<form name="treg" id="msform" method="post" action="#" enctype="multipart/form-data">
    <fieldset>
  <table>
    <tr><th style="align:center;"><h2 class="fs-title">FILM DETAILS</h2></th></tr>
	<tr><td><input type="file" name="fileupload" accept="image/*" size="70"/></td></tr>
	<tr><td><input type="text"  name="fname" placeholder="Film Name"  required /></td></tr>
	<!--<tr style="align:center;"><td>Personal Details</td></tr>-->
	<tr><td><input type="text" id="h1" name="actor" placeholder="Hero"onchange="h()" required /></td>
			<td><input type="text" id="h2" name="heroine" placeholder="Heroine" onchange="ll()" required /></td></tr>
	<tr><td><input type="text" id="h3" name="producer" placeholder="Producer" onchange="l3()" required /></td></tr>
		<!--<tr><td><textarea name="address" placeholder="Address"></textarea></td></tr>
	<tr style="align:center;"><td>Theater Details</td></tr>-->
	
	<tr>
	<td> <select name="cat" required>
	<option value="">Category</option>
	<?php
	$v="select * from addcat";
	$s=mysqli_query($con,$v);
	while($re=mysqli_fetch_array($s)){
	?>
	<option ><?php echo $re['catname'];?></option>
	<?php
	}
	?>
</select> </td></tr>
	
	<tr>
	<td> <select name="lang" required>
	<option value="">Language</option>
	<?php
	$q="select * from addlang";
	$w=mysqli_query($con,$q);
	while($r1=mysqli_fetch_array($w)){
	?>
	<option><?php echo $r1['lang'];?></option>
	<?php
	}
	?>
</select> </td></tr>
		
	<tr><td><input type="date" name="release" placeholder="	Release Date"  required/></td></tr>
    <tr><td><input type="submit" name="submit" class="submit action-button" value="Add Film" /></td>
	</tr>
	
	</table>
	</fieldset>
</form>
</body>
</html>