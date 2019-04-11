<?php

declare(strict_types=1);

namespace Dotw\Proto;

use Google\Protobuf\Internal\Message;

class Client implements ServerDotwInterface
{
    
    public function psfilter(PsfilterRequest $request): PsfilterReply
    {
    	$reply = new PsfilterReply();
    	$reply->mergeFromString($this->makeRequest($request, 'psfilter'));

    	return $reply;
    }
    
    private function makeRequest(Message $message, string $method): string
    {
    	$body = $message->serializeToString();

    	$ch = curl_init("http://localhost:8000/{$method}");

    	curl_setopt_array($ch, [
    		CURLOPT_RETURNTRANSFER => true,
    		CURLOPT_POST           => true,
    		CURLOPT_POSTFIELDS     => $body,
    	]);

    	$response = curl_exec($ch);

    	curl_close($ch);

    	return $response;
    }
}