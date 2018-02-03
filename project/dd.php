<?php
include 'connection.php';
if(!(isset($_SESSION['username'])))
{
header('location:index.php');
}

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
		$sh="morning-show";
	}
	elseif($shid==2)
	{
		$sh="noon-show";
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
		$sid.=$_SESSION['cnt'][$i].",";
		//echo($sid);
		//echo($tid); 
		
	}
	echo $sid;
		$sql6="UPDATE `wallet` SET `balance`='$ttl' WHERE `logid`='$uid'";
        $result6=mysqli_query($con,$sql6);
		$sql7="UPDATE `wallet` SET `balance`='$fprice' WHERE `logid`='$q'";
        $result7=mysqli_query($con,$sql7);
		
		//echo($uid);(`bookid`, `userid`, `theaterid`, `seatid`, `show_num`, `date`, `paystatus`)
		$sql="INSERT INTO `seat_book`(`userid`, `theaterid`, `seatid`, `show_num`, `date`, `paystatus` , `amt`) VALUES ('$uid','$tid','$sid','$shid','$dt','0','120')";
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
		$img="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=theater:$n1,Film:$n3,date:$dt,show-name:$sh,seat-no:$sid,CustomerName:$mid&choe=UTF-8"
		?>
		 <img src="<?php echo $img?>" style="height:297px;" alt="No Internet Connection.." />
		<?php
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
			<td>$img</td>
			</tr>
			<tr>
			</tr>
			<tr>
			<td><img src= $img style='height:297px;'/></td>
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