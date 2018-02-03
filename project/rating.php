<?php
include 'connection.php';
if(!(isset($_SESSION['username'])))
{
header('location:index.php');
}
$sql="SELECT * from filmadd";
		$result=mysqli_query($con,$sql);
?>
<html>
<head>
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
    z-index: 50;
	color:red;
}

.dropdown:hover .dropdown-content {
	color:black;
    display: block;
}
#bgVideo{ 
    position: absolute;
    top: 0;
    left: 0px;
    border: 0;
	width:120%;
    z-index: -2;
    background-size: cover;
}
#bgVideo1{ 
    position: absolute;
    top: 100%;
    left: 0px;
    border: 0;
	width:120%;
    z-index: -2;
    background-size: cover;
}
</style>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="topnav">
  <a class="active" href="#home">Home</a>
  <a href="profileview.php">Profile</a>
  <a href="userviewfilms.php">Book My Show </a>
  <a href="userviewfilms.php">View films </a>
  <a href="newrelease.php">New Release </a>
  <a href="upcomming.php">Upcoming </a>
  <a href="userchangepass.php">Change Password</a>
  <div class="dropdown">
  <span>Bank</span>
  <div class="dropdown-content">
  <a href="wal.php">Add bank</a>
  <a href="mywallet.php">view my Wallet</a>
   </div>
</div> 
  <a href="logout.php">Logout</a>
  <?php $mid=$_SESSION['fname'];?>
  <p style="color:white; margin-left:90%; margin-top:-18px">hai...!!!<?php echo $mid;?></p>
  </div>
  <video id="bgVideo" autoplay loop="videos/poster.mp4">
    <source src="images1/ultra.mp4" type="video/mp4"/>
    <!--<source src="videos/test-640x368-webmvp8-miro.webm" type="video/webm"/> -->
    <!--<source src="videos/test-640x368-theora-miro.ogv" type="video/ogg"/>    -->
</video>
<video id="bgVideo1" autoplay loop="videos/poster.mp4">
    <source src="images1/ultra.mp4" type="video/mp4"/>
    <!--<source src="videos/test-640x368-webmvp8-miro.webm" type="video/webm"/> -->
    <!--<source src="videos/test-640x368-theora-miro.ogv" type="video/ogg"/>    -->
</video>
<div class="container-fluid" >
	
	
<?php
while($row=mysqli_fetch_array($result))
		 {
			 ?>
	
	<div class="col-md-3 col-md-offset-1" style="background-color:transparent;margin-top:10px; border-style: solid; border-color: white;border-radius: 5px;""> 
	<form name="myform" action="rate.php" method="post">
	<img src="<?php echo $row['filmpic']?>" style="width:50px; height:50px; margin-left:30%;" ><br>
	
	<input style="margin-top:5px;margin-left:15%" type="text" name="Name" value="<?php echo $row['filmname']?>">
	
	<input style="margin-top:5px;margin-left:15%" type="text" name="Actor" value="<?php echo $row['actor']?>">
	
	<input style="margin-top:5px;margin-left:15%" type="text" name="Actress" value="<?php echo $row['actress']?>">
	
	<input style="margin-top:5px;margin-left:15%" type="text" name="Producer" value="<?php echo $row['producer']?>">
	
	<input style="margin-top:5px;margin-left:15%" type="text" name="Cat" value="<?php echo $row['category']?>">
	
	<input style="margin-top:5px;margin-left:15%" type="text" name="Language" value="<?php echo $row['language']?>">
	
	<input style="margin-top:5px;margin-left:15%" type="hidden" name="sid" value="<?php echo $row['filmid']?>"/> <br>
	
	<input style="margin-top:10px;margin-left:20%; background-color: #4CAF50; 
    border: none;
	color: white;
    padding: 16px 32px;
    text-align: center;
    text-decoration: bold;
    display: inline-block;
    font-size: 16px;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
    cursor: pointer;" type="submit" name="submit"  value="Rate ">
	<br/>
	</form> 
	<form name="myform1" action="review.php" method="post">
	<input style="margin-top:5px;margin-left:15%" type="hidden" name="sid" value="<?php echo $row['filmid']?>"/> <br>
	<input style="margin-top:10px;margin-left:20%; background-color: #4CAF50; 
    border: none;
	color: white;
    padding: 16px 32px;
    text-align: center;
    text-decoration: bold;
    display: inline-block;
    font-size: 16px;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
    cursor: pointer;" type="submit" name="submit1"  value="Review ">
	<br/>
	</form>
	</div>
	
	
	
	<!--  <td><input type="button" name="delete" value="Delete"></td> -->
	
	
	
	
	
	
	<?php
		 }
		 ?>
		 
		 
	</div>
	
</body>
</html>