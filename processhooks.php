<?php 

require_once('vendor/stripe/stripe-php/init.php');
$my_stripe_key = getenv('STRIPE_KEY');

// rerieve the request's body and parse it as JSON
$input = @file_get_contents("php://input");
$event_json = json_decode($input);

// Verify the event by fetching it from Stripe
$event = \Stripe\Event::retrieve($event_json->id);

// Do something with $event
 if ($event->id == true) {
    $event_type = $event->type;
    if($event_type == "customer.subscription.created"){
         mail("mubstimor@gmail.com", "Stripe Hook", "subscription for client created");
    }else{
        mail("mubstimor@gmail.com", "Stripe Hook", "hook ".$event_type." called ");
    }
 }

http_response_code(200); 

?>