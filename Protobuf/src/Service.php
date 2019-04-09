<?php

declare(strict_types=1);

namespace Dotw\Proto;

class Service implements ServerInterface
{
    
    public function psfilter(\Dotw\Proto\PsfilterRequest $request): PsfilterReply
    {
        $diff = "KO";
        
        if ($request->getPsfilter() == "PSFILTER" && $request->getCustomerId() == 4 && $request->getPassengerNationalityOrResidenceProvided()){
            $diff = "OK";
        } else {
            $diff = "KO";
        }
        
    return (new PsfilterReply())->setReplyString($diff);
    }
}

