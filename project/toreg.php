<!doctype html>
<?php
include 'connection.php';
if(!(isset($_SESSION['username'])))
{
header('location:index.php');
}
function random_password( $length = 8 ) {
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:,.?";
    $password = substr( str_shuffle( $chars ), 0, $length );
    return $password;
}
$p=random_password();
function encryptIt($q){
    $cryptKey  = 'qJB0rGtIn5UB1xG03efyCp';
    $qEncoded      = base64_encode( mcrypt_encrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), $q, MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ) );
    return( $qEncoded );
}
$encrypted = encryptIt($p);
	if(isset($_POST['submit']))
    {   
		$a=$_POST["email"];
		echo $a;
		//$b=$_POST["pass"];
	//	echo $b;
		//$g=$_POST["cpass"];
		$c=$_POST["fname"];
		echo $c;
		$d=$_POST["lname"];
		echo $d;
		$e=$_POST["phone"];
		echo $e;
		$f=$_POST["address"];
		//echo $e1;
		//theater detalis
		$h=$_POST["fileupload"];
		$i=$_POST["tname"];
		$j=$_POST["loc"];
		$k=$_POST["phone1"];
		$l=$_POST["email1"];
		$m=$_POST["mode"];
		$n=$_POST["screen"];
		$o=$_POST["seatno"];
		//login
		$sql12="INSERT INTO `login`(`username`, `password`, `status`, `role`) VALUES ('$a','$encrypted',0,2)";	
		$result12=mysqli_query($con,$sql12);
		$sql22="select max(lid) as id from login";
		$res2=mysqli_query($con,$sql22);
		$ar1=mysqli_fetch_array($res2);
		$mid1=$ar1['id'];
		echo $mid1;
		//theater
		$sql1="INSERT INTO `theaterreg`(`tname`, `location`, `contact`, `email`, `photo`) VALUES ('$i','$j','$k','$l','$h')";	
		$result1=mysqli_query($con,$sql1);
		$sql2="select max(theaterid) as id from theaterreg";
		
		$res=mysqli_query($con,$sql2);
		$ar=mysqli_fetch_array($res);
		$mid=$ar['id'];
		echo $mid;
		$sq="INSERT INTO `screen`(`theaterid`, `tmode`, `noscreen`, `seatno`) VALUES ('$mid','$m','1','$o')";
		$ress=mysqli_query($con,$sq);
		$sql="INSERT INTO `staffreg`(`name`, `lname`, `address`, `contact`, `status`, `lid`,`theaterid`) VALUES ('$c','$d','$f','$e',0,'$mid1','$mid')";
		$result=mysqli_query($con,$sql);
		
		
		$to = $a;
			$subject = "Universal Cinema";
			$message ="<html>
			<head>
			<title>User registeration</title>
			</head>
			<body>
			<p>your username and password is below</p>
			<table>
			<tr>
			<th>UserName</th>
			<th>password</th>
			</tr>
			<tr>
			<td>'$a'</td>
			<td>'$p'</td>
			</tr>
			</table>
			</body>
			</html>";
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers .= 'From: <anands@mca.ajce.in>' . "\r\n";
			$headers .= 'Cc: anands@mca.ajce.in' . "\r\n";
			mail($to,$subject,$message,$headers);
	
	}
	?>
<html>
<head>
<script src="validation.js"></script>
<script src="reg.js"></script>
<link rel="stylesheet" href="toreg.css" />
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
<form name="treg" id="msform" method="post" action="#">
    <fieldset>
  <table>
    <tr><th style="align:center;"><h2 class="fs-title">Create Theater owner account</h2></th></tr>
	<tr><td><input type="text" id="email" name="email" placeholder="Email" onchange="em()" required /></td></tr>
	
	<tr style="align:center;"><td>Personal Details</td></tr>
	<tr><td><input type="text" name="fname" id="fname" placeholder="First Name" onchange="n()" required /></td>
			<td><input type="text" name="lname" id="lname" placeholder="Last Name" onchange="ln()" required /></td></tr>
	<tr><td><input type="text" name="phone" id="phone" placeholder="Phone" onchange="p()" required /></td></tr>
		<tr><td><textarea name="address" placeholder="Address" required ></textarea></td></tr>
	<tr style="align:center;"><td>Theater Details</td></tr>
	<tr><td><input type="file" name="fileupload" size="70"/></td></tr>
	<tr><td><input type="text" id="tname" name="tname" placeholder="Theater Name" onchange="tn()"required />
	</td>
	<td> <select name="loc" required >
	<option value=0>Location</option>
  <option value="mundakayam">mundakayam</option>
  <option value="kanjirapally">kanjirappally</option>
  <option value="kottayam">kottayam</option>
  <option value="kattappana">kattappana</option>
</select> </td></tr>
	
	<tr><td><input type="text" id="phone1" name="phone1" placeholder="Phone" onchange="p1()" required /></td>
		<td><input type="text" name="email1" id="email1" placeholder="email" onchange="em1()" required /></td></tr>
	<tr style="align:center;"><td>Screen Details</td></tr>
		<tr><td><input type="text" name="mode" placeholder="Theater Mode" required /></td></tr>
		
		<tr><td><input type="text" name="screen" id="screen" placeholder="No of Screens" onchange="sc()" required /></td>
		<td><input type="text" name="seatno" placeholder="Total Seats" required /></td></tr>
    <tr><td><input type="submit" name="submit" class="submit action-button" value="Submit" /></td>
	</tr>
	
	</table>
	</fieldset>
</form>
</body>
</html>