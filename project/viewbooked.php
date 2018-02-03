<?php
include 'connection.php';
if(!(isset($_SESSION['username'])))
{
header('location:index.php');
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
  <a href="onlineseat.php">Online Seat</a>
  <a href="owneraddfilm.php">Add Film</a>
  <a href="ownerviewfilm.php">view Film</a>
  <a href="deleteshowadd.php">Delete Show</a>
  <a href="ownerviewtheater.php">View Theater</a>
<a href="thchangepass.php">Change password</a>  
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
<video id="bgVideo" autoplay loop="videos/poster.mp4">
    <source src="images1/bgg.mp4" type="video/mp4"/>
    <source src="videos/test-640x368-webmvp8-miro.webm" type="video/webm"/> -->
    <!--<source src="videos/test-640x368-theora-miro.ogv" type="video/ogg"/>    -->
</video>
<div>
<form name="f1" action="#" method="post">
<select name="loc">
<option value=0>Show time</option>
  <option value="1">Morning show</option>
  <option value="2">Noon show</option>
  <option value="3">Mattini show</option>
</select>
<span style="color:white;marign-left:50%;">select date:</span><input type="date" name="date2" >
<input type="submit" name="ok" value="ok">

</form>
</div>
<h1 style="marign-left:50%;color:white;"> Booked Seats </h1>
<table style="margin-top:10%; margin-left:25%;">
<tr><th>Seat No </th> <th>Userid </th> <th> date</th> </tr>
<?php
$tid=$_SESSION['lid'];
$sql1="select * from staffreg where lid= $tid";
$res=mysqli_query($con,$sql1);
$row1=mysqli_fetch_array($res);
$s1=$row1['theaterid'];
//echo $s1;
if(isset($_POST['ok']))
    {   
$s=$_POST['loc'];
//echo $s;
$p=$_POST['date2'];
//echo $p;
$tid=$_SESSION['lid'];
//echo $tid;
$sql22="SELECT count(bookid) as cnt1 from `seat_book` WHERE `theaterid`='$s1' and `date`='$p' and show_num='$s'"; 
$result22=mysqli_query($con,$sql22);
$rw=mysqli_fetch_array($result22);

?>
<input type="text" name="booked Seat" value="<?php echo $rw['cnt1'];?>" readonly>
<?php
$sql="SELECT * FROM `seat_book` WHERE `theaterid`='$s1' and `date`='$p' and `show_num`='$s'"; 
$result=mysqli_query($con,$sql);
$i=0;
while($row=mysqli_fetch_array($result))
{
	?>
	
	
	
	<tr><td><input type="text" name="Name" value="<?php echo $row['seatid']?>" readonly></td>
	<td><input type="text" name="Actor" value="<?php echo $row['show_num']?>" readonly></td>
	<td><input type="text" name="Actress" value="<?php echo $row['date']?>" readonly></td></tr>
	<!--<input type="hidden" name="sid" value="<?php echo $row['filmid']?>"/></tr>  -->
	<!--<td><input type="submit" name="edit"  value="Edit"></td> -->
	
	
	<?php
	
}
	}
?>
</table>
</body>
</html>