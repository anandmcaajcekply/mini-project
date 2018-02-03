<?php
include 'connection.php';
$lid1=$_SESSION['lid'];
$sql1="select * from wallet where wallet.logid='$lid1'";
$result1=mysqli_query($con,$sql1);
$row1=mysqli_fetch_array($result1);
$ds=$row1['w_id'];
//echo $ds;
if($ds!='')
{
	echo "<script>if(confirm('account already exists!!!!')){document.location.href='userhome.php'}else{document.location.href='userhome.php'};</script>";
   
}
//SELECT `w_id`, `logid`, `w_acc_no`, `cvv`, `bank_name`, `balance`, `w_passwd`, `status` FROM `wallet` WHERE 1
if(!(isset($_SESSION['username'])))
{
header('location:index.php');
}
if(isset($_POST['submit']))
{
	$lid=$_SESSION['lid'];
$amount=$_POST['amount'];
$cvv=$_POST['cvv'];
$cardno=$_POST['cardno'];
$bank=$_POST['bank'];
$psw=$_POST['psw'];
//INSERT INTO `wallet`(`w_id`, `logid`, `w_acc_no`, `cvv`, `bank_name`, `balance`, `status`) 
//VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7])
$sql="INSERT INTO `wallet`(`logid`, `w_acc_no`, `cvv`, `bank_name`, `balance`, `w_passwd`, `status`) VALUES ('$lid', '$cardno', '$cvv', '$bank', '$amount', '$psw','0')";
$result=mysqli_query($con,$sql);
header("location:userhome.php");
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
<script src="validation.js"></script>
</head>

<body style="background-color:gray">
<div class="topnav">
  <a class="active" href="#home">Home</a>
  <a href="profileview.php">Profile</a>
  <a href="#">Book My Show </a>
  <a href="userviewfilms.php">View films </a>
  <a href="newrelease.php">New Release </a>
  
  <a href="wal.php">Add bank</a>
  <a href="logout.php">Logout</a>
  <?php $mid=$_SESSION['fname'];?>
  <p style="color:white; margin-left:90%;">hai...!!!<?php echo $mid;?></p>
  </div>
<?php
$lid=$_SESSION['lid'];
//INSERT INTO `wallet`(`w_id`, `logid`, `w_acc_no`, `cvv`, `bank_name`, `balance`, `status`) VALUES
$sql1="SELECT * FROM `wallet` WHERE `logid`='$lid'";
$result1=mysqli_query($con,$sql1);
$row1=mysqli_fetch_array($result1);
$r=$row1['logid'];
	?>
<div style="width:35%; float:right; position:absolute;margin-left:52%;margin-top:8%;z-index:100;">
<img src="images1/b1.jpg" alt="Icon" style="width:130%;height:90%;">
</div>
      
			<div style="width:35%; height:100%; margin-top:0%;  z-index:100; margin-left:10%;">
			<h2 style="color:pink;margin-left:90%; margin-top:4%;">WALLET</h2><br />								
			<form action="#" method="post" enctype="multipart/form-data" name="form1" id="form1">
			<span style="color:pink;"><b>Amount</b></span><span style="color:red;">*</span>:<input type="text" name="amount" id="am" onchange="naa()" required style="z-index:50px; width:120%; height:50px; background-color: white; color:#F59024;" >
			<span style="color:pink;"><b>cvv</b></span><span style="color:red;">*</span>:<input type="text" name="cvv" id="cv" onchange="na2()" required style="z-index:50px; width:120%; height:50px;  color:red; background-color: white; color:#F59024;" >
		<span style="color:pink;"><b>Card no</b></span><span style="color:red;">*</span>:<input type="text" name="cardno" id="cd" onchange="na3()"required style="z-index:50px; width:120%; height:50px;  color:red; background-color: white; color:#F59024;" >
		<span style="color:pink;"><b>Bank</b></span><span style="color:red;">*</span>:<select name="bank"  required style="z-index:50px; width:120%; height:50px; color:red; background-color: white; color:#F59024;">
		<option>select</option>
		<option>SBI</option>
		<option>Canara Bank</option>
		<option>Vijaya Bank</option>
		<option>Axis Bank</option>
		<option>Federal Bank</option>
		</select>
			<span style="color:pink;">Password</span><span style="color:red;">*</span>:<input type="password" name="psw" id="loc" required style="z-index:50px; width:120%; height:50px;  color:red; background-color: white; color:#F59024;" >
		
			
			<table style="width:-5%; margin-left:50%;	28%;margin-top:10%;"><tr><td><button class="btn btn-primary btn-block" name="submit">ADD</button></td></tr></table>	
			</form>			
			</div>
			

		<?php
?>
</div>
</body>
</html>