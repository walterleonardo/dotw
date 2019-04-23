<?php

declare(strict_types=1);

namespace Protobuffer\Dotwproto;

use Google\Protobuf\Internal\Message;

class Client implements ServerDotwInterface
{
    
    public function psfilter(PSFRequest $request): PSFReply
    {
    	$reply = new PSFReply();
        
    	//$reply->mergeFromString($this->makeRequest($request, 'psfilter'));
        $reply->mergeFromString($this->requestTCP($request, 'psfilter'));

    	return $reply;
    }
    
    private function makeRequest(Message $message, string $method): string
    {
    	$body = $message->serializeToString();

    	$ch = curl_init("http://localhost:10003/{$method}");

    	curl_setopt_array($ch, [
    		CURLOPT_RETURNTRANSFER => true,
    		CURLOPT_POST           => true,
    		CURLOPT_POSTFIELDS     => $body,
    	]);

    	$response = curl_exec($ch);

    	curl_close($ch);

        if (!$response){
            return "";
        }
    	return $response;
    }

    Private function requestTCP(Message $messagePROTO, string $method): string
    {
        $debug = TRUE;
        $timeout = 3000;
        set_time_limit(0); //TIMEOUT into receive
        ini_set("default_socket_timeout", "3"); //TIMEOUT into send
        //Server Method $serverMethods 'unique', 'random' & 'roundrobin'
        //$server = "127.0.0.1";
        $server = "10.211.55.3";
        $port = 10003;
        //$seconds = 3;
        //$var = $this->string;
        error_log("Mensaje a enviar: ");
        var_dump($messagePROTO);
        $message = $messagePROTO->serializeToString();
        
        //error_log($message . "\r");
        $message = $message . "\r\n";
        $buffer = '';
        //////////////////////////////
        if (!($socket = @socket_create(AF_INET, SOCK_STREAM, SOL_TCP)))
        {
            $this->errorCode = socket_last_error($socket);
            $this->errorMessage = socket_strerror($this->errorCode);
            self::$arrayError = [$this->errorCode, $this->errorMessage, $server, $port];
            return false;
        }

        if ($debug)
        {
            echo "Socket created \n";
        }
        //Connect socket to remote server
        socket_set_option($socket, SOL_SOCKET, SO_SNDTIMEO, array('sec' => 3, 'usec' => 0));
        socket_set_option($socket, SOL_SOCKET, SO_RCVTIMEO, array('sec' => 3, 'usec' => 0));

//socket_set_nonblock($socket);
        $error = NULL;
        $attempts = 0;
        while (!($connected = @socket_connect($socket, $server, $port)) && ($attempts < $timeout))
        {
            $error = socket_last_error($socket);
            if ($error != SOCKET_EINPROGRESS && $error != SOCKET_EALREADY)
            {
                $this->errorCode = socket_last_error();
                $this->errorMessage = socket_strerror($error);
                socket_close($socket);
                $arrayError = [$this->errorCode, $this->errorMessage, $server, $port];
                return "NO ha conectado!!!";
            }
            usleep(100);
            $attempts++;
        }
        
        //Send the message to the server
        if (!@socket_send($socket, $message, strlen($message), 0))
        {
            $this->errorCode = socket_last_error();
            $this->errorMessage = socket_strerror($this->errorCode);
            self::$arrayError = [$this->errorCode, $this->errorMessage, $server, $port];
            return false;
        } else
        {
            if ($debug)
            {
                echo "Message send successfully \n";
            }
        }

        $buf = NULL;
        while (true)
        {
            if (false == ($buffer = @socket_read($socket, 20480000, PHP_NORMAL_READ)))
            {
                break;
            }
            $buf .= $buffer;
            if (strlen($buf) > 2)
            {
                $string = substr($buf, -2);
                if ($string === "\r\n" or $string === "\n\r")
                {
                    break;
                }
            }
            if ($debug)
            {
                echo "Answer from server: $buf";
            }
        }
       
        $str = str_replace ("\r\n", "", $buf);
        socket_close($socket);
        return $str;
    }
}