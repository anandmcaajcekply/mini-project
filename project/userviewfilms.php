<?php
include 'connection.php';
if(!(isset($_SESSION['username'])))
{
header('location:index.php');
}
$q=$_SESSION['username'];
//echo $q;
?>
<html>
<head>
<link rel="stylesheet" href="public/css/bootstrap.min.css">
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

// display design
div.heading{
background-color:black;
text_align:center;
width:100%;
height:140px;
border:2px solid black;
color:white;
}
div.form1
{
position:absolute;
width:70%;
margin-top:100px;
border:2px;
}
table td {
    padding: 10px;
	font-weight:bold;
	
}
th {
    padding: 10px;
	font-weight:bold;
	color:white;
}
table {
    border-spacing: 10px;
}
div.view
{
	position:absolute;
	margin-top:10%;
	margin-left:10px;
	
}
#bgVideo{ 
    position: absolute;
    top: 0;
    left: 0px;
    border: 0;
	width:120%;
	
    z-index: -2;
    background-size: cover;
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
.button {
    background-color: #4CAF50; /* Green */
    border: none;
	border-radius: 15px;
	box-shadow: 0 9px #999;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
}
.button2:hover {
    box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
} 
</style>
</head>
<body>
<div class="topnav">
  <a class="active" href="userhome.php">Home</a>
  <a href="profileview.php">Profile</a>
  <a href="userviewfilms.php">Book My Show </a>
  <a href="userviewfilms.php">View films </a>
  <a href="newrelease.php">New Release </a>
  <a href="upcomming.php">Upcoming </a>
  <a href="userchangepass.php">Change Password</a>
  <div class="dropdown">
  <span>Bank</span>
  <div class="dropdown-content">
  <a href="wal.php">Add bank</a>
  <a href="mywallet.php">view my Wallet</a>
  </div>
  </div>
  <a href="logout.php">Logout</a>
  <?php $mid=$_SESSION['fname'];?>
  <p style="color:white; margin-left:85%;">hai...!!!<?php echo $mid;?></p>

</div>
<video id="bgVideo" autoplay loop="videos/poster.mp4">
    <source src="images1/ultra.mp4" type="video/mp4"/>
    <!--<source src="videos/test-640x368-webmvp8-miro.webm" type="video/webm"/> -->
    <!--<source src="videos/test-640x368-theora-miro.ogv" type="video/ogg"/>    -->
</video>
<h2 style="margin-left:45%; color:white;"> select location</h2>
<form name="myform" action="#" method="post">
<select name="loc" style="margin-left:45%; color:black;">
<option value=0>Location</option>
  <option value="mundakayam">mundakayam</option>
  <option value="kanjirapally">kanjirappally</option>
  <option value="kottayam">kottayam</option>
  <option value="kattappana">kattappana</option>
</select>
<input type="submit"class="button button2" name="submit1"  value="veiw">
</form>
<div class="view" style="float:left; margin-left:40%;">
<table border=5px style="width:10px; margin-left:0%; margin-top:-10%;">
<tr></tr>
<?php
if(isset($_POST['submit1']))
    { 
$sl=$_POST['loc'];
//echo($sl);
		?>
<?php 
//$tid=$_SESSION['id'];
$sql="select * from filmadd,theaterreg,theatershowadd where filmadd.filmid=theatershowadd.filmid and theatershowadd.theaterids=theaterreg.theaterid and theaterreg.location='$sl' and theatershowadd.status='0'";
$result=mysqli_query($con,$sql);

$i=0;
while($row=mysqli_fetch_array($result))
{
	?>
	
	<tr>	
	<form name="myform" action="demo.php" method="post">
	<th>THEATER</th>
	<td><input type="text" name="Name" value="<?php echo $row['tname']?>"readonly></td>
	</tr>
	<tr>
	<th>PICTURE</th>
	<td><img src="<?php echo $row['filmpic']?>" width=50 height=50 ></td>
	</tr>
	<tr>
	<th>TITLE</th>
	<td><input type="text" name="Name" value="<?php echo $row['filmname']?>"readonly></td></tr>
	<tr>
	<th>ACTOR</th>
	<td><input type="text" name="Actor" value="<?php echo $row['actor']?>"readonly></td></tr>
	<tr>
	<th>ACTRESS</th>
	<td><input type="text" name="Actress" value="<?php echo $row['actress']?>"readonly></td></tr>
	<tr>
	<th>PRODUCER</th>
	<td><input type="text" name="Producer" value="<?php echo $row['producer']?>"readonly></td></tr>
	<tr>
	<th>CATEGORY</th>
	<td><input type="text" name="Cat" value="<?php echo $row['category']?>"readonly></td></tr>
	<tr>
	<th>LANGUAGE</th>
	<td><input type="text" name="Language" value="<?php echo $row['language']?>"readonly></td></tr>
	<input type="hidden" name="sid" value="<?php echo $row['theaterid']?>"/>
	<tr><td><span><input type="submit" name="submit"  value="book"></span></td>
	<!--  <td><input type="button" name="delete" value="Delete"></td> -->
	</tr>
	</form>
	<?php
}
}
?>
</table>

</div>

</body>
<script src="public/js/bootstrap.min.js">
</html>