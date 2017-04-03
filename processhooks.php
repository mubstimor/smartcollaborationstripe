<?php 

require_once('vendor/stripe/stripe-php/init.php');
# Include the Autoloader (see "Libraries" for install instructions)
require 'vendor/autoload.php';
use MailgunMailgun;

$my_stripe_key = getenv('STRIPE_KEY');

// mail
# Instantiate the client.
$mgClient = new Mailgun('key-11eb04e330dfa31423e8aed18038d54c');
$domain = "sandboxeb82f6b056dc4ba1b8e89c090ea35761.mailgun.org";

// rerieve the request's body and parse it as JSON
$input = @file_get_contents("php://input");
$event_json = json_decode($input);

// Verify the event by fetching it from Stripe
$event = \Stripe\Event::retrieve($event_json->id);

// Do something with $event
 if ($event->id == true) {
    $event_type = $event->type;
    if($event_type == "customer.subscription.created"){
        //  mail("mubstimor@gmail.com", "Stripe Hook", "subscription for client created");
         $result = $mgClient->sendMessage("$domain",
          array('from'    => 'Mailgun Sandbox <postmaster@sandboxeb82f6b056dc4ba1b8e89c090ea35761.mailgun.org>',
                'to'      => 'mubstimor@gmail.com',
                'subject' => 'Stripe Hook',
                'text'    => 'subscription for client created'));
    }else{
        # Make the call to the client.
$result = $mgClient->sendMessage("$domain",
          array('from'    => 'Mailgun Sandbox <postmaster@sandboxeb82f6b056dc4ba1b8e89c090ea35761.mailgun.org>',
                'to'      => 'mubstimor@gmail.com',
                'subject' => 'Stripe Hook',
                'text'    => 'hook'.$event_type.' called'));
        // mail("mubstimor@gmail.com", "Stripe Hook", "hook ".$event_type." called ");
    }
 }

http_response_code(200); 

?>