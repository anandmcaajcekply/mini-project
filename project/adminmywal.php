<?php
include 'connection.php';
if(!(isset($_SESSION['username'])))
{
header('location:index.php');
}
$lid=$_SESSION['lid'];
?>
<?php
if(isset($_POST['submit3']))
{
$lid=$_SESSION['lid'];
$amount=$_POST['bal'];
$sql4="SELECT * FROM `wallet` WHERE `logid`='$lid'";
$result4=mysqli_query($con,$sql4);
$row4=mysqli_fetch_array($result4);
$r1=$row4['balance'];
$ttl=$r1+$amount;
$sql5="UPDATE `wallet` SET `balance`='$ttl' WHERE `logid`='$lid'";
$result5=mysqli_query($con,$sql5);
header("location:adminmywal.php");
}
?>
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
</style>
</head>
<body style="background-color:gray;">	
<div class="topnav">
  <a class="active" href="#home">Home</a>
  <a href="profileview.php">Profile</a>
  <a href="#">Book My Show </a>
  <a href="userviewfilms.php">View films </a>
  <a href="newrelease.php">New Release </a>
  
  <a href="wal.php">Add bank</a>
  <a href="logout.php">Logout</a>
  <p style="color:white; margin-left:90%;">hai...!!!</p>
  </div>
<div style="width:35%; float:right; position:absolute;margin-left:52%;margin-top:8%;z-index:100;">
<img src="images1/b1.jpg" alt="Icon" style="width:130%;height:90%;">
</div>
<?php 
$sql="select * from wallet,login where wallet.logid=$lid";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_array($result)
	?>
	<form action="#" method="post" enctype="multipart/form-data" name="form2" id="form2">
			<div style="width:35%; height:100%; margin-top:0%;  z-index:100; margin-left:10%;">
      
			<h2 style="color:pink;margin-left:90%; margin-top:4%;">WALLET</h2><br />								
			
			<span style="color:pink;"><b>Bank Name</b></span><span style="color:red;"></span>:<input type="text" name="bname" value="<?php echo $row['bank_name']?>"   style="z-index:50px; width:120%; height:50px; background-color: white; color:#F59024;" readonly >
			<span style="color:pink;"><b>cvv</b></span><span style="color:red;">*</span>:<input type="text" name="cvv"  value="<?php echo $row['cvv']?>"  style="z-index:50px; width:120%; height:50px;  color:red; background-color: white; color:#F59024;" readonly>
		<span style="color:pink;"><b>Card no</b></span><span style="color:red;">*</span>:<input type="text" name="cardno" value="<?php echo $row['w_acc_no']?>"   style="z-index:50px; width:120%; height:50px;  color:red; background-color: white; color:#F59024;" readonly>
			<span style="color:pink;">Balance</span><span style="color:red;">*</span>:<input type="text" name="psw" value="<?php echo $row['balance']?>"  style="z-index:50px; width:120%; height:50px;  color:red; background-color: white; color:#F59024;" readonly >
</div >
<?php
?>
<div style="margin-top:-15%; margin-left:10%">
<form action="#" method="post" enctype="multipart/form-data" name="form1" id="form1">
<span style="color:pink;"><b>udpate balance</b></span><span style="color:red;"></span>:</br><input type="text" name="bal" style="z-index:50px; width:47%; height:50px; background-color: white; color:#F59024;" >
<table style="width:-5%; margin-left:15%;	28%;margin-top:1%;"><tr><td><button type="submit"name="submit3" style="background: rgb(28, 184, 65);;">Update</button></td></tr></table>	
</div>
</body>
</html>