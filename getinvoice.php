<?php

$my_stripe_key = getenv('STRIPE_KEY');

\Stripe\Stripe::setApiKey($my_stripe_key);

$invoice = \Stripe\Invoice::create(array("customer" => "cus_APk7l3Gz4Hk5QY"));

if ($invoice->id == true) {
        //$response['status'] = "Success";
        // $response['message'] = "Payment has been charged!!";
        echo "amount due ".$invoice->amount_due;
     }else{
        echo "invoice not created";
     }

 ?>