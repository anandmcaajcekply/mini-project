<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Login form using HTML5 and CSS3</title>
  
  
      		<link rel="stylesheet" href="assets/css/loginstyle.css" />


  
</head>

<body>
  <body>
  <div class="menu">
  <table  style="color: #fff;
						font-size: 2em;
						font-weight: 200;
						font-family: 'Georgia', cursive;" 
						align="center";
						>
			<tr><td><a class="links" style="color: #DC6180;" href="index.html">
			
	HOME&nbsp&nbsp
	</a></td>
	</table>
	</div>
<div class="container">
	<section id="content">
		<form action="adminlog.php" method="post" name="mform">
			<h1>Login</h1>
			<div>
				<input type="text" placeholder="Username" required="" id="username" name="user" />
			</div>
			<div>
				<input type="password" placeholder="Password" required="" id="password" name="pass" />
			</div>
			<div>
				<input type="submit" value="Log in" name="submit" />
				<a href="#">Lost your password?</a>
				<a href="#">Register</a>
			</div>
		</form><!-- form -->
		
	</section><!-- content -->
</div><!-- container -->
</body>
  
    <script src="js/login.js"></script>
	<div class="foot">
	<p
	style="color: #fff;
						font-size: 1em;
						font-weight: 70;
						font-family: 'Passion One', cursive;" 
						align="center";
						><marquee>all the rights belongs to @ anands </marquee></p>
</div>
</body>
</html>
