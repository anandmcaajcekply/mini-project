<?php
include 'connection.php';
if(!(isset($_SESSION['username'])))
{
header('location:index.php');
}
?>
<html>
<head>
<script src="reg.js"></script>
<link rel="stylesheet" href="filmadd.css" />
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
  <a class="active" href="adminhome.php">Home</a>
  <a href="toreg.php">Add Owner</a>
  <a href="filmadd.php">Add Film</a>
  <a href="viewfilm.php">View Film</a>
  <a href="adminownerview.php">View Owners</a>
  <a href="admintheaterview.php">View Theater</a>
  <a href="changepass.php">password change</a>
  <a href="adminlogout.php">Logout</a>
</div>
<?php
	if(isset($_POST['submit']))
    {   
		
		$b=$_POST["place"];
		echo $b;
		$sql1="SELECT * FROM `addplace` where `pname`='$b'";
		$result1=mysqli_query($con,$sql1);
	   $row=mysqli_fetch_array($result1);
	   if($row['pname']=="")
	   {
		   $sql="INSERT INTO `addplace`(`pname`) VALUES('$b')";
		$result=mysqli_query($con,$sql);
	   }
	   else
	   {
		   echo "<script>if(confirm('place already exists!!!!')){document.location.href='#'}else{document.location.href='#'};</script>";
       
	   }
		
	}
	if(isset($_POST['submit1']))
    {   
		
		$c=$_POST["cat"];
		echo $c;
		$sql3="SELECT * FROM `addcat` where `catname`='$c'";
		$result3=mysqli_query($con,$sql3);
	   $row3=mysqli_fetch_array($result3);
	   if($row3['catname']=="")
	   {
		$sql2="INSERT INTO `addcat`(`catname`) VALUES('$c')";
		$result2=mysqli_query($con,$sql2);
	   }
		else
	   {
		   echo "<script>if(confirm('category already exists!!!!')){document.location.href='#'}else{document.location.href='#'};</script>";
       
	   }
	}
	if(isset($_POST['submit2']))
    {   
		
		$l=$_POST["lang"];
		echo $l;
		$sql4="SELECT * FROM `addlang` where `lang`='$l'";
		$result4=mysqli_query($con,$sql4);
	   $row4=mysqli_fetch_array($result4);
	   if($row4['lang']=="")
	   {
		$sql2="INSERT INTO `addlang`(`lang`) VALUES('$l')";
		$result2=mysqli_query($con,$sql2);
	   }
		else
	   {
		   echo "<script>if(confirm('category already exists!!!!')){document.location.href='#'}else{document.location.href='#'};</script>";
       
	   }
	}
	if(isset($_POST['submit3']))
    {   
		
		$bb=$_POST["bankname"];
		echo $bb;
		$sql5="SELECT * FROM `addbankname` where `bname`='$bb'";
		$result5=mysqli_query($con,$sql5);
	   $row5=mysqli_fetch_array($result5);
	   if($row5['bname']=="")
	   {
		$sql6="INSERT INTO `addbankname`(`bname`) VALUES('$bb')";
		$result6=mysqli_query($con,$sql6);
	   }
		else
	   {
		   echo "<script>if(confirm('bankname already exists!!!!')){document.location.href='#'}else{document.location.href='#'};</script>";
       
	   }
	}
	if(isset($_POST['submit4']))
    {   
		$path= "images1/".$_FILES['fileupload']['name'];
		echo($path);
        copy($_FILES['fileupload']['name'], $path);
		$sql8="INSERT INTO `teaser`(`video`) VALUES('$path')";
		$result8=mysqli_query($con,$sql8);
		}
	?>
<form name="treg" id="msform" method="post" action="#" enctype="multipart/form-data">
    <fieldset>
  <table  style="align:center">
    <tr><th style="align:center;"><h2 class="fs-title">ADD PLACES</h2></th></tr>
	
	<!--<tr style="align:center;"><td>Personal Details</td></tr>-->
	<tr><td><input type="text" name="place" placeholder="Place" /></td>
    <tr><td><input type="submit" name="submit" class="submit action-button" value="Add Place" /></td>
	</tr>
	
	</table>
	</fieldset>
</form>
<form name="place" id="msform" method="post" action="#" enctype="multipart/form-data">
    <fieldset>
  <table  style="align:center">
    <tr><th style="align:center;"><h2 class="fs-title">ADD CATEGORY</h2></th></tr>
	
	<!--<tr style="align:center;"><td>Personal Details</td></tr>-->
	<tr><td><input type="text" name="cat" placeholder="CATEGORY" required /></td>
    <tr><td><input type="submit" name="submit1" class="submit action-button" value="Add category" /></td>
	</tr>
	
	</table>
	</fieldset>
</form>
<form name="language" id="msform" method="post" action="#" enctype="multipart/form-data">
    <fieldset>
  <table  style="align:center">
    <tr><th style="align:center;"><h2 class="fs-title">ADD Language</h2></th></tr>
	
	<!--<tr style="align:center;"><td>Personal Details</td></tr>-->
	<tr><td><input type="text" name="lang" placeholder="LANGUAGE" required/></td>
    <tr><td><input type="submit" name="submit2" class="submit action-button" value="Add Language" /></td>
	</tr>
	
	</table>
	</fieldset>
</form>
<form name="bank" id="msform" method="post" action="#" enctype="multipart/form-data">
    <fieldset>
  <table  style="align:center">
    <tr><th style="align:center;"><h2 class="fs-title">ADD BANK NAME</h2></th></tr>
	
	<!--<tr style="align:center;"><td>Personal Details</td></tr>-->
	<tr><td><input type="text" name="bankname" placeholder="BANK NAME" required/></td>
    <tr><td><input type="submit" name="submit3" class="submit action-button" value="Add Bank Name" /></td>
	</tr>
	
	</table>
	</fieldset>
</form>
</form>
<form name="bank" id="msform" method="post" action="#" enctype="multipart/form-data">
    <fieldset>
  <table  style="align:center">
    <tr><th style="align:center;"><h2 class="fs-title">ADD Teaser</h2></th></tr>
	
	<!--<tr style="align:center;"><td>Personal Details</td></tr>-->
	<tr><td><input type="file" name="fileupload" size="70"/></td></tr>
    <tr><td><input type="submit" name="submit4" class="submit action-button" value="Add Video" /></td>
	</tr>
	
	</table>
	</fieldset>
</form>
</body>
</html>