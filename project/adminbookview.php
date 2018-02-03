<html>
<head>
<style>
.topnav {
  overflow: hidden;
  background-color: #333;
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
.box {
	position:absolute;
  margin-top:1%;
  margin-left:45%;
  width: 200px;
  height: 100px;
}
</style>
</head>
<body>
<div class="topnav">
  <a class="active" href="userhome.php">Home</a>
  <a href="profileview.php">Profile</a>
  <a href="#">Book My Show </a>
  <a href="userviewfilms.php">View films </a>
  <a href="newrelease.php">New Release </a>
  
  <a href="wal.php">Add bank</a>
  <a href="mywallet.php">view my Wallet</a>
  <a href="logout.php">Logout</a>
  <!--<?php $mid=$_SESSION['fname'];?> -->
  <p style="color:white; margin-left:90%;">hai...!!!<?php echo $mid;?></p>
 </div>
<form name="f1" action="#" method="post">
<select name="loc">
<option value=0>Show time</option>
  <option value="1">Morning show</option>
  <option value="2">Noon show</option>
  <option value="3">Mattini show</option>
</select>
<span>select date:</span><input type="date" name="date2" >
<input type="submit" name="ok" value="ok">
</form>

<?php
include 'connection.php';

if(isset($_POST['ok']))
{
	
date_default_timezone_set('Asia/Kolkata');
$date3 = date('Y-m-d', time());
$time2=date('h:i:s a', time());
$v=date("H:i", strtotime($time2));
$show=$_POST['loc'];
$shid=$show;
$_SESSION['shid']=$show;
$d2=$_POST['date2'];
$_SESSION['dt']=$d2;
$dt=$d2;
$date="$date3 $v";
$lid= $_SESSION['lid'];
$sql88="SELECT * FROM `staffreg` WHERE `lid`='$lid'";
$result88=mysqli_query($con,$sql88);
$row88=mysqli_fetch_array($result88);

$tid=$row88['theaterid'];


	
	

			
				
//echo $tid;

//SELECT * FROM `seat_book` WHERE `bookid``userid``theaterid``seatid``show_num``date``paystatus`

$sql="SELECT * FROM `seat` WHERE `theaterid`='$tid'";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_array($result);
$row1=$row['row1'];
$col1=$row['col1'];
$count=1;
$st=$row['startno'];
$end=$row['endno'];
$n=$_SESSION['arc'];
$s=$row['total_seatno'];
//echo $s;
//$shid=$_SESSION['shid'];
$k=0;
for($i=0;$i<$row1;$i++)
{
	for($j=0;$j<$col1;$j++)
{
	if($count==$st&&$count<=$end)
	{
	$st++;
	$t=false;
	$h=false;
	         $sql="SELECT `seatid` FROM `seat_book` WHERE `theaterid`='$tid' and `date`='$dt' and `show_num`='$shid' and `seatid`='$count'";
		     $result=mysqli_query($con,$sql);
	         $row4=mysqli_fetch_array($result);
			 
				$siid1=$row4['seatid'];
				if($count==$siid1)
				{
					$h=true;
				}	
			 
							
						if($h==true)
						{	
						?>	
						<input type="button" value="<?php echo($count);?>" disabled style="width:4%; border-color:yellow;">
						<?php
						$k=$k+1;
						}
						else{
						?>
						
						<input type="submit" name="num" value="<?php echo($count);?>" disabled style="width:4%;  border-color:blue;">
						<input type="hidden" name="co" value="<?php echo($count);?>">
						<?php
						}
		    
	}
	else
	{
		?>
		
		<input type="button" value="<?php echo($count);?>" disabled style="width:4%; border-color:red;">
		<?php
		
	}
	$count++;
	
}
}
?>

<?php
?>
<div class="box">
<h1 style="marign-left:50%;color:black;"> Booked Seats </h1>
<input type="text" name="h" value="<?php echo $k;?>" disabled style="font-style: oblique;font-size:20px; align:center;">
<?php
$t=$s-$k;
//echo $t; 
?>
<h1 style="marign-left:50%;color:black;"> Avilable Seats </h1>
<input type="text" name="h" value="<?php echo $t;?>" disabled style="font-style: oblique;font-size:20px; align:center;">
</div>
<?php

}
?>


</body>
</html> 