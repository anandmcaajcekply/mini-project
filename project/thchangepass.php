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
<style>

.topnav {

  background-color: #333;
  height:50px;
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
.dropdown {
    position: relative;
    display: inline-block;
	color: white;
	margin-top:1.2%;
	
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #ddd;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    padding: 12px 16px;
    z-index: 12;
	color:red;
}

.dropdown:hover .dropdown-content {
	color:black;
    display: block;
}
#bgVideo{ 
    position: absolute;
    top: 0;
    left: 0;
    border: 0;
    z-index: -2;
    background-size: cover;
}
</style>

</head>
<body>
<div class="topnav">
  <a class="active" href="theaterhome.php">Home</a>
  <a href="ownerprofileview.php">Profile</a>
  <a href="addseat.php">Add Seat</a>
  <a href="viewbooked.php">view booked</a>
  <a href="onlineseat.php">Online Seat</a>
  <a href="owneraddfilm.php">Add Film</a>
  <a href="ownerviewfilm.php">view Film</a>
  <a href="deleteshowadd.php">Delete Show</a>
  <a href="ownerviewtheater.php">View Theater</a>
  <div class="dropdown">
  <span>Bank</span>
  <div class="dropdown-content">
  <a href="theaterwal.php">Add Bank</a>
   <a href="theatermywal.php">My Wallet</a>
  </div>
</div> 
  
  <a href="logout.php">Logout</a>
  <?php $mid=$_SESSION['name'];?>
  <p style="color:white; margin-left:90%; margin-top:-18px">hai...!!!<?php echo $mid;?></p>
</div>
<div class="container">
	<section id="content">
		<form action="thchangepass.php" method="post" name="mform">
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
