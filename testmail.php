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

# Make the call to the client.
$result = $mgClient->sendMessage("$domain",
          array('from'    => 'Mailgun Sandbox <postmaster@sandboxeb82f6b056dc4ba1b8e89c090ea35761.mailgun.org>',
                'to'      => 'Timothy Mubiru <tm283@student.le.ac.uk>',
                'subject' => 'Hello Timothy Mubiru',
                'text'    => 'Congratulations Timothy Mubiru, you just sent an email with Mailgun!  You are truly awesome! '));


?>