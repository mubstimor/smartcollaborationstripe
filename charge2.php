<?php 

require_once('vendor/stripe/stripe-php/init.php');

\Stripe\Stripe::setApiKey('sk_test_sJofmAULIyYNFHMKsopEclQG');

try {
$charge = \Stripe\Charge::create(array('amount' => 200, 'currency' => 'gbp', 'source' => 'tok_1A2jL2KfxZabGH9PE2eVAtIj', 'description' => 'testing on ch2' ));

  // Check that it was paid:
    if ($charge->paid == true) {
        $response = array( 'status'=> 'Success', 'message'=>'Payment has been charged!!' );
     } else { // Charge was not paid!
        $response = array( 'status'=> 'Failure', 'message'=>'Your payment could NOT be processed because the payment system rejected the transaction. You can try again or use another card.' );
    }

 header('Content-Type: application/json');
 echo json_encode($response);
}
catch(\Stripe\Error\Card $e) {
 // The card has been declined
header('Content-Type: application/json');
 echo json_encode($response);
}
catch(\Stripe\Error\Authentication $e){
    echo "invalid api key";
    header('Content-Type: application/json');
 echo json_encode($response);
}
catch(\Stripe\Error\InvalidRequest $e){
    echo "invalid request ".$e;
    header('Content-Type: application/json');
 echo json_encode($response);
}


//echo $charge;


?>