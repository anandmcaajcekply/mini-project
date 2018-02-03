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
.box {
  float: left;
  width: 200px;
  height: 100px;
  margin: 1em;
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
<?php
if(isset($_POST['num'])){
	$a=$_POST['num'];
	$n=$_SESSION['arc'];
	$_SESSION['cnt'][$n]=$a;

	//$c[$n]=$a;


	//$c[2]=$a;
	for($i=0;$i<$n+1;$i++)
	{
		print_r($_SESSION['cnt'][$i]);
	}
	$n=$n+1;
	$_SESSION['arc']=$n;
	header("location:demo.php");
}
if(isset($_POST['add'])){
	$tid=$_SESSION['tid'];
	$uid=$_SESSION['lid'];
	$n=$_SESSION['arc'];
	$dt=$_SESSION['dt'];
    $shid=$_SESSION['shid'];
	if($shid==1)
	{
		$sh="morning show";
	}
	elseif($shid==2)
	{
		$sh="noon show";
	}
	else
	{
		$sh="mattini";
	}
	$price=0;
	for($i=0;$i<$n;$i++)
	{
		$price=$price+120;
	}
	 $price;
	 
	 $sql9="SELECT * FROM `staffreg` WHERE `theaterid`='$tid'";
		$res=mysqli_query($con,$sql9);
		$row4=mysqli_fetch_array($res);
		$q=$row4['lid'];
		//echo $q;
		
	 $sql4="SELECT * FROM `wallet` WHERE `logid`='$uid'";
		$result4=mysqli_query($con,$sql4);
		$row4=mysqli_fetch_array($result4);
		$r1=$row4['balance'];
		
		$sql8="SELECT * FROM `wallet` WHERE `logid`='$q'";
		$result8=mysqli_query($con,$sql8);
		$row8=mysqli_fetch_array($result8);
		$r2=$row8['balance'];
		//echo $r2;
		
		$ttl=$r1-$price;
		
		$fprice=$r2+$price;
		//echo $fprice;
		if($price>$r1)
		{
			echo "<script>if(confirm('no balance!!!!')){document.location.href='userhome.php'}else{document.location.href='userhome.php'};</script>";
  
		}
		else
		{
			for($i=0;$i<$n;$i++)
	{
		$sid=$_SESSION['cnt'][$i];
		//echo($sid);
		//echo($tid); 
		$sql6="UPDATE `wallet` SET `balance`='$ttl' WHERE `logid`='$uid'";
        $result6=mysqli_query($con,$sql6);
		$sql7="UPDATE `wallet` SET `balance`='$fprice' WHERE `logid`='$q'";
        $result7=mysqli_query($con,$sql7);
		
		//echo($uid);(`bookid`, `userid`, `theaterid`, `seatid`, `show_num`, `date`, `paystatus`)
		$sql="INSERT INTO `seat_book`(`userid`, `theaterid`, `seatid`, `show_num`, `date`, `paystatus`) VALUES ('$uid','$tid','$sid','$shid','$dt','0')";
		$result=mysqli_query($con,$sql);
		//echo $sql;
	 $sql12="SELECT * FROM `theaterreg` WHERE `theaterid`='$tid'";
	 $res12=mysqli_query($con,$sql12);
	 $row12=mysqli_fetch_array($res12);
	 $n1=$row12['tname'];
	 $sql13="SELECT * FROM `theatershowadd` WHERE `theaterids`='$tid' and status='0'";
	 $res13=mysqli_query($con,$sql13);
	 $row13=mysqli_fetch_array($res13);
	 $n2=$row13['filmid'];
	 
	 $sql14="SELECT * FROM `filmadd` WHERE `filmid`='$n2'";
	 $res14=mysqli_query($con,$sql14);
	 $row14=mysqli_fetch_array($res14);
	 $n3=$row14['filmname'];
		$q=$_SESSION['username'];
		$mid=$_SESSION['fname'];
		//echo $q;
		$to = $q;
			$subject = "Universal Cinema";
			$message ="<html>
			<head>
			<title>Tickect for Movie</title>
			</head>
			<body>
			<h2><b><i>your ticket</i><b></h2>
			<h3><b><i>Theatre:$n1</i><b></h3>
			<h3><b><i>Film: $n3</i><b></h3>
			<h3><b><i>Show Date: $dt</i><b></h3>
			<table>
			<tr>
			<th>CUSTOMER NAME:</th>
			<th>SHOW NAME&nbsp;</th>
			<th>SEAT NO&nbsp;</th>
			<th>&nbsp;&nbsp; PRICE</th>
			</tr>
			<tr>
			<td>$mid</td>
			<td>$sh</td>
			<td>$sid</td>
			<td>Rs: 120</td>
			</tr>
			<tr>
			</tr>
			<tr>
			<td>*Note::Payment wont refund</td>
			</tr>
			</table>
			</body>
			</html>";
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers .= 'From: <anands@mca.ajce.in>' . "\r\n";
			$headers .= 'Cc: anands@mca.ajce.in' . "\r\n";
			mail($to,$subject,$message,$headers);
		
		//echo "<script>alert('Ticket Send to Registered Email ');</script>";
	}
	unset($_SESSION['dt']);
	unset($_SESSION['shid']);
	unset($_SESSION['cnt']);
	unset($_SESSION['arc']);
	$_SESSION['cnt']=array();
     $_SESSION['arc']=0;
	header("location:demo.php");
		}
	
}

?>