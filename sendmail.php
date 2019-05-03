<?php
$to_email = 'sawanon01@hotmail.com';
$subject = 'Testing PHP Mail';
$message = 'This mail is sent using the PHP mail function';
$headers = 'From: sawanon01@hotmail.com';
mail($to_email,$subject,$message,$headers);
?>
