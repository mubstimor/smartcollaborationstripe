<?php 
echo "testing mail page";

require 'vendor/autoload.php';
use MailgunMailgun;

// mail
# Instantiate the client.
$mgClient = new Mailgun('key-11eb04e330dfa31423e8aed18038d54c');
$domain = "sandboxeb82f6b056dc4ba1b8e89c090ea35761.mailgun.org";

# Make the call to the client.
$result = $mgClient->sendMessage("$domain",
          array('from'    => 'Mailgun Sandbox <postmaster@sandboxeb82f6b056dc4ba1b8e89c090ea35761.mailgun.org>',
                'to'      => 'Timothy Mubiru <mubstimor@gmail.com>',
                'subject' => 'Hello Timothy Mubiru',
                'text'    => 'Congratulations Timothy Mubiru, you just sent an email with Mailgun!  You are truly awesome! '));
echo "mail sending result -> ".$result;

?>