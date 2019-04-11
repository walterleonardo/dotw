<?php

declare(strict_types=1);

namespace Dotw\Proto;

class Service implements ServerDotwInterface
{
    
    public function psfilter(\Dotw\Proto\PsfilterRequest $request): PsfilterReply
    {
        $diff = "KO";
        $array = $request->getHotelIds();
        $sizeof = sizeof($array);
               
        if ($request->getPsfilter() == "PSFILTER" && $sizeof >= 1) {
            $diff = "OK";
        } else {
            $diff = "KO";
        }
        
    return (new PsfilterReply())->setReplyString($diff);
    }
}

