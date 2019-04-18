<?php

use Protobuffer\Dotwproto\Client;
use Protobuffer\Dotwproto\PSFRequest;
use Protobuffer\Dotwproto\PSFReply;


require __DIR__ . '/vendor/autoload.php';
require "gen/Dotw/FirstCall/classFromPartner_wps92_phase_2_wps129.php";
use Dotw\FirstCall\Input;


function managerSupplierRequest(Input &$inputObj)
    {
    //organize types
        $aRoomOccupancy = $inputObj->RoomOccupancy;
        $aRoomTypeFilters = $inputObj->RoomTypeFilters;
        if ($aRoomTypeFilters != NULL)
            $aRoomCategories = $inputObj->RoomTypeFilters->roomCategories;
        else
            $aRoomCategories = array();
        
        $aHotelFilters = $inputObj->HotelFilters;
        $aSearchPeriodCriteria = $inputObj->SearchPeriodCriteria;
        
       //Distribute values 
        $client = new Client();
        $psfilter = new PSFRequest();
        $psfilter->setPsfilter("PSFPROTO")
                ->setCustomerId($inputObj->customerId)
                ->setRequestSource($inputObj->requestSource)
                ->setHotelIds(array(1,2,3,4,5));

        $psfilter->setRoomOccupancy(array(new PSFRequest\RoomOccupancy()));
        $psfilter->getRoomOccupancy()[0]->setAdults(1);
        $psfilter->setSearchPeriodCriteria(new PSFRequest\SearchPeriodCriteria());
        $psfilter->getSearchPeriodCriteria()->setTravelTo(1);

        //Call to server and get answer
        $reply = $client->psfilter($psfilter);

        if ($reply->getReplyString() == "") 
        {
            echo "No Server Live";
        } else {
            echo 'PSFILTER = ' . $reply->getReplyString() . PHP_EOL;
        }
       
    }

$inputPresupplier = new \Dotw\FirstCall\Input;
$answerRequest = managerSupplierRequest($inputPresupplier);

