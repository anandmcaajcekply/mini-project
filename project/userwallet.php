<?php   
include 'dbcon.php';

//$tp=$_SESSION['utype'];
if(!(isset($_SESSION['user_name']))||$tp!=2)
{	
 //header('location:index.php');
}
if(isset($_POST['submit']))
{
	$lid=$_SESSION['id'];
$amount=$_POST['amount'];
$cvv=$_POST['cvv'];
$cardno=$_POST['cardno'];
$bank=$_POST['bank'];
$psw=$_POST['psw'];
//INSERT INTO `wallet`(`w_id`, `logid`, `w_acc_no`, `cvv`, `bank_name`, `balance`, `status`) 
//VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7])
$sql="INSERT INTO `wallet`(`logid`, `w_acc_no`, `cvv`, `bank_name`, `balance`, `w_passwd`, `status`) VALUES ('$lid', '$cardno', '$cvv', '$bank', '$amount', '$psw','0')";
$result=mysqli_query($con,$sql);
header("location:userwallet.php");
}
if(isset($_POST['submit1']))
{
	$lid=$_SESSION['id'];
$amount=$_POST['amount'];
$sql4="SELECT * FROM `wallet` WHERE `logid`='$lid'";
$result4=mysqli_query($con,$sql4);
$row4=mysqli_fetch_array($result4);
$r1=$row4['balance'];
$ttl=$r1+$amount;
$sql5="UPDATE `wallet` SET `balance`='$ttl' WHERE `logid`='$lid'";
$result5=mysqli_query($con,$sql5);
header("location:userwallet.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<meta charset="utf-8">
<head>
     <link rel="icon" type="image/x-icon" href="images/logoicon.png"/>
     <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false&libraries=places"></script>
     </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB1ypVDGm8lr-4DB9Rk-c2YJXq1ormSRIs&callback=initMap"
    async defer></script>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>TaxiGo</title>
	<!--Fonts-->
	<link href="css/style2.css" rel="stylesheet">
	<link href="css/style3.css" rel="stylesheet">
	<!--Bootstrap-->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-theme.min.css">
	<!--Font Awesome-->
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<!--Simple Line Icons-->
	<link rel="stylesheet" href="css/ionicons.min.css">
	<!--Owl Carousel-->
	<link rel="stylesheet" href="vendors/owl.carousel/owl.carousel.css">
	<!--Select-->
	<link rel="stylesheet" href="vendors/bootstrap-select/css/bootstrap-select.css">
	<!--Theme Styles-->
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/theme.css">
	<!--datepick-->
	<link href="dcalendar.picker.css" rel="stylesheet" type="text/css">
    <link href="../../css/jquerysctipttop.css" rel="stylesheet" type="text/css">
	
	<link rel="stylesheet" href="css/jquery-ui.css">
<script src="js/jquery-1.9.1.js"></script>
<script src="js/jquery-ui.js"></script>
<script src="http://malsup.github.com/jquery.form.js"></script>
	<style>
  .divv2
{
background:url("images/slide.jpg");
padding:28%;
//border:2px solid red;
}
  .div0
{
//padding:5%;
margin-top:-7%;
margin-left:95%;
width:20%;
height:20%;

}
  table{
  margin-left:50%;
  }
  th, td {
    padding: 2px;
}
  </style>
	
</head>
<body onload="GetRoute()">

<section class="row top-bar">
		<h2 class="hd-sec">Heading</h2>
		<div class="container">
			<div class="welcome-texts"><span class="welcome-text">Welcome to</span><span>TaxiGo!</span></div>
			<ul class="social-lists-wSearch nav nav-pills">
				<li class="search-pop"><a href="#"><span class="ion-ios-search-strong"></span></a></li>
				<li><a href="#"><i class="ion-social-facebook"></i></a></li>
				<li><a href="#"><i class="ion-social-twitter"></i></a></li>
				<li><a href="#"><i class="ion-social-googleplus"></i></a></li>
				<li><a href="#"><i class="ion-social-linkedin-outline"></i></a></li>
				<li><a href="#"><i class="ion-social-rss"></i></a></li>
			</ul>
		</div>
</section>
	
<!--Info Bar-->

<section class="row info-bar">
	<div class="container">
		<div class="row">
			<div class="col-sm-3 col-xs-8 logo-box">
				<a href="index-2.html" class="logo"><img src="images/logo.png" alt=""></a>
			</div>
			<div class="col-sm-9 col-xs-4 info-box">
				<div class="header-informations hidden-xs">
					<div class="media info-media">
						<div class="media-left"><i class="ion-location"></i></div>
						<div class="media-body">
							<h5 class="this-top">3588 N  koovappally, Kerala,</h5>
							<h5 class="this-bottom">india.</h5>
						</div>
					</div>
					<div class="media info-media">
						<div class="media-left"><i class="ion-ios-telephone"></i></div>
						<div class="media-body">
							<h5 class="this-top">+91-8281306327</h5>
							<h5 class="this-bottom">akhilmjoy8@gmail.com</h5>
						</div>
					</div>
					<div class="media info-media">
						<div class="media-left"><i class="ion-ios-clock"></i></div>
						<div class="media-body">
							<h5 class="this-top"id="mo"></h5>
							<h5 class="this-bottom" id="time"></h5>
						</div>
					</div>
					<div class="div0">
						<?php
						$d=$_SESSION['rid'];
						$sql="SELECT * FROM `registration` WHERE `reg_id`=$d";
                         $result=mysqli_query($con,$sql);
						 $row=mysqli_fetch_array($result)
						 ?>
						 
							<a href="userprofv.php"><img src="<?php echo $row['photo']?>" width=70 height=70 style="border-radius:50px;" ></a>
							<p style="color:white;"><?php echo $row['emailid']?></p>
						</div>
					<script>
						var d = new Date();
						var month = new Array();
						month[0] = "January";
						month[1] = "February";
						month[2] = "March";
						month[3] = "April";
						month[4] = "May";
						month[5] = "June";
						month[6] = "July";
						month[7] = "August";
						month[8] = "September";
						month[9] = "October";
						month[10] = "November";
						month[11] = "December";
						var n = month[d.getMonth()];
						var c =d.getDate();
						var t = d.getTime();var dateObj = new Date();
						var month = dateObj.getUTCMonth() + 1;
						var day = dateObj.getUTCDate();
						var year = dateObj.getUTCFullYear();
						
						var d = new Date(); // for now
							var h = d.getHours(); 
							var m=d.getMinutes(); 
							var s=d.getSeconds();
						time=h + ":" +m + ":" + s;
						newdate = day + "/" + n + "/" + year;
						
						document.getElementById("mo").innerHTML = newdate;
						
						document.getElementById("time").innerHTML = time;
										
						
						</script>
				</div>
				
			</div>
		</div>
	</div>
</section>
<!--Navigation-->
<nav class="navbar navbar-default main-navigation navbar-static-top">
	<div class="container">
		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="main-nav">				
			<ul class="nav navbar-nav">
				
				<li><a href="userhome.php">home</a></li>					
				<li><a href="#">about</a></li>
				<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Bookking<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="fleet.php">car</a></li>
							<li><a href="fleet.php">tempo</a></li>
						</ul>
				</li>
						
				<li><a href="#">contact</a></li>
				
				<li><a href="logout.php">Logout</a></li>
			</ul>			
		</div><!-- /.navbar-collapse -->
	</div><!-- /.container-fluid -->
</nav> 
<!--Home 1 Slide Banner-->
<div class="divv2" style="margin-top:-10%;">
<?php
$lid=$_SESSION['id'];
//INSERT INTO `wallet`(`w_id`, `logid`, `w_acc_no`, `cvv`, `bank_name`, `balance`, `status`) VALUES
$sql1="SELECT * FROM `wallet` WHERE `logid`='$lid'";
$result1=mysqli_query($con,$sql1);
$row1=mysqli_fetch_array($result1);
$r=$row1['logid'];
if($row1['logid']=="")
{
	?>

      
			<div style="width:50%; height:100%; margin-top:-25%;  z-index:100; margin-left:10%;">
			<h3 style="color:pink;margin-left:20%; margin-top:-2%;">WALLET</h3><br />								
			<form action="#" method="post" enctype="multipart/form-data" name="form1" id="form1">
			<span style="color:white;">amount</span><span style="color:red;">*</span>:<input type="text" name="amount" id="loc" required style="z-index:50px; width:120%; height:70px; background-color: transparent; color:#F59024;" >
			<span style="color:white;">cvv</span><span style="color:red;">*</span>:<input type="text" name="cvv" id="loc" required style="z-index:50px; width:120%; height:70px;  color:red; background-color: transparent; color:#F59024;" >
		<span style="color:white;">card no</span><span style="color:red;">*</span>:<input type="text" name="cardno" id="loc" required style="z-index:50px; width:120%; height:70px;  color:red; background-color: transparent; color:#F59024;" >
		<span style="color:white;">bank</span><span style="color:red;">*</span>:<select name="bank"  required style="z-index:50px; width:120%; height:70px; color:red; background-color: transparent; color:#F59024;">
		<option>select</option>
		<option>SBI</option>
		<option>Canara Bank</option>
		<option>Vijaya Bank</option>
		<option>Axis Bank</option>
		<option>Federal Bank</option>
		</select>
			<span style="color:white;">Password</span><span style="color:red;">*</span>:<input type="password" name="psw" id="loc" required style="z-index:50px; width:120%; height:70px;  color:red; background-color: transparent; color:#F59024;" >
		
			
			<table style="width:-5%; margin-left:50%;	28%;margin-top:10%;"><tr><td><button class="btn btn-primary btn-block" name="submit">ADD>></button></td></tr></table>	
			</form>			
			</div>
			

		<?php
}
else
{
?>
	<div style="width:50%; height:100%; margin-top:-25%;  z-index:100; margin-left:10%;">
			<h3 style="color:pink;margin-left:20%; margin-top:-2%;">WALLET</h3><br />								
			<form action="#" method="post" enctype="multipart/form-data" name="form1" id="form1">
			<span style="color:white;">amount</span><span style="color:red;">*</span>:<input type="text" name="amount" id="loc" required style="z-index:50px; width:120%; height:70px; background-color: transparent; color:#F59024;" >
			
			
			
			<table style="width:-5%; margin-left:50%;	28%;margin-top:10%;"><tr><td><button class="btn btn-primary btn-block" name="submit1">ADD>></button></td></tr></table>	
			</form>			
			</div>
			<?php
			$sql3="SELECT * FROM `wallet` WHERE `logid`='$lid'";
			$result3=mysqli_query($con,$sql3);
			$row3=mysqli_fetch_array($result3);
			$r1=$row3['balance'];
?>
		

		 <div id="blance" style="margin-left:100%; margin-top:-25%; ">
		<span style="color:white;"><h1>Balance=<?php echo $r1 ?></h1></span>
		 </div>
		 <?php
}
?>
</div>


	
 

<section class="row testimonial-row">
	<div class="container">   			
		<div class="row section-title text-center">
			<h6 class="this-top">SO MANY CHOICE</h6>
			<h2 class="h1 this-main">A Car for Every Need!</h2>
		</div>

		<div class="row">
			<div class="testimonial-carousel">
				<div class="item testimonial">
					<div class="inner row m0">
						<p>“PUKDG is my favorite booking car company ever! <span>Cool drivers</span> , amazing cars, top notch services! You won't believe it, but they actually didn't took any tip :) Reading more at link”</p>
						<span class="stars">
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
						</span>
						<h5 class="client">Diego Furlan <small>- Sandiago/29 ages</small></h5>
						<a href="#" class="client-img"><img src="images/testimonial/2.jpg" alt="" class="img-circle"></a>
					</div>
				</div>
			</div>   				
		</div>

	</div>
</section>
		
<footer class="row site-footer">
<div class="top-footer row m0">
<div class="container">
	<div class="row ft">
		<!--Widget-->
		<div class="col-sm-12 col-md-3 widget footer-widget widget-about">
			<a href="#" class="foot-logo"><img src="images/logo.png" alt=""></a>
			<p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, <strong>vel illum dolore eu feugiat nulla facilisis</strong>.</p>
			<p>At vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum.</p>
			<ul class="nav nav-pills social-nav">
				<li><a href="#" class="ion-social-facebook" data-toggle="tooltip" data-placement="top" title="Facbook"></a></li>
				<li><a href="#" class="ion-social-twitter" data-toggle="tooltip" data-placement="top" title="Twitter"></a></li>
				<li><a href="#" class="ion-social-googleplus" data-toggle="tooltip" data-placement="top" title="Google Plus"></a></li>
				<li><a href="#" class="ion-social-linkedin" data-toggle="tooltip" data-placement="top" title="Linkedin"></a></li>
				<li><a href="#" class="ion-social-tumblr" data-toggle="tooltip" data-placement="top" title="Tumblr"></a></li>
			</ul>
		</div>
		<!--Widget-->
		<div class="col-sm-12 col-md-3 widget footer-widget widget-contact-info">
			<h4 class="widget-title">CONTACT INFO</h4>
			<ul class="nav foot-nav">
				<li><i class="ion-location"></i>3588 N  Stelling road, Brooklyn, NYC, United State.</li>
				<li><i class="ion-ios-telephone"></i>1800 - 112 - 8888/ EXT: 001</li>
				<li><i class="ion-email-unread"></i><a href="mailto:SuperHire@support.com.xxx">SuperHire@support.com.xxx</a></li>
			</ul>
			<div id="foot-map" class="google-map" data-lat="23.8932752" data-lon="90.3822415" data-marker="images/map-marker.png"></div>
		</div>
		<!--Widget-->
		<div class="col-sm-12 col-md-2 widget footer-widget widget-links">
			<h4 class="widget-title">Usefull link</h4>
			<ul class="nav foot-nav style2">
				<li><i class="fa fa-angle-double-right"></i><a href="#">FAQs</a></li>
				<li><i class="fa fa-angle-double-right"></i><a href="#">Contact</a></li>
				<li><i class="fa fa-angle-double-right"></i><a href="#">About</a></li>
				<li><i class="fa fa-angle-double-right"></i><a href="#">Membership</a></li>
				<li><i class="fa fa-angle-double-right"></i><a href="#">Exchange accepted</a></li>
				<li><i class="fa fa-angle-double-right"></i><a href="#">Help</a></li>
				<li><i class="fa fa-angle-double-right"></i><a href="#">Other</a></li>
			</ul>
		</div>
		<!--Widget-->
		<div class="col-sm-12 col-md-4 widget footer-widget widget-contact">
			<h4 class="widget-title">CONTACT &amp; SUBCRIBE US</h4>
			<div class="row m0 contact-form-info">
				<form action="http://haintheme.com/demo/html/supershine/contact_process.php" class="foot-contct-form contactForm row m0">
					<div class="input-group">
						<input type="text" name="name" id="name" class="form-control" placeholder="Your name">
						<span class="input-group-addon"><i class="ion-person"></i></span>
					</div>
					<div class="input-group">
						<input type="email" name="email" id="email" class="form-control" placeholder="Enter your email">
						<span class="input-group-addon"><i class="ion-email-unread"></i></span>
					</div>
					<div class="input-group">
						<textarea name="message" id="message" class="form-control" placeholder="Your messages"></textarea>
						<span class="input-group-addon"><i class="ion-android-chat"></i></span>
					</div>
					<div class="row m0">
						<input type="checkbox" name="subscribe" id="subscribe" class="sr-only  contact-checkbox">
						<label for="subscribe">Also subscribe to your e-mail *</label>
					</div>
					<input type="submit" value="SEND MESSENGE" class="btn btn-primary">
					<div class="foot-msg"><span>(*)</span> : We never spam your email</div>
				</form>
				<div id="success"><span>Your message sent successfully.</span></div>
				<div id="error"><span>Something wrong here!.</span></div>
			</div>
		</div>
	</div>
</div>
</div>
			
<div class="bottom-footer row m0">
	<div class="container">
		<div class="row">
			Copyright © 2017 by <a href="#">Haintheme</a>. Designed by <a href="#">PukDG</a>. All rights reserved!
		</div>
	</div>
</div>
</footer>
<script src="js/jquery-2.1.4.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<!--Contact-->    
		<script src="js/jquery.form.js"></script>
		<script src="js/jquery.validate.min.js"></script>
		<script src="js/contact.js"></script>
		<!--Owl Carousel-->
		<script src="vendors/owl.carousel/owl.carousel.min.js"></script>
		<!--CounterUp-->
		<script src="vendors/couterup/jquery.counterup.min.js"></script>
		<!--WayPoints-->
		<script src="vendors/waypoint/waypoints.min.js"></script>
		<!--Select-->
		<script src="vendors/bootstrap-select/js/bootstrap-select.min.js"></script>
		<!--Instafeed-->
		<script src="vendors/instafeed/instafeed.min.js"></script>
		<!-- Isotope -->
		<script src="vendors/imagesloaded/imagesloaded.pkgd.min.js"></script>
		<script src="vendors/isotope/isotope.min.js"></script>
		<!--Theme Script-->    
		<script src="js/theme.js"></script>
</body>
	
	
<!-- Mirrored from haintheme.com/demo/html/supershine/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 10 Aug 2017 14:42:02 GMT -->
</html>