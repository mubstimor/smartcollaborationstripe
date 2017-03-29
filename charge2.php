<?php 

require_once('vendor/stripe/stripe-php/init.php');

\Stripe\Stripe::setApiKey('sk_test_sJofmAULIyYNFHMKsopEclQG');
$charge = \Stripe\Charge::create(array('amount' => 200, 'currency' => 'usd', 'source' => 'tok_1A2j7ZKfxZabGH9P2EZkOAbQ' ));
echo $charge;


?>