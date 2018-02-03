<?php
include 'connection.php';
if(!(isset($_SESSION['username'])))
{
header('location:index.php');
}
$sql1="SELECT * from `userlogin`";
$res= mysqli_query($con,$sql1);
$rowcount=mysqli_num_rows($res);
//echo $rowcount;
$sql2="SELECT * from `theaterreg`";
$res2= mysqli_query($con,$sql2);
$rowcount1=mysqli_num_rows($res2);
//echo $rowcount1;
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
.con {
	margin-top:30px;
	margin-left:20px;
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
    background-color: #334;
  height:300px;
  width:95%;
}
.con1 {
	margin-top:100px;
	margin-left:20px;
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
    background-color: #334;
  height:100px;
  width:95%;
}
</style>
<body>
<div class="topnav">
  <a class="active" href="#home">Home</a>
  <a href="toreg.php">Add Owner</a>
  <a href="filmadd.php">Add Film</a>
  <a href="viewfilm.php">View Film</a>
  <a href="adminownerview.php">View Owners</a>
  <a href="addcountry.php">Add Places/ Category</a>
  <a href="admintheaterview.php">View Theater</a>
  <a href="changepass.php">password change</a>
  <div class="dropdown">
  <span>Bank</span>
  <div class="dropdown-content">
  <a href="adminwal.php">Add Bank</a>
   <a href="adminmywal.php">My Wallet</a>
  </div>
</div> 
  <a href="adminlogout.php">Logout</a>
</div>
<div class="con">
<table style="col width="30px">
<tr>
<td><label style="z-index:50px; width:30%; height:120px; background-color: transparent;text-align:center; font-size:50px;color:#F79EE9;"><b>USER</b></label></td>
<td><label style="z-index:50px; width:30%; height:120px; background-color: transparent;text-align:center; font-size:50px;color:#F79EE9;">OWNER</label></td>
<td><label style="z-index:50px; width:30%; height:120px; background-color: transparent;text-align:center; font-size:50px;color:#F79EE9;">THEATER</label></td>
</tr>
<tr>
<td>

<input type="text" name="t" value="<?php echo $rowcount ?>" style="z-index:50px; width:30%; height:120px; background-color: white;text-align:center; font-size:100px;color:#F59024;" readonly></td>
<td>
<input type="text" name="N" value="<?php echo $rowcount1 ?>" style="z-index:50px; width:30%; height:120px; background-color: white;text-align:center; font-size:100px;color:#F59024;" readonly></td>
<td>
<input type="text" name="L" value="<?php echo $rowcount1 ?>" style="z-index:50px; width:30%; height:120px; background-color: white;text-align:center; font-size:100px;color:#F59024;" readonly></td>
</tr>
</table>
</div>
<div class ="con1">
<label style="z-index:50px; width:30%; height:120px; background-color: transparent;text-align:center; font-size:50px;color:#F79EE9;"><b></i>Website Usage</i></b></label></td>
</div>
</body>
</html>