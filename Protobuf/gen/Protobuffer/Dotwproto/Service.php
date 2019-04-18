<?php

declare(strict_types=1);

namespace Protobuffer\Dotwproto;

class Service implements ServerDotwInterface
{
    
    public function psfilter(\Protobuffer\Dotwproto\PSFRequest $request): PSFReply
    {
        $res = $request->getPsfilter() == "PSFPROTO";
        $res = $res && sizeof($request->getHotelIds()) >= 1;
        $res = $res && $request->getSearchPeriodCriteria()->getTravelTo() == 1;
        $res = $res && $request->getRoomOccupancy()[0]->getAdults() == 1;
        $res = $res && $request->getRequestSource() == 2;
        
                      
        if ($res) {
            //$size = sizeof($request->getRoomOcupancy());
            $diff = "OK";
        } else {
            $diff = "KO";
        }
        
    return (new PSFReply())->setReplyString($diff);
    }
}

