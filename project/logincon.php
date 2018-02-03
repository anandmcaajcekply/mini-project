<?php
include 'connection.php';
$captcha = $_POST['g-recaptcha-response'];
$secret = "6LfAu0AUAAAAAObhquuG-vTI5a3cxmOoIarCCLLd";
$ip = $_SERVER['REMOTE_ADDR'];
$action = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$captcha&remoteip=$ip");
$result = json_decode($action,TRUE);
if(isset($_POST['submit']))
{
   
$a=$_POST["user"];
$b=$_POST["pass"];
//echo($a);
//echo($b);
}
function decryptIt( $q ) {
    $cryptKey  = 'qJB0rGtIn5UB1xG03efyCp';
    $qDecoded      = rtrim( mcrypt_decrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), base64_decode( $q ), MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ), "\0");
    return( $qDecoded );	
	}
if($result['success']) {

$_SESSION['cnt']=array();
$_SESSION['arc']=0;
$sql="SELECT * FROM `login`";
$result=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($result))
{
	//echo($row['username']);
	//echo($row['password']);
	$i=$row['lid'];
   // $rid=$row['username'];
   //$sql1="SELECT `type_id` FROM `registration` WHERE `reg_id`='$rid'";
   // $result1=mysqli_query($con,$sql1);
   // $row1 = $result1->fetch_assoc();
   // $tpe=$row1["type_id"];   
 //  SELECT `lid`, `username`, `password`, `status`, `role` FROM `login` WHERE 1
    ?>
   
    <?php
	
	//user
	$sq="SELECT * FROM userlogin WHERE userlogin.lid=$i";
	$res=mysqli_query($con,$sq);
	$ar1=mysqli_fetch_array($res);
		$mid1=$ar1['fname'];
		//echo $mid1;
		
	//owner
	
	$sq44="SELECT * FROM staffreg WHERE staffreg.lid=$i";
	$res44=mysqli_query($con,$sq44);
	$ar14=mysqli_fetch_array($res44);
		$mid14=$ar14['name'];
	
	$pw=decryptIt( $row['password'] );
	//echo $pw;
	//user
    if($a== $row['username']&&$b==$pw&&$row['role']==1)
         {
         $_SESSION['username']=$a;
         $_SESSION['password']=$b;
        //$_SESSION['utype']='2';
         $_SESSION['lid']=$i;
        $_SESSION['fname']=$mid1;
         $sql1="UPDATE `login` SET `status`='1' WHERE lid=$i";
         $result=mysqli_query($con,$sql1);
         header('location:userhome.php');
         }
            elseif($a== $row['username']&&$b==$pw&&$row['role']==2)
         {
         $_SESSION['username']=$a;
         $_SESSION['password']=$b;
        //$_SESSION['utype']='2';
         $_SESSION['lid']=$i;
		 $_SESSION['name']=$mid14;
         
         $sql1="UPDATE `login` SET `status`='1' WHERE lid=$i";
         $result=mysqli_query($con,$sql1);
         header('location:theaterhome.php');
         }
		 //admin
		    elseif($a== $row['username']&&$b==$pw&&$row['role']==0)
         {
         $_SESSION['username']=$a;
         $_SESSION['password']=$b;
        //$_SESSION['utype']='2';
         $_SESSION['lid']=$i;
         
         $sql1="UPDATE `login` SET `status`='1' WHERE lid=$i";
         $result=mysqli_query($con,$sql1);
         header('location:adminhome.php');
         }
		//    else($a== $row['username']&&$b==$row['password']&&$row['role']==3)
         //{
         //$_SESSION['username']=$a;
         //$_SESSION['password']=$b;
        //$_SESSION['utype']='2';
         //$_SESSION['lid']=$i;
         
         //$sql1="UPDATE `login` SET `status`='1' WHERE lid=$i";
         //$result=mysqli_query($con,$sql1);
         //header('location:adminhome.php');
         //}
    else{
        echo "<script>if(confirm('Username and Password are incorect!!!!')){document.location.href='login.php'}else{document.location.href='index.php'};</script>";
         }
}
         
    ?>   
   
    <?php

}
else{
	 echo "<script>if(confirm('incorect recaptcha!!!!')){document.location.href='login.php'}else{document.location.href='index.php'};</script>";
    
}

?> 