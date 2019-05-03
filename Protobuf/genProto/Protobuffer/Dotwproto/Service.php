<?php

declare(strict_types=1);

namespace Protobuffer\Dotwproto;

class Service implements ServerDotwInterface
{
    
    public function psfilter(\Protobuffer\Dotwproto\PSFRequest $request): PSFReply
    {
        $res = $request->getPsfilter() == "PSFPROTO";
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
        
    return (new PSFReply())->setReplyString($diff);
    }
    
    
     public function hotelDataRequest(\Protobuffer\Dotwproto\HDRequest $request): HDReply
    {
        $res = $request->getHotelDataRequest() == "HDRPROTO ";
        if(!$res) error_log("Fallo init");
        
        $res = $res && $request->getLanguageId() == 1;
                if(!$res) error_log("Fallo languageId");

        $res = $res && $request->getReturnRoomTypeStaticData()->getRoomAmenities();
        if(!$res) error_log("roomamenities false");

        
        $res = $res && $request->getHotelIds()[0]->getHotelId() == 2434;
        if(!$res) error_log("Hotelid error ");
        
         $res = $res && $request->getHotelIds()[0]->getRoomTypeCodes()->count() >= 1;
        if(!$res) error_log("Roomtype code less 1 error ");
        
        
       // var_dump ($request->getHotelIds()->getRoomTypeCodes());
        
        
                      
        if ($res) {
            $diff = "OK";
        } else {
            $diff = "KO";
        }
        
    return (new HDReply())->setReplyString($diff);
    }
}

