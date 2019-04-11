<?php

use Dotw\Proto\Input;
use Dotw\Proto\Client;
use Dotw\Proto\PsfilterRequest;


require __DIR__ . '/vendor/autoload.php';

$client = new Client();

$req = (new PsfilterRequest())->setPsfilter("PSFILTER")->setRequestSource(1)->setHotelIds(array(1,2,3));
$reply = $client->psfilter($req);

echo 'PSFILTER = ' . $reply->getReplyString() . PHP_EOL;