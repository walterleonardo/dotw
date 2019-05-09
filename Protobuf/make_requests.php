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
            
            
//            
//                if ($valueRI != 0)
//                {
//                    //$folders = explode(",", $array_values);
//                    // Possible solution to a new line problem. For the future.
//                    $valueBC = $valueRI->getRoomIndexArray();
//                    $valueHC = $valueBC->getHotelCodeArray();
//                    $valueRD = $valueHC->getRoomData();
//                   
//                    //$folders5 = $folders[5];
//                    $array_need[$valueRI->getKey()][$valueBC->getKey()][$valueHC->getKey()]['cityCode'] = $valueHC->getCityCode();                    
//                    
//                    if ($valueBC->getKey())
//                    {
//                        if ($valueRD->getKey())
//                        {
//                            if ($valueRD->getKey() != '' )
//                            {
//                                if ($valueRD->getKey() == 'automapping')
//                                {
//                                    $array_need[$valueRI->getKey()][$valueBC->getKey()][$valueHC->getKey()]['roomData'][$valueRD->getRoomTypeCode()] = $valueRD->getKey(); 
//                                } else
//                                {
//                                    $array_need[$valueRI->getKey()][$valueBC->getKey()][$valueHC->getKey()]['roomData'][$valueRD->getRoomTypeCode()] = $valueRD->getRoomTypeCode();
//                                }
//                            } else
//                            {
//                                 $array_need[$valueRI->getKey()][$valueBC->getKey()][$valueHC->getKey()]['roomData'][$valueRD->getRoomTypeCode()] = $valueRD->getRoomTypeCode();
//                            }
//                        } else
//                        {
//                            $array_need[$valueRI->getKey()][$valueBC->getKey()][$valueHC->getKey()]['roomData'][$valueRD->getRoomTypeCode()] = $valueRD->getRoomTypeCode();
//                        }
//                    } else
//                    {
//                        if ($valueRD->getKey())
//                        {
//                            if ($valueRD->getKey() != '')
//                            {
//                                 if($valueRD->getKey() == 'automapping')
//                                {
//                                    $array_need[$valueRI->getKey()][$valueBC->getKey()][$valueHC->getKey()]['roomData'][$valueRD->getRoomTypeCode()] = $valueRD->getKey(); 
//                                } else
//                                {
//                                $array_need[$valueRI->getKey()][$valueBC->getKey()][$valueHC->getKey()]['roomData'][$valueRD->getKey()] = $valueRD->getRoomTypeCode();
//                                }
//                            } else
//                            {
//                                $array_need[$valueRI->getKey()][$valueBC->getKey()][$valueHC->getKey()]['roomData'][$valueRD->getRoomTypeCode()] = $valueRD->getRoomTypeCode(); 
//                                
//                            }
//                        }
//                    }
//                    $array_need[$valueRI->getKey()][$valueBC->getKey()][$valueHC->getKey()]['hotelCodeOriginal'] = $valueHC->getHotelCodeOriginal();
//                }
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


    
class fillArrayValues
{

    public static $answerStatic = array();

    public function distributeValues(&$param)
    {
        //$arrayAnswer = explode("|||", $param);
        $array_need = array();
        //$arrayAnswerSplice = array_splice($arrayAnswer, 1);

        if (count($arrayAnswerSplice) >= 1)
        {
            foreach ($arrayAnswerSplice as $array_values)
            {
                if ($array_values)
                {
                    $folders = explode(",", $array_values);
                    // Possible solution to a new line problem. For the future.
                    $folders5 = \trim($folders[5], "\t\n\r\0\x0B");
                    //$folders5 = $folders[5];
                    $array_need[$folders[0]][$folders[1]][$folders5]['cityCode'] = $folders[2];                    
                    
                    if (in_array($folders[1], ArrayChannelCodes::$array_of_channel_manager_codes))
                    {
                        if (isset($folders[6]))
                        {
                            if (trim($folders[6]) != '' )
                            {
                                if (trim($folders[6], "\t\n\r\0\x0B") == 'automapping')
                                {
                                    $array_need[$folders[0]][$folders[1]][$folders5]['roomData'][trim($folders[4], "\t\n\r\0\x0B")] = trim($folders[6], "\t\n\r\0\x0B"); 
                                } else
                                {
                                    $array_need[$folders[0]][$folders[1]][$folders5]['roomData'][trim($folders[4], "\t\n\r\0\x0B")] = trim($folders[4], "\t\n\r\0\x0B");
                                }
                            } else
                            {
                                 $array_need[$folders[0]][$folders[1]][$folders5]['roomData'][trim($folders[4], "\t\n\r\0\x0B")] = $folders[4];
                            }
                        } else
                        {
                            $array_need[$folders[0]][$folders[1]][$folders5]['roomData'][$folders[4]] = $folders[4];
                        }
                    } else
                    {
                        if (isset($folders[6]))
                        {
                            if (trim($folders[6]) != '')
                            {
                                 if(trim($folders[6], "\t\n\r\0\x0B") == 'automapping')
                                {
                                    $array_need[$folders[0]][$folders[1]][$folders5]['roomData'][trim($folders[4], "\t\n\r\0\x0B")] = trim($folders[6], "\t\n\r\0\x0B"); 
                                } else
                                {
                                $array_need[$folders[0]][$folders[1]][$folders5]['roomData'][trim($folders[6], "\t\n\r\0\x0B")] = trim($folders[4], "\t\n\r\0\x0B");
                                }
                            } else
                            {
                                $array_need[$folders[0]][$folders[1]][$folders5]['roomData'][$folders[4]] = $folders[4]; 
                                
                            }
                        }
                    }
                    $array_need[$folders[0]][$folders[1]][$folders5]['hotelCodeOriginal'] = $folders[3];
                }
            }
        } else
        {
            //self::$answerStatic = false;
            self::$answerStatic = $array_need;
            return true;
        }
        unset($folders, $arrayAnswer, $array_values, $arrayAnswerSplice);
        self::$answerStatic = $array_need;
        return true;
    }

    public function __destruct()
    {
        
    }

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

        $hotelDataRequest->setReturnHotelStaticData(new \Protobuffer\Dotwproto\HDRequest_ReturnHotelStaticData());
        $hotelDataRequest->getReturnHotelStaticData()->setDescription1($inputObj->ReturnHotelStaticData->description1);

        $pReturnRateData = new \Protobuffer\Dotwproto\HDRequest_ReturnRateData();
        $pReturnRateData->setOccupancy($inputObj->ReturnRateData->occupancy);
        
        $pReturnRoomTypeStaticData = new \Protobuffer\Dotwproto\HDRequest_ReturnRoomTypeStaticData();
        $pReturnRoomTypeStaticData->setRoomAmenities($inputObj->ReturnRoomTypeStaticData->roomAmenities);
        
        
        $hotelDataRequest->setHotelDataRequest("HDRPROTO ")
                //->setHotelIds($pHotelIdIndex)
                ->setLanguageId($inputObj->LanguageId)
                ->setReturnHotelStaticData($pReturnHotelStaticData)
                ->setReturnRateData($pReturnRateData)
                ->setReturnRoomTypeStaticData($pReturnRoomTypeStaticData);
        $reply = $client->hotelDataRequest($hotelDataRequest);
        
        
        //echo var_dump($reply);
        
        
        //$value = new \Protobuffer\Dotwproto\HDReply_HotelStaticData();
        

//        foreach ($reply->getHotelStaticDataList() as $value)
//        {
//            echo "GET KEY ";
//            echo  $value->getKey();
//            echo "\n\r";
//            echo "GET Description ";
//            echo  $value->getDescription1();
//            echo "\n\r#####";
//        }
        
        if ($reply->getReplyString() == "") 
        {
            echo " No Server Live";
        } else {
            echo 'HOTELDATAREQUEST = ' . $reply->getReplyString() . PHP_EOL;
        }
       
    }

    
//CALL FIRST CALL 
$inputPresupplier = new DotwCalls\FirstCall\Input();
$answerRequest = managerSupplierRequest($inputPresupplier);

//CALL SECOND CALL
    
//    
//$inputHotelData= new \DotwCalls\SecondCall\StaticInput();
//$answerRequest = managerHotelRequest($inputHotelData);
