<?php

declare(strict_types=1);

namespace Dotw\Proto;

class Service implements ServerDotwInterface
{
    
    public function psfilter(\Dotw\Proto\PsfilterRequest $request): PsfilterReply
    {
        $res = $request->getPsfilter() == "PSFILTER";
        $res = $res && sizeof($request->getHotelIds()) >= 1;
        $res = $res && $request->getSearchPeriodCriteria()->getTravelTo() == 1;
        $res = $res && $request->getRoomOcupancy()[0]->getAdults() == 1;
        
                      
        if ($res) {
            $size = sizeof($request->getRoomOcupancy());
            $diff = "$size";
        } else {
            $diff = "KO";
        }
        
    return (new PsfilterReply())->setReplyString($diff);
    }
}

