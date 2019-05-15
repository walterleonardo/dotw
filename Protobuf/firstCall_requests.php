<?php

namespace protobufFirstCall;

use Protobuffer\Dotwproto\Client;


require __DIR__ . '/vendor/autoload.php';
require "genProto/DotwCalls/FirstCall/classFromPartner_wps92_phase_2_wps129.php";
use DotwCalls\FirstCall\Input;


//List of Channel Manager codes 
class ArrayChannelCodes {
    public static $array_of_channel_manager_codes = array (1000,1010);
}

//FIRST CALL REQUEST
class run
{
function managerSupplierRequest(Input &$inputObj)
    {
    //organize types
//        $aRoomOccupancy = $inputObj->RoomOccupancy;
//        $aRoomTypeFilters = $inputObj->RoomTypeFilters;
        if ($aRoomTypeFilters != NULL)
            $aRoomCategories = $inputObj->RoomTypeFilters->roomCategories;
        else
            $aRoomCategories = array();
        
//        $aHotelFilters = $inputObj->HotelFilters;
//        $aSearchPeriodCriteria = $inputObj->SearchPeriodCriteria;
        
        
       //Distribute values 
        $client = new Client();
        $psfilter = new \Protobuffer\Dotwproto\PSFRequest();
        $psfilter->setPsfilter("PSFPROTO ")
                ->setCustomerId($inputObj->customerId)
                ->setEnvironment($inputObj->environment)
                ->setRequestSource($inputObj->requestSource + 1)
                ->setExceptRestrictions($inputObj->exceptRestrictions)
                ->setPassengerNationalityOrResidenceProvided($inputObj->passengerNationalityOrResidenceProvided)
                ->setBookingChannelsWithAutoMapping($inputObj->bookingChannelsWithAutoMapping)
                ->setBookingChannelTypes($inputObj->bookingChannelTypes)
                ->setExcludedBookingchannel($inputObj->excludedBookingchannel)
                ->setActiveForRoomCategories($inputObj->activeForRoomCategories)
                ->setAdditionalFilters($inputObj->AdditionalFilters);
        
        
        
        //HotelID or CITY or COUNTRY
        if (count($inputObj->hotelIds) > 0)
        {
            $psfilter->setHotelIds($inputObj->hotelIds);
        } else {
            if ($inputObj->city != "")
            {
               $psfilter->setCity($inputObj->city);
            }else {
               $psfilter->setCountry($inputObj->country); 
            }
            
        }
        
        
        $roomsOccupancies = array();
        $aRoomOccupancy = $inputObj->RoomOccupancy;
        foreach ($aRoomOccupancy as $roomOccupancyData)
        {
            $roomArray = get_object_vars($roomOccupancyData);
            $roomOccupancy = new \Protobuffer\Dotwproto\PSFRequest_RoomOccupancy();
            if ($roomArray["adults"] != NULL) $roomOccupancy->setAdults($roomArray["adults"]);
            if ($roomArray["children"] != NULL) $roomOccupancy->setChildren($roomArray["children"]);
            if ($roomArray["twin"] != NULL) $roomOccupancy->setTwin($roomArray["twin"]);
            if ($roomArray["extraBed"] != NULL) $roomOccupancy->setExtraBed($roomArray["extraBed"]);
            $roomsOccupancies[] = $roomOccupancy;
        }  
        
        $psfilter->setRoomOccupancy($roomsOccupancies);
        
        
        $aSearchPeriodCriteria =  get_object_vars($inputObj->SearchPeriodCriteria);

        $psfilter->setSearchPeriodCriteria(new \Protobuffer\Dotwproto\PSFRequest_SearchPeriodCriteria());
        $psfilter->getSearchPeriodCriteria()->setTravelFrom($aSearchPeriodCriteria["travelFrom"]);
        $psfilter->getSearchPeriodCriteria()->setTravelTo($aSearchPeriodCriteria["travelTo"]);
        $psfilter->getSearchPeriodCriteria()->setBookingDateTime($aSearchPeriodCriteria["bookingDateTime"]);
        
        
        
        

        $aHotelFilter = get_object_vars($inputObj->HotelFilters);
        $hotelFiltersRequest =  new \Protobuffer\Dotwproto\PSFRequest_HotelFilters();
        if (sizeof($aHotelFilter) > 0)
        {
        if ($aHotelFilter["rating"] != NULL) $hotelFiltersRequest->setRating($aHotelFilter["rating"]);
        if ($aHotelFilter["luxury"] != NULL) $hotelFiltersRequest->setLuxury($aHotelFilter["luxury"]);
        if ($aHotelFilter["location"] != NULL) $hotelFiltersRequest->setLocation($aHotelFilter["location"]);
        if ($aHotelFilter["locationId"] != NULL) $hotelFiltersRequest->setLocationId($aHotelFilter["locationId"]);
        if ($aHotelFilter["amenitie"] != NULL) $hotelFiltersRequest->setAmenitie($aHotelFilter["amenitie"]);
        if ($aHotelFilter["leisure"] != NULL) $hotelFiltersRequest->setLeisure($aHotelFilter["leisure"]);
        if ($aHotelFilter["business"] != NULL) $hotelFiltersRequest->setBusiness($aHotelFilter["business"]);
        if ($aHotelFilter["hotelPreference"] != NULL) $hotelFiltersRequest->setHotelPreference($aHotelFilter["hotelPreference"]);
        if ($aHotelFilter["chain"] != NULL) $hotelFiltersRequest->setChain($aHotelFilter["chain"]);
        if ($aHotelFilter["attraction"] != NULL) $hotelFiltersRequest->setAttraction($aHotelFilter["attraction"]);
        if ($aHotelFilter["hotelName"] != NULL) $hotelFiltersRequest->setHotelName($aHotelFilter["hotelName"]);
        if ($aHotelFilter["builtYear"] != NULL) $hotelFiltersRequest->setBuiltYear($aHotelFilter["builtYear"]);
        if ($aHotelFilter["renovationYear"] != NULL) $hotelFiltersRequest->setRenovationYear($aHotelFilter["renovationYear"]);
        if ($aHotelFilter["floors"] != NULL) $hotelFiltersRequest->setFloors($aHotelFilter["floors"]);
        if ($aHotelFilter["noOfRooms"] != NULL) $hotelFiltersRequest->setNoOfRooms($aHotelFilter["noOfRooms"]);
        if ($aHotelFilter["fireSafety"] != NULL) $hotelFiltersRequest->setFireSafety($aHotelFilter["fireSafety"]);
        if ($aHotelFilter["lastUpdated"] != NULL) $hotelFiltersRequest->setLastUpdated($aHotelFilter["lastUpdated"]);
        $psfilter->setHotelFilters($hotelFiltersRequest);
        }
        
        $aRoomTypeFilters = get_object_vars($inputObj->RoomTypeFilters);
        $roomTypeFilter =  new \Protobuffer\Dotwproto\PSFRequest_RoomTypeFilters();
        if ($aRoomTypeFilters["suite"] != NULL) $roomTypeFilter->setSuite($aRoomTypeFilters["suite"]);
        if ($aRoomTypeFilters["roomAmenitie"] != NULL) $roomTypeFilter->setRoomAmenitie(array($aRoomTypeFilters["roomAmenitie"]));
        if ($aRoomTypeFilters["roomId"] != NULL) $roomTypeFilter->setroomId(array($aRoomTypeFilters["roomId"]));
        if ($aRoomTypeFilters["roomName"] != NULL) $roomTypeFilter->setroomName($aRoomTypeFilters["roomName"]);
        
        $aRoomCategories = $inputObj->RoomTypeFilters->roomCategories;
        if (count($aRoomCategories) != 0)
        {
        $roomCategoryArray = array();
       
        foreach ($aRoomCategories as $roomCatObject)
            {
             $roomCategoryObject = new \Protobuffer\Dotwproto\PSFRequest_RoomTypeFilters_RoomCategory();
            $roomCat = get_object_vars($roomCatObject);
            if ($roomCat["MainCategory"] != NULL) $roomCategoryObject->setMainCategory($roomCat["MainCategory"]);
            if ($roomCat["SubCategory"] != NULL) $roomCategoryObject->setSubCategory($roomCat["SubCategory"]);
            if ($roomCat["View"] != NULL) $roomCategoryObject->setView($roomCat["View"]);
            if ($roomCat["BeddingType"] != NULL) $roomCategoryObject->setBeddingType($roomCat["BeddingType"]);
            if ($roomCat["Attribute1"] != NULL) $roomCategoryObject->setAttribute1($roomCat["Attribute1"]);
            if ($roomCat["Attribute2"] != NULL) $roomCategoryObject->setAttribute2($roomCat["Attribute2"]);
            $roomCategoryArray[] = $roomCategoryObject;
            }
        $roomTypeFilter->setRoomCategories($roomCategoryArray);
         }
        
        $psfilter->setRoomTypeFilters($roomTypeFilter);
        
        
        //Call to server and get answer
        $reply = $client->psfilter($psfilter);
        
        //var_dump($reply);
        
                
        $valueRI = new \Protobuffer\Dotwproto\PSFReply_RoomIndex();
        $valueBC = new \Protobuffer\Dotwproto\PSFReply_BookingChannelCode();
        $valueHC = new \Protobuffer\Dotwproto\PSFReply_HotelCode();   
        $valueRD = new \Protobuffer\Dotwproto\PSFReply_RoomData();

        if ($reply->getReplyString() == "") 
        {
            echo "No Server Live";
        } 
        
        $array_need = array();
        foreach ($reply->getResults() as $valueRI)
            {  
                foreach ($valueRI->getRoomIndexArray() as $valueBC)
                {
                    if (in_array($valueBC->getKey(), ArrayChannelCodes::$array_of_channel_manager_codes))
                    {
                        foreach ($valueBC->getHotelCodeArray() as $valueHC)
                        {
                            $array_need[$valueRI->getKey()][$valueBC->getKey()][$valueHC->getKey()]['cityCode'] = $valueHC->getCityCode();
                                foreach ($valueHC->getRoomData() as $valueRD)
                                {
                                    if ($valueRD->getKey() == "automapping")
                                    {
                                 $array_need[$valueRI->getKey()][$valueBC->getKey()][$valueHC->getKey()]['roomData'][$valueRD->getRoomTypeCode()] = $valueRD->getKey(); 
                                    } else if ($valueRD->getKey() == "")
                                    {
                                 $array_need[$valueRI->getKey()][$valueBC->getKey()][$valueHC->getKey()]['roomData'][$valueRD->getRoomTypeCode()] = $valueRD->getRoomTypeCode();
                                    } else 
                                    {
                                        $array_need[$valueRI->getKey()][$valueBC->getKey()][$valueHC->getKey()]['roomData'][$valueRD->getRoomTypeCode()] = $valueRD->getRoomTypeCode();
                                    }

                                }
                                $array_need[$valueRI->getKey()][$valueBC->getKey()][$valueHC->getKey()]['hotelCodeOriginal'] = $valueHC->getHotelCodeOriginal();
                        } 
                    } else
                    {
                        foreach ($valueBC->getHotelCodeArray() as $valueHC)
                        {
                            $array_need[$valueRI->getKey()][$valueBC->getKey()][$valueHC->getKey()]['cityCode'] = $valueHC->getCityCode();
                                foreach ($valueHC->getRoomData() as $valueRD)
                                {
                                    if ($valueRD->getKey() == "automapping")
                                    {
                                 $array_need[$valueRI->getKey()][$valueBC->getKey()][$valueHC->getKey()]['roomData'][$valueRD->getRoomTypeCode()] = $valueRD->getKey(); 
                                    } else if ($valueRD->getKey() == "")
                                    {
                                 $array_need[$valueRI->getKey()][$valueBC->getKey()][$valueHC->getKey()]['roomData'][$valueRD->getRoomTypeCode()] = $valueRD->getRoomTypeCode();
                                    } else 
                                    {
                                        $array_need[$valueRI->getKey()][$valueBC->getKey()][$valueHC->getKey()]['roomData'][$valueRD->getKey()] = $valueRD->getRoomTypeCode();
                                    }

                                }
                                $array_need[$valueRI->getKey()][$valueBC->getKey()][$valueHC->getKey()]['hotelCodeOriginal'] = $valueHC->getHotelCodeOriginal();
                        } 
                    }
                }
            }
     
            var_export($array_need);
            return $array_need;
    }
}
    
//CALL FIRST CALL 
$inputPresupplier = new \DotwCalls\FirstCall\Input();
$firstCall = new \protobufFirstCall\run();
$answerRequest = $firstCall->managerSupplierRequest($inputPresupplier);

