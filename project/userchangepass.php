<!doctype html>
<?php
include 'connection.php';
if(!(isset($_SESSION['username'])))
{
	
header('location:index.php');
}

	if(isset($_POST['submit']))
    {   
	
    $a=$_POST["npass"];
    $b=$_POST["cpass"];
    echo($a);
    echo($b);
	function encryptIt($q){
    $cryptKey  = 'qJB0rGtIn5UB1xG03efyCp';
    $qEncoded      = base64_encode( mcrypt_encrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), $q, MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ) );
    return( $qEncoded );
}
$encrypted = encryptIt($b);
	if($a==$b)
	{
	$id=$_SESSION['lid'];
    $sql12="UPDATE `login` SET `password`='$encrypted' WHERE `lid`='$id'";	
	$result12=mysqli_query($con,$sql12);
	}
	else
	{
		echo("enter correct password");
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
			<tr><td><a class="links" style="color: #DC6180;" href="userhome.php">
			
	HOME&nbsp&nbsp
	</a></td>
	</table>
	</div>
<div class="container">
	<section id="content">
		<form action="userchangepass.php" method="post" name="mform">
			<h1>Set Password</h1>
			<div>
				<input type="password" placeholder="New Password" required="" id="password" name="npass" />
			</div>
			<div>
				<input type="password" placeholder="Confirm Password" required="" id="password" name="cpass" />
			</div>
			<div>
				<input type="submit" value="Reset" name="submit" />
				<a href="forgot.php">Lost your password?</a>
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
