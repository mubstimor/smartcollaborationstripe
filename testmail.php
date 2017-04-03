<?php 
echo "testing mail page";

require 'vendor/autoload.php';
use Mailgun\Mailgun;


// mail
# Instantiate the client.
$mgClient2 = new Mailgun('key-11eb04e330dfa31423e8aed18038d54c');
$mgClient = new Mailgun('key-11eb04e330dfa31423e8aed18038d54c', new \Http\Adapter\Guzzle6\Client());
echo "use package".$mgClient;
echo "/nuse package 2 ".$mgClient2;

$mg = Mailgun::create('key-11eb04e330dfa31423e8aed18038d54c');
# Now, compose and send your message.
$mg->message()->send('example.com', [
  'from'    => 'bob@example.com', 
  'to'      => 'mubstimor@gmail.com', 
  'subject' => 'The PHP SDK is awesome!', 
  'text'    => 'It is so simple to send a message.'
]);

$domain = "sandboxeb82f6b056dc4ba1b8e89c090ea35761.mailgun.org";

# Make the call to the client.
$result = $mgClient->sendMessage("$domain",
          array('from'    => 'Mailgun Sandbox <postmaster@sandboxeb82f6b056dc4ba1b8e89c090ea35761.mailgun.org>',
                'to'      => 'Timothy Mubiru <mubstimor@gmail.com>',
                'subject' => 'Hello Timothy Mubiru',
                'text'    => 'Congratulations Timothy Mubiru, you just sent an email with Mailgun!  You are truly awesome! '));
echo "mail sending result -> ".$result;

?>