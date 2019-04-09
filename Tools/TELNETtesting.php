<?php 

/*
 * Class to management all the TCP communication request and response
 */
$debug = true;
//$servers = ["10.211.55.3", "10.211.55.3"];
$servers = ["10.255.5.205", "10.255.5.76"];

$errorPrint = false;

$filename = "PeticionesMasivasPSFILTER_limpia.log";
// Open the file
$fp = @fopen($filename, 'r'); 

// Add each line to an array
if ($fp) {
   $arrayRequest = explode("\n", fread($fp, filesize($filename)));
}


foreach ($arrayRequest as $key => $string)
{

$connector = new ConnectorTCP($string);
$array = array();

foreach ($servers as $key => $value)
{
        if (!$connector->requestTCP($value))
        {
            $checkAnswer = $connector->returnErrorTCP();
            $this->errorCode = $checkAnswer[0];
            $this->errorMessage = "Error_TCP_request = " . $checkAnswer[1] . " ";
            return false;
        }
        /*
         * Manage the answer and check Mandatory
         */
        $answerFromTCP = $connector->returnAnswerTCP();
        $array[$key] = $answerFromTCP;
        if ($errorPrint)
        {
            print_r($answerFromTCP);

        }
        
}    
 if ($array[0] == $array[1])
 {
     echo "IGUALES\n";
     echo $string;
     echo "\n";
     echo "V8 ";
     echo $array[0];
     echo "\n";
     echo "V9 ";
     echo $array[1];
     echo "\n";
     echo "#####################################\n";
 }
 else
 {
     echo "DIFERENTES\n";
     echo $string;
     echo "\n";
     echo "V8 ";
     echo $array[0];
     echo "\n";
     echo "V9 ";
     echo $array[1];
     echo "\n";
          echo "#####################################\n";

 }
 
}



class ConnectorTCP
{

    private $string;
    public static $answer;
    private $errorCode;
    private $errorMessage;
    public static $arrayError;

    public function getErrorCode()
    {
        return $this->errorCode;
    }

    public function getError()
    {
        return $this->errorMessage;
    }

    function __construct($string)
    {
        $this->string = $string;
    }

    Public function requestTCP($server)
    {
        //$server = "10.211.55.3";
        $errorPrint = true;
        $port = 8003;
        $timeout = 3000;
        $debug = false;
        set_time_limit(0); //TIMEOUT into receive
        ini_set("default_socket_timeout", "3"); //TIMEOUT into send
        //Server Method $serverMethods 'unique', 'random' & 'roundrobin'
        $serverMethods = 'unique';


        $seconds = 3;
        $var = $this->string;
        //$message = "PSFILTER |$var\r\n";
        $message = "$var\r\n";
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
                self::$arrayError = [$this->errorCode, $this->errorMessage, $server, $port];
                return false;
            }
            usleep(100);
            $attempts++;
        }
//        if (!socket_connect($socket, $server, $port)) {
//            if ($debug) {
//                $this->errorCode = socket_last_error();
//                $this->errorMessage = socket_strerror($this->errorCode);
//            }
//            return false;
//        }
//        if ($debug) {
//            echo "Connection established \n";
//        }
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

//        while ($buf = socket_read($socket, 2048000, PHP_NORMAL_READ)) {
//            if ($debug) {
//                echo "Answer from server: $buffer";
//            }
//            break;
//        }
        //Connect socket to remote server PHP_BINARY_READ
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
        //IF NEED QUIT TO CLOSE SOCKET ENABLE IT
        /*
          $message = "QUIT\r\n";
          if( !socket_send ( $socketet , $message , strlen($message) , 0))
          {
          $errorcode = socket_last_error();
          $errormsg = socket_strerror($errorcode);

          die("Could not send data: [$errorcode] $errormsg \n");
          } else {
          if ($debug) echo "Message QUIT send successfully \n";
          }
         */
        socket_close($socket);
        self::$answer = $buf;
        unset($message, $server, $port, $seconds, $debug, $socket, $buffer, $var, $len, $string, $buf);
        return true;
    }

    public function returnAnswerTCP()
    {
        return self::$answer;
    }

    public function returnErrorTCP()
    {
        return self::$arrayError;
    }

    public function __destruct()
    {
        
    }

}

