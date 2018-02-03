<?php
include 'connection.php';
if(!(isset($_SESSION['username'])))
{
header('location:index.php');

}
  if(isset($_POST['submit']))
  {
	  $a=$_POST['sid'];
  }

//echo $a;
$m=$_SESSION['lid'];
echo $m;
if(isset($_POST['sub']))
    {   
$id=$_POST['id'];
$msg=$_POST["msg"];
$rate=$_POST["rate"];
$sql="INSERT INTO `rating`(`msg`, `rate`, `fid`, `userid`) VALUES ('$msg', '$rate', '$id','$m')";
$result=mysqli_query($con,$sql);
}
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
</style>

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
  <a href="rating.php">Rate Film </a>
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
<div>
<form name="rate" action="#" method="post">
<h2 style="color:red;">RATE YOUR FAVORATE FILM</h2><br/>
<input type="textarea" placeholder="Enter your comments" name="msg" id="msg" value=""style="border-radius:5px; margin-left:70%; height:10%;"><br/><br/>
<select name="rate" class="form-control" style="margin-left:70%; border-radius:5px;">
							<option style="color:red;" value=5>excellent</option>
							<option style="color:red;" value=4>very good</option>
							<option style="color:red;" value=3>good</option>
							<option style="color:red;" value=2>fair</option>						
							<option style="color:red;" value=1>poor</option>
				        </select></br></br>
						<input type="hidden" value="<?php echo $a?>" name="id" >
  <input type='submit' value='Send' name="sub" style="border-radius:5px; margin-left:70%;">
  </form>
</div>
</head>
</body>
</html>