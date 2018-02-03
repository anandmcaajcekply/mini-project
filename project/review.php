<?php
include 'connection.php';
if(!(isset($_SESSION['username'])))
{
header('location:index.php');

}
 if(isset($_POST['submit1']))
  {
	  $a=$_POST['sid'];
	  //echo $a;
	  $sql1="select * from rating,filmadd where filmadd.filmid=rating.fid and filmadd.filmid=$a";
	  $res=mysqli_query($con,$sql1);
	  $row1=mysqli_fetch_array($res);
	   
	  $p=$row1['filmname'];
	  //echo $p;
	  $sql= "select count(`rate`) AS num,sum(`rate`) AS sm from `rating` where `fid`='$a' ";
	  $result=mysqli_query($con,$sql);
	  $row=mysqli_fetch_array($result);
		$c=$row["num"];
		$s=$row["sm"];
		if($c==0)
		{
			echo "<script>if(confirm('not rated yet!!!!')){document.location.href='rating.php'}else{document.location.href='rating.php'};</script>";
			
		}
		else{
		$v= $s/$c;
		//echo $c;
		//echo $s;
		//echo $v;
		}
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
.disp{
	position:absolute;
	margin-top:-10%;
	margin-left:50%;
	width:20%;
	height:20%;
	border-radius:5px;
	border-color:black;
	background-color:green;
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
    background-size:cover;
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
    <source src="images11/ultra.mp4" type="video/mp4"/>
    <!--<source src="videos/test-640x368-webmvp8-miro.webm" type="video/webm"/> -->
    <!--<source src="videos/test-640x368-theora-miro.ogv" type="video/ogg"/>    -->
</video>
<div style="background-color:transparent;margin-top:10px; border-style: solid;width:50%; border-color: black;border-radius: 5px;">
<form name="form2" action="#" method="post">
<h1><center><B>Film Details</b></center></h1>
<img src="<?php echo $row['filmpic']?>" style="width:100px; height:100px; margin-left:20%;" ><br>
<input style="margin-top:5px;margin-left:15%;border: 2px dashed #D1C7AC;
	width: 230px;" type="text" name="Name" value="<?php echo $row1['filmname']?>"><br>
	
	<input style="margin-top:5px;margin-left:15%;border: 2px dashed #D1C7AC;
	width: 230px;" type="text" name="Actor" value="<?php echo $row1['actor']?>"><br>
	
	<input style="margin-top:5px;margin-left:15%;border: 2px dashed #D1C7AC;
	width: 230px;" type="text" name="Actress" value="<?php echo $row1['actress']?>"><br>
	
	<input style="margin-top:5px;margin-left:15%;border: 2px dashed #D1C7AC;
	width: 230px;" type="text" name="Producer" value="<?php echo $row1['producer']?>"><br>
	
	<input style="margin-top:5px;margin-left:15%;border: 2px dashed #D1C7AC;
	width: 230px;" type="text" name="Cat" value="<?php echo $row1['category']?>"><br>
	
	<input style="margin-top:5px;margin-left:15%;border: 2px dashed #D1C7AC;
	width: 230px;" type="text" name="Language" value="<?php echo $row1['language']?>"><br>
</form>
</div>
<form name="review" action="#" method="post">
<div class="disp">
<?php
if($v==5)
		
{?>
<img src="images1/Star.png"  style="height:30px;"></img>
<img src="images1/Star.png" style="height:30px;"></img>
<img src="images1/Star.png" style="height:30px;"></img>
<img src="images1/Star.png" style="height:30px;"></img>
<img src="images1/Star.png" style="height:30px;"></img>
<br><br>
<input type="text" name="hel" value="9/10" readonly style="background-color:transparent;">

	<?php
}
elseif($v==4)
{
	?><img src="images1/Star.png"  style="height:30px;"></img>
	<img src="images1/Star.png" style="height:30px;"></img>
	<img src="images1/Star.png" style="height:30px;"></img>
	<img src="images1/Star.png" style="height:30px;"></img>
	<br><br>
	<input type="text" name="ra" value="7/10" readonly style="background-color:transparent;">

	<?php
}
elseif($v==3)
{
?><img src="images1/Star.png"  style="height:30px;"></img>
	<img src="images1/Star.png" style="height:30px;"></img>
	<img src="images1/Star.png" style="height:30px;"></img>
	<br><br>
	<input type="text" name="ra" value="6/10" readonly style="background-color:transparent;" >
	<?php
}
	
elseif($v==2)
{
?><img src="images1/Star.png" style="height:30px;"></img>
	<img src="images1/Star.png" style="height:30px;"></img></img>
	<br><br>
	<input type="text" name="ra" value="5/10" readonly style="background-color:transparent;">
<?php	
}
elseif($v==1)
{
?><img src="images1/Star.png" style="height:30px;"></img>
	<img src="images1/Star.png" style="height:30px;"></img></img>
	<br><br>
	<input type="text" name="ra" value="4/10" readonly style="background-color:transparent;">
<?php	
}
else{
	?><img src="images1/Star.png" style="height:30px;"></img>
	<br><br>
	<input type="text" name="ra" value="3/10" readonly style="background-color:transparent;">
	
<?php
}
  
?>
</div>
  </form>


</body>
</html>