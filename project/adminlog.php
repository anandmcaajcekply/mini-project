<?php
include 'connection.php';
if(isset($_POST['submit']))
{
   
$a=$_POST["user"];
$b=$_POST["pass"];
}

$sql="SELECT * FROM `aminlogin`";
$result=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($result))
{
	$i=$row['loginid'];
    ?>
   
    <?php
    if($a== $row['username']&&$b==$row['password'])
         {
         $_SESSION['username']=$a;
         $_SESSION['password']=$b;
         $_SESSION['id']=$i;         
         $sql1="UPDATE `aminlogin` SET `status`='1' WHERE loginid=$i";
         $result=mysqli_query($con,$sql1);
         header('location:adminhome.php');
		 break;
         }
            
    else{
        echo "<script>if(confirm('Username and Password are incorect!!!!')){document.location.href='adminlogin.php'}else{document.location.href='index.php'};</script>";
         }
         
    ?>   
   
    <?php

}
?> 