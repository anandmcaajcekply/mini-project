<?php
include 'connection.php';

$sql="SELECT * FROM `teaser` ORDER by tid DESC";
$re=mysqli_query($con,$sql);
$row11=mysqli_fetch_array($re);
$str=$row11['video'];
//$str="dd.mp4";
$str1 = substr($str, 0, strpos($str, '.'));
//echo $str1;
?>
<!DOCTYPE HTML>

<html>
<style>
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
	margin-left:40%;
}

li {
    float: left;
}

li a, .dropbtn {
    display: inline-block;
    color: white;
	font-size: 120%;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

li a:hover, .dropdown:hover .dropbtn {
    background-color: #29e209;
}

li.dropdown {
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: black;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content a {
   
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    text-align: left;
}

.dropdown-content a:hover {background-color: #29e209}

.dropdown:hover .dropdown-content {
    display: block;
}
</style>
	<head>

		<title>Full Motion</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main1.css" />
		<style type="text/css">

}

</style>
	</head>
	<body id="top">

			<!-- Banner -->
			
				<!--<section id="banner" data-video="<?php echo $str1;?>"> -->
				<section id="banner" data-video="images1/baa11">
				
					<div class="inner" style="z-index:3;position:relative;">
						<header>
							<img src="images1/universal.png" alt="Icon" style="width:128px;height:128px;">
							<h1 ><b>UNIVERSAL</b></h1>

							<p>From where it happens, we see it happen.</p>
							<h3><?php
							include 'googletrans.php';
							?></h3>
						</header>
						
<ul>
  <li><a href="#home">Home</a></li>
  <li><a href="regsample.php">Sign up</a></li>
  <li><a href="login.php">Log in</a></li>
  <!--<li class="dropdown">
    <a href="" class="dropbtn">Login</a>
    <div class="dropdown-content">
      <a href="login.php">User login</a>
      <a href="theaterownerlogin.php">theterOwner</br>Staff login</a>
      <a href="adminlogin.php">Admin Login</a>
    </div>
  </li> -->
</ul>
</div>
					</section>
						<!--<a href="#main" class="more">Learn More</a>-->
					</div>
				</section>

			<!-- Main -->
			<!--<div id="loginScreen">
			    <a href="#" class="cancel">&times;</a>
			</div>
			<div id="cover" >
			</div>-->


		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
		<!--	<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/jquery.poptrox.min.js"></script>-->
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>
