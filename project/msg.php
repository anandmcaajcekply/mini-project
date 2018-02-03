<?php
$to = "anand.siva31@gmail.com";
$subject = "My subject";
$txt = "Hello world!";
$headers = "From: anands@mca.ajce.in" . "\r\n" .
"CC: somebodyelse@example.com";

mail($to,$subject,$txt,$headers);
?> 