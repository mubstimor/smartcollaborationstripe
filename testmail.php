<?php 
require 'vendor/autoload.php';

error_reporting(1);


 //mail("mubstimor@gmail.com", "Stripe Hook", "hook called ");

 // If you are not using Composer
require("vendor/sendgrid/sendgrid/SendGrid.php");
$from = new \SendGrid\Email("Example User", "example@gmail.com");

echo "testing mail page ".$from;

$subject = "Sending with SendGrid is Fun";
$to = new \SendGrid\Email("Example User", "mubstimor@gmail.com");
$content = new \SendGrid\Content("text/plain", "and easy to do anywhere, even with PHP");
$mail = new \SendGrid\Mail($from, $subject, $to, $content);
$apiKey = getenv('SENDGRID_API_KEY');
$sg = new \SendGrid($apiKey);
$response = $sg->client->mail()->send()->post($mail);
echo $response->statusCode();
echo $response->headers();
echo $response->body();

?>