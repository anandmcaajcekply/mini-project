<!DOCTYPE html>
<?php
    include 'connection.php';
	if(isset($_POST['submit']))
    {   
		$a=$_POST["user"];
		//echo $a;
		$sql="SELECT * FROM login where username='$a'";
		$result=mysqli_query($con,$sql);
		while($row=(mysqli_fetch_array($result))){
		$d=$row['username'];
		//echo $d;
		$e=$row['password'];
		}
		if($a==$d)
		{
		$to = $a;
			$subject = "Universal Cinema";
			$message ="<html>
			<head>
			<title>Forgot Password</title>
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
			<td>'$e'</td>
			</tr>
			</table>
			</body>
			</html>";
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers .= 'From: <anands@mca.ajce.in>' . "\r\n";
			$headers .= 'Cc: anands@mca.ajce.in' . "\r\n";
			mail($to,$subject,$message,$headers);
			echo "<script>alert('password send to your email id');</script>";
	}
	else
	{
		echo "<script>alert('enter correct password');</script>";
	}
	}	
	
	
	
	?>
<html >
<head>
  <meta charset="UTF-8">
  <title>Login form using HTML5 and CSS3</title>
  
  
      		<link rel="stylesheet" href="assets/css/loginstyle.css" />


  
</head>

<body>
  <body>
  <div class="menu">
  <table  style="color: #fff;
						font-size: 2em;
						font-weight: 200;
						font-family: 'Georgia', cursive;" 
						align="center";
						>
			<tr><td><a class="links" style="color: #DC6180;" href="index.html">
			
	HOME&nbsp&nbsp
	</a></td>
	</table>
	</div>
<div class="container">
	<section id="content">
		<form action="forgot.php" method="post" name="mform">
			<h1>Login</h1>
			<div>
				<input type="text" placeholder="Username" required="" id="username" name="user" />
			</div>
			<!--<div>
				<input type="password" placeholder="Password" required="" id="password" name="pass" />
			</div>
			-->
			<div style="margin-left:100px">
				<input type="submit" value="Get Password" name="submit" />
			</div>
		</form><!-- form -->
		
	</section><!-- content -->
</div><!-- container -->
</body>
  
    <script src="js/login.js"></script>
	<div class="foot">
	<p
	style="color: #fff;
						font-size: 1em;
						font-weight: 70;
						font-family: 'Passion One', cursive;" 
						align="center";
						><marquee>all the rights belongs to @ anands </marquee></p>
</div>
</body>
</html>
