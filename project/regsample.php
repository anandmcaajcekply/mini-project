<!doctype html>
<?php
    include 'connection.php';
	if(isset($_POST['submit']))
    {   
		$a=$_POST["email"];
		echo $a;
		$b=$_POST["pass"];
		echo $b;
		$g=$_POST["cpass"];
		$c=$_POST["fname"];
		echo $c;
		$d=$_POST["lname"];
		echo $d;
		$e=$_POST["phone"];
		echo $e;
		$f=$_POST["address"];
		function encryptIt($q){
    $cryptKey  = 'qJB0rGtIn5UB1xG03efyCp';
    $qEncoded      = base64_encode( mcrypt_encrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), $q, MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ) );
    return( $qEncoded );
}
$encrypted = encryptIt($g);
		//echo $e1;
		//$sql3="select username from login";
		//$res3=mysqli_query($con,$sql3);
		//while($ar3=mysqli_fetch_array($res3))
		//$ar3=mysqli_fetch_array($res3);
		//{
		//$mid1=$ar3['username'];
		//echo $mid1;
		//if($a==$mid1)
		//{
		//	echo("username allready exit");
		//}
		if($b==$g)
		{
		$sql1="INSERT INTO `login`(`username`, `password`, `status`, `role`) VALUES ('$a','$encrypted',0,1)";	
		$result1=mysqli_query($con,$sql1);
		$sql2="select max(lid) as id from login";
		
		$res=mysqli_query($con,$sql2);
		$ar=mysqli_fetch_array($res);
		$mid=$ar['id'];
		echo $mid;
		//$sq="INSERT INTO `screen`(`theaterid`, `tmode`, `noscreen`, `seatno`) VALUES ('$mid','$m','$n','$o')";
		//$ress=mysqli_query($con,$sq);	
		
		$sql="INSERT INTO `userlogin`(`fname`, `lname`, `phone`, `address`, `status`, `lid`) VALUES ('$c','$d','$e','$f',0,'$mid')";
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
			<td>'$b'</td>
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
	
	else
	{
		echo("enter correct password");
	}
	}
	?>
<html>
<head>
<script src="validation.js"></script>
<script src="reg.js"></script>
<link rel="stylesheet" href="reg.css" />
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
	<td><a class="links" style="color: #FFFFFF;text-decoration: none;" href="index.html">
			
	LOGIN &nbsp&nbsp
	</a></td></tr>
	</table>
	</div>
<form name="treg" id="msform" method="post" action="#">
    <fieldset>
  <table>
    <tr><th style="align:center;"><h2 class="fs-title">Create your account</h2></th></tr>
	<tr><td><input type="text" name="email" id="email" placeholder="Email" onchange="em()" required /></td></tr>
	<tr>	<td><input type="password" name="pass" id="pass" placeholder="Password" onchange="ps()" required /></td></tr>
	<tr>	<td><input type="password" name="cpass" placeholder="Confirm Password" required /></td></tr>
	<tr style="align:center;"><td>Personal Details</td></tr>
	<tr><td><input type="text" name="fname" id="fname" placeholder="First Name" onchange="n()"required /></td>
			<td><input type="text" name="lname" id="lname" placeholder="Last Name" onchange="ln()" required /></td></tr>
	<tr><td><input type="text" name="phone" id="phone" placeholder="Mobile no" onchange="p()" required /></td></tr>
		<tr><td><textarea name="address" placeholder="Address" required ></textarea></td></tr>
	
    <tr><td><input type="submit" name="submit" class="submit action-button" value="Register" /></td>
	</tr>
	</table>
	</fieldset>
</form>
</body>
</html>