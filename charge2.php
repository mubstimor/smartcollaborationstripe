<?php 

require_once('vendor/stripe/stripe-php/init.php');

// array for JSON response
$response = array();

\Stripe\Stripe::setApiKey('sk_test_sJofmAULIyYNFHMKsopEclQG');



try {
    $token = $_POST['Token'];
    $amount = $_POST['Amount'];
    $currency = $_POST['currency'];
    $description = $_POST['description'];
    $charge = \Stripe\Charge::create(array('amount' => $amount*100, 'currency' => $currency, 'source' => 'tok_1A2jmOKfxZabGH9PH3nJvVCk', 'description' => $description ));

  // Check that it was paid:
    if ($charge->paid == true) {
        $response['status'] = "Success";
        $response['message'] = "Payment has been charged!!";
     } else { // Charge was not paid!
        $response['Failure'] = "Failure";
        $response['message'] = "Your payment could NOT be processed because the payment system rejected the transaction. You can try again or use another card.";
    }

 header('Content-Type: application/json');
 echo json_encode($response);
}
catch(\Stripe\Error\Card $e) {
 $body = $e->getJsonBody();
    $err  = $body['error'];
    $response["error"] = $err['message'];
}
catch(\Stripe\Error\Authentication $e){
    $body = $e->getJsonBody();
    $err  = $body['error'];
    $response["error"] = $err['message'];
}
catch(\Stripe\Error\InvalidRequest $e){
    $body = $e->getJsonBody();
    $err  = $body['error'];
    $response["error"] = $err['message'];
}


header('Content-Type: application/json');
echo json_encode($response);
//echo $charge;


?>