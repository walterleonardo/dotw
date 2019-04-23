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
        
        
        
        if($inputObj->city.fin)
        {
            
        }
        
       //Distribute values 
        $client = new Client();
        $psfilter = new PSFRequest();
        $psfilter->setPsfilter("PSFPROTO")
                ->setCustomerId($inputObj->customerId)
                ->setEnvironment($inputObj->environment)
                ->setRequestSource($inputObj->requestSource)
                ->setExceptRestrictions($inputObj->exceptRestrictions)
                ->setPassengerNationalityOrResidenceProvided($inputObj->passengerNationalityOrResidenceProvided)
                ->setHotelIds($inputObj->hotelIds)
                ->setBookingChannelsWithAutoMapping($inputObj->bookingChannelsWithAutoMapping)
                ->setBookingChannelTypes($inputObj->bookingChannelTypes)
                ->setExcludedBookingchannel($inputObj->excludedBookingchannel)
                ->setActiveForRoomCategories($inputObj->activeForRoomCategories)
                ->setAdditionalFilters($inputObj->AdditionalFilters);
        
        
        $psfilter->setRoomOccupancy(array(
            (new PSFRequest\RoomOccupancy())->setAdults(2)->setChildren(array())->setTwin(false)->setExtraBed(false)
         //,(new PSFRequest\RoomOccupancy())->setAdults(3)->setChildren(array(1,2,3))->setTwin(false)->setExtraBed(false)
        ));
        
        
        $psfilter->setSearchPeriodCriteria(new PSFRequest\SearchPeriodCriteria());
        $psfilter->getSearchPeriodCriteria()->setTravelFrom(1552640400);
        $psfilter->getSearchPeriodCriteria()->setTravelTo(1553644800);
        $psfilter->getSearchPeriodCriteria()->setBookingDateTime(1552694400);
        
        
        //$psfilter->setHotelFilters(new PSFRequest\HotelFilters());
        //$psfilter->getHotelFilters()->setLuxury(111);
        
        
        //$psfilter->setRoomTypeFilters(new PSFRequest\RoomTypeFilters());
//        $psfilter->getRoomTypeFilters()->setSuite(1);
//        $psfilter->getRoomTypeFilters()->setRoomAmenitie(array(1,2,3));
//        $psfilter->getRoomTypeFilters()->setroomId(array(1,2,3));
//        $psfilter->getRoomTypeFilters()->setroomName("ROOM");
//        $psfilter->getRoomTypeFilters()->setRoomCategories(array(
//            (new PSFRequest\RoomTypeFilters\RoomCategory())->setMainCategory(1)->setSubCategory(2)->setView(3)->setBeddingType(4)->setAttribute1(5)->setAttribute2(6),
//            (new PSFRequest\RoomTypeFilters\RoomCategory())->setMainCategory(11)->setSubCategory(22)->setView(33)->setBeddingType(44)->setAttribute1(55)->setAttribute2(66)));
        
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

