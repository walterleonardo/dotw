<?php

use Protobuffer\Dotwproto\Client;
use Protobuffer\Dotwproto\PSFRequest;
use Protobuffer\Dotwproto\PSFReply;
use Protobuffer\Dotwproto\HDRequest;
use Protobuffer\Dotwproto\HDRReply;


require __DIR__ . '/vendor/autoload.php';
require "genProto/DotwCalls/FirstCall/classFromPartner_wps92_phase_2_wps129.php";
require "genProto/DotwCalls/SecondCall/classFromPartner_Demo_jiraWPS92_phase_2_wps112.php";
use DotwCalls\FirstCall\Input;
use DotwCalls\SecondCall\StaticInput;

//FIRST CALL REQUEST
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
        $psfilter->setPsfilter("PSFPROTO ")
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



////SECOND CALL REQUEST 
function managerHotelRequest(StaticInput &$inputObj)
    {   
       //Distribute values 
        $client = new Client();
        
        $hotelId = array(
            2434 => 
                array (
                    0 => 133414
                    ,1 => 133424
                    ,2 => 133434
                    ,3 => 133444
                    ,4 => 133454
                    ,5 => 133464
                    ,6 => 133474
                    ,7 => 133484
                    ,8 => 133494
                    ,9 => 133504
                    ,10 => 137316
                    ,11 => 16145218
                    ,12 => 16145228
                    ,13 => 16145238
                    ,14 => 16145248
                    ,15 => 16145258
                    ,16 => 16145268
                    ,17 => 16145278
                    ,18 => 16145288
                    ,19 => 16145298
                    ,20 => 16145308
                    ,21 => 16145318
                    ,22 => 16145328
                    ,23 => 35211535
                    ,24 => 56017195
                    ,25 => 56017205
                    ,26 => 56017215
                    ,27 => 64514355
                    ,28 => 64514365
                    ,29 => 64514375
                    ,30 => 64514385
                    ,31 => 64514395
                    ,32 => 64514405
                    ,33 => 64514415
                    ,34 => 64514425
                    ,35 => 64514435
                    ,36 => 64514445
                    ,37 => 64514455
                    ,38 => 64514465
                    ,39 => 64514475
                    ,40 => 76528115
                    ,41 => 76531395
     
                    )
        );
        
        $hotelDataRequest = new HDRequest();
        $hotelDataRequest->setHotelDataRequest("HDRPROTO ")
                ->setHotelIds(array(new HDRequest\HotelIds()))
                 ->setLanguageId($inputObj->LanguageId)
                ->setReturnHotelStaticData(new HDRequest\ReturnHotelStaticData())
                 ->setReturnRateData(new HDRequest\ReturnRateData())
                 ->setReturnRoomTypeStaticData(new HDRequest\ReturnRoomTypeStaticData());
        ;
        $reply = $client->hotelDataRequest($hotelDataRequest);

        if ($reply->getReplyString() == "") 
        {
            echo "No Server Live";
        } else {
            echo 'HOTELDATAREQUEST = ' . $reply->getReplyString() . PHP_EOL;
        }
       
    }

    
//CALL FIRST CALL 
//$inputPresupplier = new DotwCalls\FirstCall\Input();
//$answerRequest = managerSupplierRequest($inputPresupplier);

//CALL SECOND CALL
    
    
$inputHotelData= new \DotwCalls\SecondCall\StaticInput();
$answerRequest = managerHotelRequest($inputHotelData);
