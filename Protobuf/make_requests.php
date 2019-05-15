<?php

use Protobuffer\Dotwproto\Client;
use Protobuffer\Dotwproto\PSFRequest;
use Protobuffer\Dotwproto\PSFReply;
use Protobuffer\Dotwproto\HDRequest;
use Protobuffer\Dotwproto\HDRReply;


require __DIR__ . '/vendor/autoload.php';
require "genProto/DotwCalls/FirstCall/classFromPartner_wps92_phase_2_wps129.php";
require "genProto/DotwCalls/SecondCall/classFromPartner_Demo_jiraWPS92_phase_2_wps93.php";
use DotwCalls\FirstCall\Input;
use DotwCalls\SecondCall\StaticInput;


//List of Channel Manager codes 
class ArrayChannelCodes {
    public static $array_of_channel_manager_code_1 = 1000;
    public static $array_of_channel_manager_code_2 = 1010; 
}

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
            (new Protobuffer\Dotwproto\PSFRequest_RoomOccupancy())->setAdults(2)->setChildren(array())->setTwin(false)->setExtraBed(false)
         //,(new PSFRequest\RoomOccupancy())->setAdults(3)->setChildren(array(1,2,3))->setTwin(false)->setExtraBed(false)
        ));
        
        
        $psfilter->setSearchPeriodCriteria(new Protobuffer\Dotwproto\PSFRequest_SearchPeriodCriteria());
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
        
        //var_dump($reply);
        
                
        $valueRI = new Protobuffer\Dotwproto\PSFReply_RoomIndex();
        $valueBC = new Protobuffer\Dotwproto\PSFReply_BookingChannelCode();
        $valueHC = new Protobuffer\Dotwproto\PSFReply_HotelCode();   
        $valueRD = new Protobuffer\Dotwproto\PSFReply_RoomData();

        if ($reply->getReplyString() == "") 
        {
            echo "No Server Live";
        } else {
            echo 'PSFILTER = ' . $reply->getReplyString() . PHP_EOL;
        }
        
        $array_need = array();
        foreach ($reply->getResults() as $valueRI)
            {  
                foreach ($valueRI->getRoomIndexArray() as $valueBC)
                {
                    if ($array_of_channel_manager_code_1 == $valueBC->getKey() or $array_of_channel_manager_code_2 == $valueBC->getKey())
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
            
            
            if (count($array_need) > 0)
            {
                echo "Se ha distribuido el array \n\r";
                var_export($array_need);
            }else {
                echo "No Se ha distribuido el array \n\r";
            }
            //var_dump($array_need);
    }


    
    

////SECOND CALL REQUEST 
function managerHotelRequest(StaticInput &$inputObj)
    {   
       //Distribute values 
        $client = new Client();
        
        $hotelDataRequest = new HDRequest();
        $pHotelIdIndex = new \Protobuffer\Dotwproto\HDRequest_HotelIds();
        foreach ($inputObj->hotelIds as $key => $value)
        {
             $hotelDataRequest->setHotelIds(array(
            $pHotelIdIndex->setHotelId($key)->setRoomTypeCodes($value)
         //,(new HDRequest\HotelIds())->setHotelId($key)->setRoomTypeCodes($value)
        ));
        }

        //$hotelDataRequest->setReturnHotelStaticData(new \Protobuffer\Dotwproto\HDRequest());
        
        $pHotelDataRequestList = new \Protobuffer\Dotwproto\HDRequest_ReturnHotelStaticData();
        $pHotelDataRequestList->setDescription1($inputObj->ReturnHotelStaticData->description1);
        $pHotelDataRequestList->setDescription2($inputObj->ReturnHotelStaticData->description1);
        $pHotelDataRequestList->setGeoPoint($inputObj->ReturnHotelStaticData->geoPoint);
        $pHotelDataRequestList->setRatingDescription($inputObj->ReturnHotelStaticData->ratingDescription);
        $pHotelDataRequestList->setImages($inputObj->ReturnHotelStaticData->images);
        $pHotelDataRequestList->setDirect($inputObj->ReturnHotelStaticData->direct);
        $pHotelDataRequestList->setHotelPreference($inputObj->ReturnHotelStaticData->hotelPreference);
        $pHotelDataRequestList->setBuiltYear($inputObj->ReturnHotelStaticData->builtYear);
        $pHotelDataRequestList->setRenovationYear($inputObj->ReturnHotelStaticData->renovationYear);
        $pHotelDataRequestList->setFloors($inputObj->ReturnHotelStaticData->floors);
        $pHotelDataRequestList->setNoOfRooms($inputObj->ReturnHotelStaticData->noOfRooms);
        $pHotelDataRequestList->setLuxury($inputObj->ReturnHotelStaticData->luxury);
        $pHotelDataRequestList->setAddress($inputObj->ReturnHotelStaticData->address);
        $pHotelDataRequestList->setZipCode($inputObj->ReturnHotelStaticData->zipCode);
        $pHotelDataRequestList->setLocation($inputObj->ReturnHotelStaticData->location);
        $pHotelDataRequestList->setLocationId($inputObj->ReturnHotelStaticData->locationId);
        $pHotelDataRequestList->setLocation1($inputObj->ReturnHotelStaticData->location1);
        $pHotelDataRequestList->setLocation2($inputObj->ReturnHotelStaticData->location2);
        $pHotelDataRequestList->setLocation3($inputObj->ReturnHotelStaticData->location3);
        $pHotelDataRequestList->setStateName($inputObj->ReturnHotelStaticData->stateName);
        $pHotelDataRequestList->setStateCode($inputObj->ReturnHotelStaticData->stateCode);
        $pHotelDataRequestList->setCountryName($inputObj->ReturnHotelStaticData->countryName);
        $pHotelDataRequestList->setRegionName($inputObj->ReturnHotelStaticData->regionName);
        $pHotelDataRequestList->setRegionCode($inputObj->ReturnHotelStaticData->regionCode);
        $pHotelDataRequestList->setAmenitie($inputObj->ReturnHotelStaticData->amenitie);
        $pHotelDataRequestList->setLeisure($inputObj->ReturnHotelStaticData->leisure);
        $pHotelDataRequestList->setBusiness($inputObj->ReturnHotelStaticData->business);
        $pHotelDataRequestList->setTransportation($inputObj->ReturnHotelStaticData->transportation);
        $pHotelDataRequestList->setHotelPhone($inputObj->ReturnHotelStaticData->hotelPhone);
        $pHotelDataRequestList->setHotelCheckIn($inputObj->ReturnHotelStaticData->hotelCheckIn);
        $pHotelDataRequestList->setHotelCheckOut($inputObj->ReturnHotelStaticData->hotelCheckOut);
        $pHotelDataRequestList->setMinAge($inputObj->ReturnHotelStaticData->minAge);
        $pHotelDataRequestList->setRating($inputObj->ReturnHotelStaticData->rating);
        $pHotelDataRequestList->setFireSafety($inputObj->ReturnHotelStaticData->fireSafety);
        $pHotelDataRequestList->setChain($inputObj->ReturnHotelStaticData->chain);
        $pHotelDataRequestList->setLastUpdated($inputObj->ReturnHotelStaticData->lastUpdated);
        $pHotelDataRequestList->setTransferMandatory($inputObj->ReturnHotelStaticData->transferMandatory);
        $pHotelDataRequestList->setTariffNotes($inputObj->ReturnHotelStaticData->tariffNotes);
        $pHotelDataRequestList->setChainName($inputObj->ReturnHotelStaticData->chainName);
        $pHotelDataRequestList->setHotelProperty($inputObj->ReturnHotelStaticData->hotelProperty);
        $pHotelDataRequestList->setFullAddress($inputObj->ReturnHotelStaticData->fullAddress);
        $pHotelDataRequestList->setExclusive($inputObj->ReturnHotelStaticData->exclusive);
        $pHotelDataRequestList->setAttraction($inputObj->ReturnHotelStaticData->attraction);
        $pHotelDataRequestList->setAreaCode($inputObj->ReturnHotelStaticData->areaCode);
        $pHotelDataRequestList->setAreaName($inputObj->ReturnHotelStaticData->areaName);
        $pHotelDataRequestList->setGeoLocations($inputObj->ReturnHotelStaticData->geoLocations);
        

       
        $pReturnRoomTypeStaticData = new \Protobuffer\Dotwproto\HDRequest_ReturnRoomTypeStaticData();
        $pReturnRoomTypeStaticData->setRoomAmenities($inputObj->ReturnRoomTypeStaticData->roomAmenities);
        $pReturnRoomTypeStaticData->setName($inputObj->ReturnRoomTypeStaticData->name);
        $pReturnRoomTypeStaticData->setSupplierRoomName($inputObj->ReturnRoomTypeStaticData->supplierRoomName);
        $pReturnRoomTypeStaticData->setTwin($inputObj->ReturnRoomTypeStaticData->twin);
        $pReturnRoomTypeStaticData->setRoomInfo($inputObj->ReturnRoomTypeStaticData->roomInfo);
        $pReturnRoomTypeStaticData->setSpecials($inputObj->ReturnRoomTypeStaticData->specials);
        $pReturnRoomTypeStaticData->setRoomImages($inputObj->ReturnRoomTypeStaticData->roomImages);
        $pReturnRoomTypeStaticData->setRoomCategory($inputObj->ReturnRoomTypeStaticData->roomCategory);
               
        
        $pReturnRateData = new \Protobuffer\Dotwproto\HDRequest_ReturnRateData();
        $pReturnRateData->setOccupancy($inputObj->ReturnRateData->occupancy);
        $pReturnRateData->setStatus($inputObj->ReturnRateData->status);
        $pReturnRateData->setRateType($inputObj->ReturnRateData->rateType);
        $pReturnRateData->setPaymentMode($inputObj->ReturnRateData->paymentMode);
        $pReturnRateData->setAllowsExtraMeals($inputObj->ReturnRateData->allowsExtraMeals);
        $pReturnRateData->setAllowsSpecialRequests($inputObj->ReturnRateData->allowsSpecialRequests);
        $pReturnRateData->setAllowsBeddingPreference($inputObj->ReturnRateData->allowsBeddingPreference);
        $pReturnRateData->setAllowsSpecials($inputObj->ReturnRateData->allowsSpecials);
        $pReturnRateData->setPassengerNamesRequiredForBooking($inputObj->ReturnRateData->passengerNamesRequiredForBooking);
        $pReturnRateData->setAllocationDetails($inputObj->ReturnRateData->allocationDetails);
        $pReturnRateData->setMinStay($inputObj->ReturnRateData->minStay);
        $pReturnRateData->setDateApplyMinStay($inputObj->ReturnRateData->dateApplyMinStay);
        $pReturnRateData->setCancellationRules($inputObj->ReturnRateData->cancellationRules);
        $pReturnRateData->setWithinCancellationDeadline($inputObj->ReturnRateData->withinCancellationDeadline);
        $pReturnRateData->setTariffNotes($inputObj->ReturnRateData->tariffNotes);
        $pReturnRateData->setIsBookable($inputObj->ReturnRateData->isBookable);
        $pReturnRateData->setOnRequest($inputObj->ReturnRateData->onRequest);
        $pReturnRateData->setTotal($inputObj->ReturnRateData->total);
        $pReturnRateData->setDates($inputObj->ReturnRateData->dates);
        $pReturnRateData->setFreeStay($inputObj->ReturnRateData->freeStay);
        $pReturnRateData->setDiscount($inputObj->ReturnRateData->discount);
        $pReturnRateData->setDayOnRequest($inputObj->ReturnRateData->dayOnRequest);
        $pReturnRateData->setIncluding($inputObj->ReturnRateData->including);
        $pReturnRateData->setDailyLeftToSell($inputObj->ReturnRateData->dailyLeftToSell);
        $pReturnRateData->setDailyMinStay($inputObj->ReturnRateData->dailyMinStay);
        $pReturnRateData->setLeftToSell($inputObj->ReturnRateData->leftToSell);
        $pReturnRateData->setSpecials($inputObj->ReturnRateData->specials);
        
        
        
        
        
        $hotelDataRequest->setHotelDataRequest("HDRPROTO ")
                //->setHotelIds($pHotelIdIndex)
                ->setLanguageId($inputObj->LanguageId)
                ->setReturnHotelStaticData($pHotelDataRequestList)
                ->setReturnRateData($pReturnRateData)
                ->setReturnRoomTypeStaticData($pReturnRoomTypeStaticData);
        
        
        
        
        $reply = $client->hotelDataRequest($hotelDataRequest);
        
        
        if ($reply->getReplyString() == "") 
        {
            echo " No Server Live";
        } else {
            echo 'HOTELDATAREQUEST = ' . $reply->getReplyString() . PHP_EOL;
        }
       
//        $valueHSD = new Protobuffer\Dotwproto\HDReply_HotelStaticData();
//        $valueID = new Protobuffer\Dotwproto\HDReply_HotelStaticData_ImagesData();
//        $valueRSD = new Protobuffer\Dotwproto\HDReply_HotelStaticData_RoomTypeStaticData();
//        $valueHSDRC = new Protobuffer\Dotwproto\HDReply_HotelStaticData_RoomTypeStaticData_RoomCategory();
//        $valueHSDRI = new Protobuffer\Dotwproto\HDReply_HotelStaticData_RoomTypeStaticData_RoomInfo();
//        $valueHSDRN = new Protobuffer\Dotwproto\HDReply_HotelStaticData_RoomTypeStaticData_RoomName();
//        $valueHSDRNS = new Protobuffer\Dotwproto\HDReply_HotelStaticData_RoomTypeStaticData_RoomNames();
//        $valueHSDSRN = new Protobuffer\Dotwproto\HDReply_HotelStaticData_RoomTypeStaticData_SupplierRoomName();
//        $valueHSDTD = new Protobuffer\Dotwproto\HDReply_HotelStaticData_TransportationData();
                            
        $valueHSD = $reply->getHotelStaticDataList();
        //var_dump($reply->serializeToString());
        
        //CONVERT TO OBJECT OF SECOND CALL ANSWER
        $answerStatic = array();
        
        /*
         * Separate in information packets of each hotel
         */
        $value = new Protobuffer\Dotwproto\HDReply_HotelStaticData();
        foreach ($valueHSD as $value)
        {
        $hotelStaticData = new \DotwCalls\SecondCall\output\HotelStaticData();

        
        $valueRSD = new Protobuffer\Dotwproto\HDReply_HotelStaticData_RoomTypeStaticData();
            foreach ($value->getRoomTypeStaticDataList() as $valueRSD)
            {
                $roomTypeStaticData = new \DotwCalls\SecondCall\output\RoomTypeStaticData();

                $roomTypeStaticData->twin = $valueRSD->getTwin();

                foreach ($valueRSD->getRoomAmenities() as $roomAmenities)
                {
                    $roomTypeStaticData->roomAmenities[] = $roomAmenities;
                }

                $roomTypeStaticData->name = $valueRSD->getName();

                $arrayoutput = array();
                $valueHSDSRN = new Protobuffer\Dotwproto\HDReply_HotelStaticData_RoomTypeStaticData_SupplierRoomName();
                foreach ($valueRSD->getSupplierRoomName() as $valueHSDSRN)
                {
                    $arraySupplierRoomNames = new Protobuffer\Dotwproto\HDReply_HotelStaticData_RoomTypeStaticData_RoomNames();
                    foreach ($valueHSDSRN->getRoomNames() as $arraySupplierRoomNames)
                    {
                    $arraySupplierRoomName = new Protobuffer\Dotwproto\HDReply_HotelStaticData_RoomTypeStaticData_RoomName();
                        foreach ($arraySupplierRoomNames->getRoomName() as $arraySupplierRoomName)
                        {
                                $arrayoutput[$arraySupplierRoomNames->getKey()][$arraySupplierRoomName->getRoomCode()] = $arraySupplierRoomName->getRoomName();
                        }
                     }
                }
                $roomTypeStaticData->supplierRoomName = $arrayoutput;



                $roomInfo = new \DotwCalls\SecondCall\output\RoomInfo();
                $valueHSDRI = new Protobuffer\Dotwproto\HDReply_HotelStaticData_RoomTypeStaticData_RoomInfo();
                foreach ($valueRSD->getRoomInfo() as $valueHSDRI)
                {
                                $roomInfo->children = $valueHSDRI->getChildren();
                                $roomInfo->maxChildren = $valueHSDRI->getMaxChildren();
                                $roomInfo->maxExtraBed = $valueHSDRI->getMaxExtraBed();
                                $roomInfo->maxAdult = $valueHSDRI->getMaxAdult();
                                $roomInfo->maxChildAge = $valueHSDRI->getMaxChildAge();
                                $roomInfo->minChildAge = $valueHSDRI->getMinChildAge();
                                $roomInfo->maxAdultWithChildren = $valueHSDRI->getMaxAdultWithChildren();
                                $roomInfo->maxOccupancy = $valueHSDRI->getMaxOccupancy();
                                $roomTypeStaticData->roomInfo = $roomInfo;
                }

                $roomCategoryData = new \DotwCalls\SecondCall\output\RoomCategory();
                $valueHSDRC = new Protobuffer\Dotwproto\HDReply_HotelStaticData_RoomTypeStaticData_RoomCategory();

                foreach ($valueRSD->getRoomCategory() as $valueHSDRC)
                {
                $roomCategoryData->code = $valueHSDRC->getCode();
                $roomCategoryData->name = $valueHSDRC->getName();
                $roomTypeStaticData->roomCategory = $roomCategoryData;
                }
                
                $hotelStaticData->RoomTypeStaticDataList[$valueRSD->getKey()] = $roomTypeStaticData;
            }
        
        $hotelStaticData->description1 = $value->getDescription1();
        $hotelStaticData->description2 = $value->getDescription2();
        $hotelStaticData->geoPoint = $value->getGeoPoint();
        $hotelStaticData->ratingDescription = $value->getRatingDescription();
       
        foreach ( $value->getImages() as $images)
        {
            $imagesData = new \DotwCalls\SecondCall\output\ImageData();
            $imagesData->thumb = $images->getThumb();
            $imagesData->alt = $images->getAlt();
            $imagesData->category = $images->getCategory();
            $imagesData->url = $images->getUrl();
            $imagesData->roomTypeId = $images->getRoomTypeId();
              
            $hotelStaticData->images[] = $imagesData;
        }
        $hotelStaticData->direct = $value->getDirect();
        foreach ( $value->getHotelPreference() as $hotelPreference)
        {
             $hotelStaticData->hotelPreference[] = $hotelPreference;
        }
        $hotelStaticData->preferred = $value->getPreferred();
        $hotelStaticData->builtYear = $value->getBuiltYear();
        $hotelStaticData->renovationYear = $value->getRenovationYear();
        $hotelStaticData->floors = $value->getFloors();
        $hotelStaticData->noOfRooms = $value->getNoOfRooms();
        $hotelStaticData->luxury = $value->getLuxury();
        $hotelStaticData->hotelName = $value->getHotelName();
        $hotelStaticData->address = $value->getAddress();
        $hotelStaticData->zipCode = $value->getZipCode();
        $hotelStaticData->location = $value->getLocation();
        $hotelStaticData->locationId = $value->getLocationId();
        $hotelStaticData->location1 = $value->getLocation1();
        $hotelStaticData->location2 = $value->getLocation2();
        $hotelStaticData->location3 = $value->getLocation3();
        $hotelStaticData->cityName = $value->getCityName();
        $hotelStaticData->cityCode = $value->getCityCode();
        $hotelStaticData->stateName = $value->getStateName();
        $hotelStaticData->stateCode = $value->getStateCode();
        $hotelStaticData->countryName = $value->getCountryName();
        $hotelStaticData->countryCode = $value->getCountryCode();
        $hotelStaticData->regionName = $value->getRegionName();
        $hotelStaticData->regionCode = $value->getRegionCode();
        foreach ($value->getAmenitie() as $amenitiesData)
        {
            $hotelStaticData->amenitie[] = $amenitiesData;
        }
        foreach ($value->getLeisure() as $leisureData)
        {
            $hotelStaticData->leisure[] = $leisureData;
        }
        foreach ($value->getBusiness() as $businessData)
        {
            $hotelStaticData->business[] = $businessData;
        }
        
        $transportationInfo = new \DotwCalls\SecondCall\output\TransportationData();
        $transport = new Protobuffer\Dotwproto\HDReply_HotelStaticData_TransportationData();
        foreach ($value->getTransportation() as $transport)
        {
               $transportationInfo->Name = $transport->getName();
               $transportationInfo->Dist = $transport->getDist();
               $transportationInfo->DistanceUnit = $transport->getDistanceUnit();
               $transportationInfo->DistTime = $transport->getDistTime();
               $transportationInfo->Directions = $transport->getDirections();
               $transportationInfo->Type = $transport->getType();
               
        $hotelStaticData->transportation = $transportationInfo;
        }
        
        $hotelStaticData->hotelPhone = $value->getHotelPhone();
        $hotelStaticData->hotelCheckIn = $value->getHotelCheckIn();
        $hotelStaticData->hotelCheckOut = $value->getHotelCheckOut();
        $hotelStaticData->minAge = $value->getMinAge();
        $hotelStaticData->rating = $value->getRating();
        $hotelStaticData->fireSafety = $value->getFireSafety();
        $hotelStaticData->chain = $value->getChain();
        $hotelStaticData->lastUpdated = $value->getLastUpdated();
        $hotelStaticData->transferMandatory = $value->getTransferMandatory();
        $hotelStaticData->tariffNotes = $value->getTariffNotes();
        $hotelStaticData->chainName = $value->getChainName();
        $hotelStaticData->hotelProperty = $value->getHotelProperty();
        $hotelStaticData->fullAddress = ($value->getFullAddress() != "")? $value->getFullAddress() : NULL;
        $hotelStaticData->attraction = ($value->getAttraction() != "")? $value->getAttraction() : NULL;
        $hotelStaticData->exclusive = $value->getExclusive();
        
        
         $answerStatic[$value->getKey()] = $hotelStaticData;
        }


        var_export($answerStatic);        
    }

    
//CALL FIRST CALL 
//$inputPresupplier = new DotwCalls\FirstCall\Input();
//$answerRequest = managerSupplierRequest($inputPresupplier);

//CALL SECOND CALL
    
//    
$inputHotelData= new \DotwCalls\SecondCall\StaticInput();
$answerRequest = managerHotelRequest($inputHotelData);
