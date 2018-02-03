<doctype html5>
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
<?php
$NewDate=Date('mm', strtotime("+3 days"));
$NewDate1=Date('mm:dd:yyyy', strtotime("-1 days"));

date_default_timezone_set('Asia/Kolkata');
$date3 = date('Y-m-d', time());
$NewDate=Date('Y-m-d', strtotime("+3 days"));
$Today=date('y:m:d');
?>
<span>select date:</span><input type="date" min="<?php echo $date3;?>" max="<?php echo $NewDate;?>" name="date2" >
<input type="submit" name="ok" value="ok">
</form>
<form action="dd.php" method="post" >
<?php
include 'connection.php';
if(isset($_POST['submit']))
{
	$theaterid=$_POST['sid'];
	$_SESSION['tid']=$theaterid;
	$q=$_SESSION['username'];
echo $q;
}
if(isset($_POST['ok']))
{
	unset($_SESSION['dt']);
	unset($_SESSION['shid']);
	unset($_SESSION['cnt']);
	unset($_SESSION['arc']);
	$_SESSION['cnt']=array();
     $_SESSION['arc']=0;
date_default_timezone_set('Asia/Kolkata');
$date3 = date('Y-m-d', time());
$time2=date('h:i:s a', time());
$v=date("H:i", strtotime($time2));
$show=$_POST['loc'];
$_SESSION['shid']=$show;
$d2=$_POST['date2'];
$_SESSION['dt']=$d2;
$date="$date3 $v";
//echo $date3;
}
if(isset($_SESSION['tid']) and isset($_SESSION['shid']))
{
	date_default_timezone_set('Asia/Kolkata');
$date3 = date('Y-m-d', time());
$time2=date('h:i:s a', time());
$v=date("H:i", strtotime($time2));
$date="$date3 $v";
	$shid=$_SESSION['shid'];
$tid=$_SESSION['tid'];
$dt=$_SESSION['dt'];
				if($shid==1)
				{    
				$date2="$dt 10:30";
				if($date2<$date)
				{
					unset($_SESSION['dt']);
	           unset($_SESSION['shid']);
				echo "<script>if(confirm('enterd date is not valid!!!')){document.location.href='demo.php'}else{document.location.href='demo.php'};</script>";
				
					}
				}
				elseif($shid==2)
				{ 
				$date2="$dt 14:15";
				if($date2<$date)
				{
					unset($_SESSION['dt']);
	                unset($_SESSION['shid']);
				echo "<script>if(confirm('enterd date is not valid!!!')){document.location.href='demo.php'}else{document.location.href='demo.php'};</script>";
				}
				}
				elseif($shid==3)
				{
				$date2="$dt 21:00";
				if($date2<$date)
				{
					unset($_SESSION['dt']);
	unset($_SESSION['shid']);
				echo "<script>if(confirm('enterd date is not valid!!!')){document.location.href='demo.php'}else{document.location.href='demo.php'};</script>";
				//echo "<script>alert('enterd date is note valid!!!');</script>";
				}
				}
				else
				{
					unset($_SESSION['dt']);
	unset($_SESSION['shid']);
				echo "<script>if(confirm('select show!!!')){document.location.href='demo.php'}else{document.location.href='demo.php'};</script>";
				//echo "<script>alert('select show!!!');</script>";
				}
			
//echo $tid;

//SELECT * FROM `seat_book` WHERE `bookid``userid``theaterid``seatid``show_num``date``paystatus`

$tid=$_SESSION['tid'];	
	//echo($theaterid);
$sql="SELECT * FROM `seat` WHERE `theaterid`='$tid'";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_array($result);
$row1=$row['row1'];
$col1=$row['col1'];
$count=1;
$st=$row['startno'];
$end=$row['endno'];
$n=$_SESSION['arc'];

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
			 
							for($k=0;$k<$n;$k++)
							{
								if($count==$_SESSION['cnt'][$k])
								{
									$t=true;
								}
							}
						if($t==true || $h==true)
						{	
						?>	
						<input type="button" value="<?php echo($count);?>" disabled style="width:4%; border-color:yellow;">
						<?php
						$k=$k+1;
						}
						else{
						?>
						
						<input type="submit" name="num" value="<?php echo($count);?>" style="width:4%;  border-color:blue;">
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
?>
</br>
<?php
}
?>
</form>
<form action="dd.php" method="post">
<input type="submit" name="add" value="BOOK NOW"   style="width:8%; color:red;">
</form>
<?php
}
?>

</body>
</html> 