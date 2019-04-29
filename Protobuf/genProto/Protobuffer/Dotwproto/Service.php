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
            //$size = sizeof($request->getRoomOcupancy());
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
                if(!$res) error_log("Fallo init");
//
//        $res = $res && $request->getCustomerId() == 551665;
//                if(!$res) error_log("Fallo Customer");
//
//        $res = $res && $request->getSearchPeriodCriteria()->getTravelTo() == 1553644800;
//                if(!$res) error_log("Fallo travelto");
//
//        $res = $res && $request->getRoomOccupancy()[0]->getAdults() == 2;
//                if(!$res) error_log("Fallo getAdults");
//
//        $res = $res && $request->getRequestSource() == 2;
//                if(!$res) error_log("Fallo Source");

        
                      
        if ($res) {
            //$size = sizeof($request->getRoomOcupancy());
            $diff = "OK";
        } else {
            $diff = "KO";
        }
        
    return (new HDReply())->setReplyString($diff);
    }
}

