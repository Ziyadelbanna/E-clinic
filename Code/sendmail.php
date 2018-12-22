<?php
$to = 'kamalhabieb@gmail.com';
$subject = 'Hello from XAMPP!';
$message = 'This is a test';
$headers = "From: kamalhabieb@gmail.com";
if (mail($to, $subject, $message, $headers)) {
   echo "SUCCESS";
} else {
   echo "ERROR";
}