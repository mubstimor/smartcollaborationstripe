<?php 

require_once('vendor/stripe/stripe-php/init.php');

\Stripe\Stripe::setApiKey('sk_test_sJofmAULIyYNFHMKsopEclQG');
$charge = \Stripe\Charge::create(array('amount' => 2000, 'currency' => 'usd', 'source' => 'tok_189fqt2eZvKYlo2CTGBeg6Uq' ));
echo $charge;


?>