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
       
        //$valueHSD = new Protobuffer\Dotwproto\HDReply_HotelStaticData();
        $valueID = new Protobuffer\Dotwproto\HDReply_HotelStaticData_ImagesData();
        $valueHSD = new Protobuffer\Dotwproto\HDReply_HotelStaticData_RoomTypeStaticData();
        $valueHSDRC = new Protobuffer\Dotwproto\HDReply_HotelStaticData_RoomTypeStaticData_RoomCategory();
        $valueHSDRI = new Protobuffer\Dotwproto\HDReply_HotelStaticData_RoomTypeStaticData_RoomInfo();
        $valueHSDRN = new Protobuffer\Dotwproto\HDReply_HotelStaticData_RoomTypeStaticData_RoomName();
        $valueHSDRNS = new Protobuffer\Dotwproto\HDReply_HotelStaticData_RoomTypeStaticData_RoomNames();
        $valueHSDSRN = new Protobuffer\Dotwproto\HDReply_HotelStaticData_RoomTypeStaticData_SupplierRoomName();
        $valueHSDTD = new Protobuffer\Dotwproto\HDReply_HotelStaticData_TransportationData();
                            
        $valueHSD = $reply->getHotelStaticDataList();
        //var_dump($reply->serializeToString());
        
        //CONVERT TO OBJECT OF SECOND CALL ANSWER
        $answerStatic = array();
        
        /*
         * Separate in information packets of each hotel
         */

        foreach ($valueHSD as $value)
        {
        $hotelStaticData = new \DotwCalls\SecondCall\output\HotelStaticData();
        
        $hotelStaticData->description1 = $value->getDescription1();
        $hotelStaticData->description2 = $value->getDescription2();
        $hotelStaticData->geoPoint = $value->getGeoPoint();
        $hotelStaticData->ratingDescription = $value->getRatingDescription();
       
        $valueID = $value->getImages();
        foreach ( $valueID as $images)
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
        foreach ($value->getAmenitie() as $data)
        {
            $hotelStaticData->amenitie[] = $data;
        }
        foreach ($value->getLeisure() as $data)
        {
            $hotelStaticData->leisure[] = $data;
        }
        foreach ($value->getBusiness() as $data)
        {
            $hotelStaticData->business[] = $data;
        }
        
        $transportation = new \DotwCalls\SecondCall\output\TransportationData();
        foreach ($value->getTransportation() as $transportationData)
        {
            //$transportation->Name = $transportationData
                    
                    /*
                     *     public $Type;
    public $Name;
    public $Dist;
    public $DistanceUnit;
    public $DistTime;
    public $Directions;

                     */
        }
        
        //$hotelStaticData->transportation = $value->getTransportation(); //array
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
        $hotelStaticData->fullAddress = $value->getFullAddress();
        $hotelStaticData->attraction = $value->getAttraction();
        $hotelStaticData->exclusive = $value->getExclusive();
        
        
         $answerStatic[$value->getKey()] = $hotelStaticData;
        }


        var_export($answerStatic);
        
//        foreach ($valueHSD as $valueHSD)
//        {
//
//            $valuefinal = explode("-[-", $value);
//                
//            $indexFromLastValue = trim($valuefinal[47], "\t\n\r\0\x0B"); //Sanitize HOTEL INDEX
//
//            
//            unset($valuefinal[47]); //Remove HOTEL INDEX, to use like ARRAY INDEX
//            $hotelStaticData = new \Hotel\StaticData\HotelStaticData();
//            for ($x = 0; $x < count($key); $x++)
//            {
//
//                /*
//                 * Management object HOTELSTATICDATA
//                 */
//                for ($i = 0; $i < count($valuefinal); $i++)
//                {
//                    $var = self::$Labels[$i];
//                    $type = self::$types[$i];
//
//                    //CHECK if is array of ~
//                    if ($type == 'array')
//                    {
//                        $array1 = explode("-~-", $valuefinal[$i]);
//                        if (isset($array1) and $array1[0] != "")
//                        {
//                            $hotelStaticData->$var = $array1;
//                        } else
//                        {
//                            $hotelStaticData->$var = array();
//                        }
//                    } elseif ($type == 'integer')
//                    {
//                        if (isset($valuefinal[$i]) and $valuefinal[$i] != '')
//                        {
//                            $hotelStaticData->$var = (int) $valuefinal[$i];
//                        } else
//                        {
//                            $hotelStaticData->$var = 0;
//                        }
//                    } elseif ($type == 'string')
//                    {
//                        if (isset($valuefinal[$i]))
//                        {
//                            if ($valuefinal[$i] == '0,0')
//                            {
//                                $valuefinal[$i] = '';
//                            }
//                            if ($var == 'hotelPreference')
//                            {
//                                $hotelStaticData->$var = NULL;
//                            } elseif ($var == 'description1' || $var == 'tariffNotes' || $var == 'address')
//                            {
//                                /* CORRECT THE TRANSLATION OF CRETURN */
//                                $hotelStaticData->$var = self::translateSimilsAnswerData($valuefinal[$i]);
//                            } else
//                            {
//                                /*
//                                 * Translate symbolsData to symbols
//                                 * 
//                                 */
//
//                                if ($valuefinal[$i] != '')
//                                {
//
//                                    $hotelStaticData->$var = $valuefinal[$i]; //self::translateSimilsAnswerData($valuefinal[$i]);
//                                } else
//                                {
//                                    $hotelStaticData->$var = '';
//                                }
//                            }
//                        } else
//                        {
//                            $hotelStaticData->$var = '';
//                        }
//                    } elseif ($type == 'boolean')
//                    {
//                        if (isset($valuefinal[$i]) and $valuefinal[$i] != '')
//                        {
//                            if ($valuefinal[$i] == 'Y' or $valuefinal[$i] == '1')
//                            {
//                                $valuefinal[$i] = true;
//                            } else
//                            {
//                                $valuefinal[$i] = false;
//                            }
//                        }
//
//                        $hotelStaticData->$var = $valuefinal[$i];
//                    } else
//                    {
//                        if (isset($valuefinal[$i]) and $valuefinal[$i] != '')
//                        {
//                            $hotelStaticData->$var = $valuefinal[$i];
//                        }
//                    }
//                    //}
//                    unset($array1);
//                }
//            }
//            /*
//             * Management object IMAGES
//             */
//            if (isset($hotelStaticData->images) and is_array($hotelStaticData->images))
//            {
//                $arrayImage = array();
//
//                if (is_array($hotelStaticData->images))
//                {
//                    foreach ($hotelStaticData->images as $keyIn => $valueIn)
//                    {
//                        $imageData = new \Hotel\StaticData\ImageData();
//                        $array1 = explode("-#-", $valueIn);
//                        foreach ($array1 as $keyInIn => $valueInIn)
//                        {
//                            $labelImage = self::$LabelsImages[$keyInIn];
//                            if (self::$LabelsImagesTypes[$keyInIn] == 'string' && $labelImage == 'alt')
//                            {
//                                $imageData->$labelImage = self::translateSimilsAnswerData($valueInIn);
//                            } else
//                            {
//                                $imageData->$labelImage = $valueInIn;
//                            }
//                        }
//                        $arrayImage[] = $imageData;
//                    }
//                } else
//                {
//                    $imageData = new \Hotel\StaticData\ImageData();
//                    $array1 = explode("-#-", $valueIn);
//                    foreach ($array1 as $keyInIn => $valueInIn)
//                    {
//                        $labelImage = self::$LabelsImages[$keyInIn];
//                        if (self::$LabelsImagesTypes[$keyInIn] == 'string' && $labelImage == 'alt')
//                        {
//                            $imageData->$labelImage = self::translateSimilsAnswerData($valueInIn);
//                        } else
//                        {
//                            $imageData->$labelImage = $valueInIn;
//                        }
//                    }
//                    $arrayImage[] = $imageData;
//                }
//                $hotelStaticData->images = $arrayImage;
//                unset($imageData, $valueInIn, $keyInIn, $valueIn, $keyIn, $arrayImage);
//            }
//            /*
//             * Management object Transportation
//             */
//
//            if (isset($hotelStaticData->transportation))
//            {
//                $arrayTransportation = array();
//                if (is_array($hotelStaticData->transportation))
//                {
//                    foreach ($hotelStaticData->transportation as $keyIn => $valueIn)
//                    {
//                        $transportationData = new \Hotel\StaticData\TransportationData();
//                        $array1 = explode("-#-", $valueIn);
//                        foreach ($array1 as $keyInIn => $valueInIn)
//                        {
//                            $labelTransportation = self::$LabelsTransportation[$keyInIn];
//                            if ($valueInIn != '')
//                            {
//                                if (self::$LabelsTransportationTypes[$keyInIn] == 'string')
//                                {
//
//                                    $transportationData->$labelTransportation = $valueInIn; 
//                                } else
//                                {
//                                    $transportationData->$labelTransportation = $valueInIn;
//                                }
//                            } else
//                            {
//                                $transportationData->$labelTransportation = '';
//                            }
//                        }
//                        $arrayTransportation[] = $transportationData;
//                    }
//                    $hotelStaticData->transportation = $arrayTransportation;
//                } else
//                {
//                    $transportationData = new \Hotel\StaticData\TransportationData();
//                    $array1 = explode("-#-", $hotelStaticData->transportation);
//                    foreach ($array1 as $keyInIn => $valueInIn)
//                    {
//                        $labelTransportation = self::$LabelsTransportation[$keyInIn];
//                        if ($valueInIn != '')
//                        {
//                            if (self::$LabelsTransportationTypes[$keyInIn] == 'string')
//                            {
//
//                                $transportationData->$labelTransportation = $valueInIn; //self::translateSimilsAnswerData($valueInIn);
//                            } else
//                            {
//                                $transportationData->$labelTransportation = $valueInIn;
//                            }
//                        } else
//                        {
//                            $transportationData->$labelTransportation = '';
//                        }
//                    }
//                    $arrayTransportation[] = $transportationData;
//                    $hotelStaticData->transportation = $arrayTransportation;
//                }
//                unset($valueInIn, $keyInIn, $valueIn, $keyIn);
//            } else
//            {
//                $hotelStaticData->transportation = array();
//            }
//
//
//
//            /*
//             * Management object LastUpdate
//             */
//            if (isset($hotelStaticData->lastUpdated) and $hotelStaticData->lastUpdated != '')
//            {
//                $hotelStaticData->lastUpdated = gmdate("Y-m-d H:i:s", $hotelStaticData->lastUpdated);
//            }
//
//            /*
//             * Management object RoomTypeStaticDataList and the internal objects RoomINFO
//             */
//
//            if (isset($hotelStaticData->RoomTypeStaticDataList) and is_array($hotelStaticData->RoomTypeStaticDataList))
//            {
//             
//                $arrayRoomTypeStatic = array();
//                $arrayRoomTypeCode = array();
//                foreach ($hotelStaticData->RoomTypeStaticDataList as $keytr => $valuetr)
//                {
//                    $roomTypeStaticData = new \Hotel\StaticData\RoomTypeStaticData;
//
//            
//            
//                    if (preg_match('/-#-/', $valuetr))
//                    {
//                        $array1 = explode("-#-", $valuetr);
//                        $roomInfo = new \Hotel\StaticData\RoomInfo();
//                        $roomCategory = new \Hotel\StaticData\RoomCategory();
//
//
//                        foreach ($array1 as $keyIn => $valueIn)
//                        {
//                            //Obtain the label for the room data
//                            $labelRoom = self::$LabelsRoomTypeStaticData[$keyIn];
//                            if ($keyIn == 0)
//                            {
//                                $arrayRoomTypeCode[] = $valueIn;
//                            }
//                         
//
//                            if (preg_match('/-{-/', $valueIn))
//                            {
//                                if ($labelRoom == 'roomInfo')
//                                {
//                                    $arrayIn = explode("-{-", $valueIn);
//                                    foreach ($arrayIn as $keytri => $valuetri)
//                                    {
//                                        $labelRoomInfo = self::$LabelsRoomInfo[$keytri];
//                                        if (isset($valuetri))
//                                        {
//                                            //$labelRoomInfo = self::$LabelsRoomInfo[$keytri];
//
//
//                                            if ($labelRoomInfo == 'maxExtraBed')
//                                            {
//                                                if ($valuetri == 'Y')
//                                                {
//                                                    $roomInfo->$labelRoomInfo = true;
//                                                } else if ($valuetri == 'N')
//                                                {
//                                                    $roomInfo->$labelRoomInfo = false;
//                                                } else
//                                                {
//                                                    $roomInfo->$labelRoomInfo = NULL;
//                                                }
//                                            } else
//                                            {
//                                                $roomInfo->$labelRoomInfo = (int) $valuetri; //(int)
//                                            }
//                                            //$labelRoom = self::$LabelsRoomTypeStaticData[$keyIn];
//                                            $roomTypeStaticData->$labelRoom = $roomInfo;
//                                        }
//                                    }
//                                } elseif ($labelRoom == 'roomCategory')
//                                {
//                                    $arrayIn = explode("-{-", $valueIn);
//                                    foreach ($arrayIn as $keytri => $valuetri)
//                                    {
//                                        $labelRoomCategory = self::$LabelsRoomCategory[$keytri];
//                                        if (isset($valuetri))
//                                        {
//                                            //$labelRoomInfo = self::$LabelsRoomInfo[$keytri];
//                                            $roomCategory->$labelRoomCategory = $valuetri; //(int)
//                                            
//                                            //$labelRoom = self::$LabelsRoomTypeStaticData[$keyIn];
//                                            $roomTypeStaticData->$labelRoom = $roomCategory;
//                                        }
//                                    }
//                                    
//                                    
//                                } elseif ($labelRoom == 'supplierRoomName')
//                                {
//                                    $arrayIn = explode("-{-", $valueIn);
//                                    $arrayoutput = null;
//                                    
//                                    foreach ($arrayIn as $keytri => $valuetri)
//                                    {
//                                        $arrayinsider = array();
//                                        $valueinto = explode("~", $valuetri);
//                                        $arrayoutput[$valueinto[0]][$valueinto[1]] = $valueinto[2];
//                                        
//                                    }
//                                    
//                                    $roomTypeStaticData->$labelRoom = $arrayoutput;
//  
//                                } else
//                                {
//                                    //$arrayIn = array_map('intval', explode('{', $valueIn));
//                                    $arrayIn = array_map(null, explode("-{-", $valueIn));
//                                    //$labelRoom = self::$LabelsRoomTypeStaticData[$keyIn];
//                                    $roomTypeStaticData->$labelRoom = $arrayIn;
//                                }
//                                
//                                
//                                
//                            } else
//                            {
//                                //Convert and save booleans
//                                if (self::$LabelsRoomTypeStaticDataTypes[$labelRoom] == 'boolean')
//                                {
//                                    if (isset($valueIn))
//                                    {
//                                        if ($valueIn == 'Y' or $valueIn == '1')
//                                        {
//                                            $valueIn = true;
//                                        } else
//                                        {
//                                            $valueIn = false;
//                                        }
//                                    } else
//                                    {
//                                        $valueIn = NULL;
//                                    }
//                                    $roomTypeStaticData->$labelRoom = $valueIn;
//
//                                    //Convert and save array
//                                } elseif (self::$LabelsRoomTypeStaticDataTypes[$labelRoom] == 'array')
//                                {                                  
//                                    if (isset($valueIn) and $valueIn != "")
//                                    {
//                                        //$labelRoom = self::$LabelsRoomTypeStaticData[$keyIn];
//                                        if ($labelRoom == 'supplierRoomName')
//                                        {
//                                            $arrayoutput = array();
//                                            $valueinto = explode("~", $valueIn);
//                                            $arrayoutput[$valueinto[0]][$valueinto[1]] = $valueinto[2];
//
//                                            $roomTypeStaticData->$labelRoom = $arrayoutput;
//                                        } else
//                                        {
//                                        $roomTypeStaticData->$labelRoom = array($valueIn);
//                                        }
//                                    } else
//                                    {
//                                        //$labelRoom = self::$LabelsRoomTypeStaticData[$keyIn];
//                                        if (self::$LabelsRoomTypeStaticDataTypes[$labelRoom] == 'array')
//                                            $roomTypeStaticData->$labelRoom = array();
//                                        else
//                                            $roomTypeStaticData->$labelRoom = null;
//                                    }
//                                } elseif (self::$LabelsRoomTypeStaticDataTypes[$labelRoom] == 'string')
//                                {
//                                    //$labelRoom = self::$LabelsRoomTypeStaticData[$keyIn];
//                                    if (isset($valueIn) && $valueIn != '')
//                                    {
//                                        $roomTypeStaticData->$labelRoom = $valueIn; //self::translateSimilsAnswerData($valueIn);
//                                    } else
//                                    {
//                                        $roomTypeStaticData->$labelRoom = '';
//                                    }
//                                } else
//                                {
//                                    if ($labelRoom != 'roomTypeID')
//                                    {
//                                        //$labelRoom = self::$LabelsRoomTypeStaticData[$keyIn];
//                                        $roomTypeStaticData->$labelRoom = $valueIn;
//                                    }
//                                }
//                            }
//
//                            foreach ($roomTypeStaticData as $keyRTSD => $valueRTSD)
//                            {
//                                if (Constructor::$arrayConverted['ReturnRoomTypeStaticData'][$keyRTSD] == 'N')
//                                {
//                                    $roomTypeStaticData->$keyRTSD = NULL;
//                                }
//                            }
//                            $arrayRoomTypeStatic[$array1[0]] = $roomTypeStaticData;
//                        }
//                    } else
//                    {
//                        echo "INCORRECT ROOMTYPESTATICDATALIST\n\r";
//                        return false;
//                    }
//                }
//
//                $hotelStaticData->RoomTypeStaticDataList = $arrayRoomTypeStatic;
//            }
//
//
//////            ORDER FROM INDEX_HOTELCODE, include like index the HOTELIDS in each case. 
////            if (isset($index["hotelIds"][$key])) {
////                $arrayKeys = $index["hotelIds"];
////                ksort($hotelStaticData->RoomTypeStaticDataList);
////            } else {
////                $arrayKeys = array_keys($index["hotelIds"]);
////                ksort($hotelStaticData->RoomTypeStaticDataList);
////            }
//
//
//
//
//
//            if (Constructor::$arrayConverted['ReturnRoomTypeStaticData']['twin'] == 'N' and Constructor::$arrayConverted['ReturnRoomTypeStaticData']['roomAmenities'] == 'N' and Constructor::$arrayConverted['ReturnRoomTypeStaticData']['name'] == 'N' and Constructor::$arrayConverted['ReturnRoomTypeStaticData']['supplierRoomName'] == 'N' and Constructor::$arrayConverted['ReturnRoomTypeStaticData']['roomInfo'] == 'N' and Constructor::$arrayConverted['ReturnRoomTypeStaticData']['roomCategory'] == 'N')
//            {
//                $hotelStaticData->RoomTypeStaticDataList = array();
//            }
//
//            foreach ($hotelStaticData as $keyHSD => $valueHSD)
//            {
//                if (isset(Constructor::$arrayConverted['ReturnHotelStaticData'][$keyHSD]))
//                {
//                    if (Constructor::$arrayConverted['ReturnHotelStaticData'][$keyHSD] == 'N')
//                    {
//                        $hotelStaticData->$keyHSD = NULL;
//                    }
//                }
//            }
//
//
//            self::$answerStatic[$indexFromLastValue] = $hotelStaticData;
//            unset($key, $hotelStaticData);
//        }
        
        
        
    }

    
//CALL FIRST CALL 
//$inputPresupplier = new DotwCalls\FirstCall\Input();
//$answerRequest = managerSupplierRequest($inputPresupplier);

//CALL SECOND CALL
    
//    
$inputHotelData= new \DotwCalls\SecondCall\StaticInput();
$answerRequest = managerHotelRequest($inputHotelData);
