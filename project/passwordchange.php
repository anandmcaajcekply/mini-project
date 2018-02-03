<?php
    include 'conn.php';
    if(isset($_POST['gl_fp_email_check']))
    {   
        $email1=htmlspecialchars($_POST['gl_fp_email']);
        echo $email1;
        $sql1=mysqli_query($con,"SELECT  * FROM `user` where email='$email1'");
        if($row= mysqli_fetch_array($sql1)){
                    $mail=$row['email'];
                    $uname=$row['uname'];
                    $sql2=mysqli_query($con,"SELECT  * FROM `login` where uname='$uname'");
                    $row2= mysqli_fetch_array($sql2);
                    $pw=$row2['password'];
                    if($email1==$mail){
                        $subject = "Global Store Password Reset";
                        $message ="<html>
                            <head>
                            <title>User registeration</title>
                            </head>
                            <body>
                            <p>Your Username and Password is GIven Below</p>
                            <table>
                            <tr>
                            <th>User Id</th>
                            <th>Password</th>
                            </tr>
                            <tr>
                            <td>'$uname'</td>
                            <td>'$pw'</td>
                            </tr>
                            </table>
                            </body>
                            </html>";
                            $headers = "MIME-Version: 1.0" . "\r\n";
                            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                            $headers .= 'From: <jibinbaby@mca.ajce.in>' . "\r\n";
                            $headers .= 'Cc: jibinbaby@mca.ajce.in' . "\r\n";
                            mail($mail,$subject,$message,$headers);
                            echo "<script> alert('Password has been Sent to Your Mail ID')</script>";
                    }
        }
        else{
            echo "<script> alert('Invalid Email')</script>";
        }
    }
?>

<html>
    <body>
    <form name='gl_fp_form' method='post' action="#">
        <input type="email" name="gl_fp_email" placeholder="Enter Email" />
        <br/>
        <center><input type="submit" class="gl_fp_email_check" name="gl_fp_email_check" value="GO"></center>
    </form>
    </body>
</html>