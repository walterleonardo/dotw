<?php

use Dotw\Proto\Client;
use Dotw\Proto\PsfilterRequest;
use Dotw\Proto\PsfilterRequest\RoomOccupancy;
use Dotw\Proto\PsfilterRequest\SearchPeriodCriteria;

require __DIR__ . '/vendor/autoload.php';

$client = new Client();
$psfilter = new PsfilterRequest();
$psfilter->setRoomOcupancy(array(new RoomOccupancy()));
$psfilter->getRoomOcupancy()[0]->setAdults(1);
$psfilter->setSearchPeriodCriteria(new SearchPeriodCriteria());
$psfilter->getSearchPeriodCriteria()->setTravelTo(1);

$psfilter->setPsfilter("PSFILTER")
        ->setRequestSource(1)
        ->setHotelIds(array(1,2,3));


$req = $psfilter;


$reply = $client->psfilter($req);

echo 'PSFILTER = ' . $reply->getReplyString() . PHP_EOL;