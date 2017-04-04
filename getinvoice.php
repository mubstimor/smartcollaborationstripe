<?php

$my_stripe_key = getenv('STRIPE_KEY');

\Stripe\Stripe::setApiKey($my_stripe_key);

\Stripe\Invoice::create(array(
    "customer" => "cus_APk7l3Gz4Hk5QY"
));

 ?>