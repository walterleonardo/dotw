<?php

use Dotw\Proto\Client;
use Dotw\Proto\PsfilterRequest;
use Dotw\Proto\PsfilterRequest\RoomOccupancy;
use Dotw\Proto\PsfilterRequest\SearchPeriodCriteria;


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
        $psfilter = new PsfilterRequest();
        $psfilter->setPsfilter("PSFILTER")
                ->setRequestSource($inputObj->requestSource)
                ->setHotelIds(array(1,2,3));

        $psfilter->setRoomOcupancy(array(new RoomOccupancy()));
        $psfilter->getRoomOcupancy()[0]->setAdults(1);
        $psfilter->setSearchPeriodCriteria(new SearchPeriodCriteria());
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

