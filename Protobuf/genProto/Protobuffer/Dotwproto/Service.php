<?php

declare(strict_types=1);

namespace Protobuffer\Dotwproto;

class Service implements ServerDotwInterface
{
    
    public function psfilter(\Protobuffer\Dotwproto\PSFRequest $request): PSFReply
    {
        $res = $request->getPsfilter() == "PSFPROTO ";
        if(!$res) error_log("Fallo init");
        
        $res = $res && \sizeof($request->getHotelIds()) >= 1;
                if(!$res) error_log("Fallo init");

        $res = $res && $request->getCustomerId() == 551665;
                if(!$res) error_log("Fallo Customer");

        $res = $res && $request->getSearchPeriodCriteria()->getTravelTo() == 1553644800;
                if(!$res) error_log("Fallo travelto");

        $res = $res && $request->getRoomOccupancy()[0]->getAdults() == 2;
                if(!$res) error_log("Fallo getAdults");

        $res = $res && $request->getRequestSource() == 2;
                if(!$res) error_log("Fallo Source");

        
                      
        if ($res) {
            $diff = "OK";
        } else {
            $diff = "KO";
        }
       
        
        $psfilter = new PSFReply();
        
        $roomIndex = new PSFReply_RoomIndex();
        
        $bookingChannel = new PSFReply_BookingChannelCode();
        
        $hotelCode = new PSFReply_HotelCode();
        
        $roomData = new PSFReply_RoomData();
        
        $psfilter->setResults(
                array(
                    $roomIndex->setKey(12)->setRoomIndexArray(
                            array(
                                $bookingChannel->setKey(13)->setHotelCodeArray(
                                        array(
                                            $hotelCode->setKey(14)->setCityCode(123)->setHotelCodeOriginal(321)->setRoomData(array(
                                                $roomData->setKey(0)->setRoomTypeCode(333)
                                            ))
            ))
            ))
            ));
        $psfilter->setReplyString($diff);
        
    return $psfilter;
    }
    
    
     public function hotelDataRequest(\Protobuffer\Dotwproto\HDRequest $request): HDReply
    {
        $res = $request->getHotelDataRequest() == "HDRPROTO ";
        if(!$res) error_log("Fallo init");
        
        $res = $res && $request->getLanguageId() == 1;
                if(!$res) error_log("Fallo languageId");

        $res = $res && $request->getReturnRoomTypeStaticData()->getRoomAmenities();
        if(!$res) error_log("roomamenities false");

        
//        $res = $res && $request->getHotelIds()[0] == 2434;
//        if(!$res) error_log("Hotelid error ");
//        
//         $res = $res && $request->getHotelIds()[0]->getRoomTypeCodes()->count() >= 1;
//        if(!$res) error_log("Roomtype code less 1 error ");
        
       // var_dump ($request->getHotelIds()->getRoomTypeCodes());
           
                      
        if ($res) {
            $diff = "OK";
        } else {
            $diff = "KO";
        }
        
        
        $reply = new HDReply();
        $reply->setReplyString($diff);
        
        $replyHSD = new HDReply_HotelStaticData();
        $replyRTSD = new HDReply_HotelStaticData_RoomTypeStaticData();
        $replyID = new HDReply_HotelStaticData_ImagesData();
        $replyTD = new HDReply_HotelStaticData_TransportationData();
        $replyRC = new HDReply_HotelStaticData_RoomTypeStaticData_RoomCategory();
        $replyRI = new HDReply_HotelStaticData_RoomTypeStaticData_RoomInfo();
        $replySRN = new HDReply_HotelStaticData_RoomTypeStaticData_SupplierRoomName();
        
        $reply->setHotelStaticDataList(array(
            (new HDReply_HotelStaticData())->setKey(1)->setDescription1("desc1")
             ->setRoomTypeStaticDataList(array(
                 (new HDReply_HotelStaticData_RoomTypeStaticData())->setKey(1)->setTwin(FALSE)->setRoomAmenities(array(12,3,32))
                     ,(new HDReply_HotelStaticData_RoomTypeStaticData())->setKey(1)->setTwin(FALSE)
             ))
            ,(new HDReply_HotelStaticData())->setKey(2)->setDescription1("desc2")
        ));
        
        
    return $reply;
    }
}

