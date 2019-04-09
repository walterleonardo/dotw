<?php

use Dotw\Proto\Client;
use Dotw\Proto\PsfilterRequest;


require __DIR__ . '/vendor/autoload.php';

$client = new Client();


$req   = (new PsfilterRequest())->setPsfilter("PSFILTER")->setCustomerId(4)->SetRequestSource(1)->setPassengerNationalityOrResidenceProvided(true);
$reply = $client->psfilter($req);

echo 'PSFILTER = ' . $reply->getReplyString() . PHP_EOL;