<?php

namespace Second;

ini_set('memory_limit', '-1');
//var_dump($argv);
//INCLUDE LIKE $platform value these differents options 'dev|test|prod'
$platform = 'dev';
$includeConfigFile = '../config/' . $platform . '/config.php';
include_once $includeConfigFile;

require 'output/HotelStaticData.php';
require 'output/ImageData.php';
require 'output/RoomTypeStaticData.php';
require 'output/TransportationData.php';
require 'output/RoomInfo.php';

////require 'input/StaticInput.php';
////require 'input/ReturnHotelStaticData.php';
////require 'input/ReturnRoomTypeStaticData.php';
////require 'input_demo/StaticInput.php';
////require 'input_demo/ReturnHotelStaticData.php';
////require 'input_demo/ReturnRoomTypeStaticData.php';
//require 'input_demo_from_Client/StaticInput.php';
//require 'input_demo_from_Client/ReturnHotelStaticData.php';
//require 'input_demo_from_Client/ReturnRoomTypeStaticData.php';
if (isset($argv[1]))
{
    require $argv[1];
} else
{
    require 'classFromPartner_Demo_jiraWPS86.php';
}
//require 'classFromPartner_Demo_jiraWPS28.php';

/*
 * Class to translate objest attributes in a string to request information from DAEMON Server.
 *  2016
 * 
 * Enterprise MULTINUCLEO.COM
 * Created by Walter Lopez Pascual
 */
/*
 * CLASS FROM PARTNER INCLUDE ALL THE OBJETS THAT WE NEED.
 * In this case you need change this require by the files with your objets attributes.
 * You can use the differents source objets files for differents requests (by PARIS, DUBAI or DEMO)
 */


//ERROR REPORTING TO FILE only in Test

if ($platform == 'test')
{
    error_reporting(E_ALL);
    ini_set("log_errors", 1);
    ini_set("error_log", "logs/errors.log");
}

class run
{

    private $errorCode;
    private $errorMessage;
    private $errorPrint;

    public function getErrorCode()
    {
        return $this->errorCode . "\n";
    }

    public function getError()
    {
        return $this->errorMessage . "\n";
    }

    function managerSupplierRequest(\Hotel\StaticData\StaticInput $inputObj)
    {
        $aStaticInput = $inputObj;
        $aReturnHotelStaticData = $inputObj->ReturnHotelStaticData;
        $aReturnRoomTypeStaticData = $inputObj->ReturnRoomTypeStaticData;
        $aReturnRateData = $inputObj->ReturnRateData; // NEW ATTRIBUTE
        $errorPrint = true; //detail output 

        $classCheck = new \Second\Check();
        /*
         * Check Mandatory and type attributes from all the objets needed.
         */
        if (!$classCheck->mandatoryTypeStaticInput($aStaticInput))
        {
            $this->errorCode = "1";
            $this->errorMessage = "Error_Input_Values";
            return false;
        }
        if (!$classCheck->mandatoryTypeReturnHotelStaticData($aReturnHotelStaticData))
        {
            $this->errorCode = "2";
            $this->errorMessage = "Error_Hotel_Static_Data_Values";
            return false;
        }
        if (isset($aReturnRoomTypeStaticData))
        {
            if (!$classCheck->mandatoryTypeReturnRoomTypeStaticData($aReturnRoomTypeStaticData))
            {
                $this->errorCode = "3";
                $this->errorMessage = "Error_Return_Room_Type_Data_Values";
                return false;
            }
        }
        /*
         * Create an Instance of CONSTRUCTOR and give all the objets needed it
         */
        if ($errorPrint)
        {
            echo "\n\r# INPUT OBJECT CREATED #\n\r";
            var_export($aStaticInput);
            echo "\n\r###\n\r";
        }
        //var_export($aStaticInput);
        $contructor = new \Second\Constructor($aStaticInput, $aReturnHotelStaticData, $aReturnRoomTypeStaticData, $aReturnRateData);
        /*
         * Join all the attributes from all the objets in a simple array
         */
        $contructor->insertVar();
        /*
         * Convert all the Booleans values to "Y" or "N"
         */
        $contructor->convertToBool();
        /*
         * Create the string that need the DAEMON Server
         */
        $string = $contructor->convertRequestArrayToString(array("|", ",", "~", "#"), $contructor->returnArray());
        /*
         * Create an Instance of ConnectorTCP and give the var for connection
         */
        if ($errorPrint)
        {
            echo "\n\r# STRING LINE CREATED #\n\r";
            echo "HOTELDATAREQUEST |";
            print_r($string);
            echo "\n\r###\n\r";
        }
        $connector = new \Second\ConnectorTCP($string);
        /*
         * Send the String to the DAEMON Server
         */
        if (!($connector->requestTCP()))
        {
            $checkAnswer = $connector->returnErrorTCP();
            $this->errorCode = $checkAnswer[0];
            $this->errorMessage = "Error_TCP_request = " . $checkAnswer[1] . " ";

            return false;
        }
        /*
         * Manage the answer and check Mandatory and type
         */
        $answerFromTCP = $connector->returnAnswerTCP();
        if ($errorPrint)
        {
            echo "\n\r# ANSWER FROM DAEMON #\n\r";
            print_r($answerFromTCP);
            echo "\n\r###\n\r";
        }

        /*
         * Check correct answer form
         */

        $checkAnswer = $classCheck->answer($answerFromTCP);
        if ($checkAnswer == true)
        {
            /*
             * If we have answer and the mandatory value and type are correct
             * we fill the array to answer
             */
            if ($errorPrint)
            {
                echo "\n\r# PASS ANSWER CHECK #\n\r";
                echo "\n\r###\n\r";
            }
            $mngAnswer = new \Second\AnswerTreatment();
//            if (!$mngAnswer->distributeValues($answerFromTCP)) {
//                return false;
//            }
            $array_HotelCode = $contructor->returnArray();

            if ($mngAnswer->distributeValues($answerFromTCP, $array_HotelCode))
            {
                if ($errorPrint)
                {
                    echo "\n\r# PASS DISTRIBUTE VALUES #\n\r";
                    echo "\n\r###\n\r";
                }
                return $mngAnswer::$answerStatic;
                unset($mngAnswer::$answerStatic);
            } else
            {
                if ($errorPrint)
                {
                    echo "\n\r# ERROR NOT DISTRIBUTE VALUES #\n\r";
                    echo "\n\r###\n\r";
                }
            }
        } else
        {
            $this->errorCode = '0';
            $this->errorMessage = $checkAnswer;
            return false;
        }
        /*
         * Answer in a return or send FALSE in error.
         */
        unset($mngAnswer, $mngAnswer::$answerStatic, $array_HotelCode, $checkAnswer, $aReturnHotelStaticData, $aReturnRoomTypeStaticData, $aStaticInput, $answerFromTCP, $classCheck, $connector, $contructor, $inputObj, $string);
        return false;
    }

    public function __destruct()
    {
        
    }

}

class Check
{

    public function mandatoryTypeStaticInput(&$data)
    {
        $array = get_object_vars($data);
        $types = array('hotelIds' => 'array', 'LanguageId' => 'integer', 'ReturnHotelStaticData' => 'object', 'ReturnRoomTypeStaticData' => 'object', 'ReturnRateData' => 'object');
        $mandatory = array('hotelIds' => true, 'LanguageId' => true, 'ReturnHotelStaticData' => true, 'ReturnRoomTypeStaticData' => false, 'ReturnRateData' => false);
        foreach ($mandatory as $key => $value)
        {
            if ($value)
            {
                if (!isset($array[$key]))
                {
                    return false;
                }
            }
        }
        foreach ($array as $key => $value)
        {
            if (isset($value) && isset($mandatory[$key]))
            {
                if (gettype($value) != $types[$key])
                {
                    return false;
                }
            }
        }
        unset($array, $data, $key, $mandatory, $types, $value);
        return true;
    }

    public function mandatoryTypeReturnHotelStaticData(&$data)
    {
        $array = get_object_vars($data);
        $mandatory = array('description1' => true, 'description2' => true, 'geoPoints' => true, 'ratingDescription' => true, 'images' => true, 'direct' => true, 'hotelPreference' => true, 'builtYear' => true, 'renovationYear' => true, 'floors' => true, 'noOfRooms' => true, 'luxury' => true, 'address' => true, 'zipCode' => true, 'location' => true, 'locationId' => true, 'location1' => true, 'location2' => true, 'location3' => true, 'stateName' => true, 'stateCode' => true, 'countryName' => true, 'regionName' => true, 'regionCode' => true, 'amenitie' => true, 'leisure' => true, 'business' => true, 'transportation' => true, 'hotelPhone' => true, 'hotelCheckIn' => true, 'hotelCheckOut' => true, 'minAge' => true, 'rating' => true, 'fireSafety' => true, 'geoPoint' => true, 'chain' => true, 'lastUpdated' => true, 'transferMandatory' => false, 'tariffNotes' => false, 'chainName' => false, 'hotelProperty' => false, 'fullAddress' => false,'exclusive' => false);
        foreach ($mandatory as $key => $value)
        {
            if ($value)
            {
                if (!isset($array[$key]))
                {
                    return false;
                }
            }
        }
        foreach ($array as $value)
        {
            if (isset($value))
            {
                if (gettype($value) != 'boolean')
                {
                    return false;
                }
            }
        }
        unset($array, $data, $value);
        return true;
    }

    public function mandatoryTypeReturnRoomTypeStaticData(&$data)
    {
        $array = get_object_vars($data);
        $mandatory = array('twin' => true, 'roomAmenities' => true, 'name' => true, 'roomInfo' => true);
        foreach ($mandatory as $key => $value)
        {
            if ($value)
            {
                if (!isset($array[$key]))
                {
                    return false;
                }
            }
        }
        foreach ($array as $value)
        {
            if (isset($value))
            {
                if (gettype($value) != 'boolean')
                {
                    return false;
                }
            }
        }
        unset($array, $data, $value);
        return true;
    }

    public function answer(&$data)
    {
        $arraypre = explode('|', $data);
        if (preg_match('/OK/', $arraypre[0]))
        {
            $array = array_splice($arraypre, 1);
            foreach ($array as $value)
            {
                $arrayExploded = explode(",", $value);
                if (count($arrayExploded) < 6)
                {
                    $this->errorMessage = "Less_than_6_values_in_answer -> " . $value;
                    return $this->errorMessage;
                }
            }
        } else
        {
            $this->errorMessage = "No_OK_String_in_answer -> " . $data;
            return $this->errorMessage;
        }
        unset($array, $arrayExploded, $value, $data, $arraypre);
        return true;
    }

    public function __destruct()
    {
        
    }

}

class Constructor
{

    Public $aStaticInput;
    Public $aReturnRoomTypeStaticData;
    Public $aReturnHotelStaticData;
    Public static $stringConverted = "";
    Public static $arrayConverted = array('hotelIds' => '', 'LanguageId' => '', 'ReturnHotelStaticData' => '', 'ReturnRoomTypeStaticData' => '');

    function __construct($aStaticInput, $aReturnHotelStaticData = null, $aReturnRoomTypeStaticData = null, $aReturnRateData = null)
    {
        $this->aStaticInput = $aStaticInput;
        $this->aReturnRoomTypeStaticData = $aReturnRoomTypeStaticData;
        $this->aReturnHotelStaticData = $aReturnHotelStaticData;
        $this->aReturnRateData = $aReturnRateData; //I DONT KNOW WHAT DO WITH IT
    }

    public $twin = true; //NO MANDATORY BOOL
    public $roomAmenities = true;
    public $name = true;
    public $roomInfo = true;

    Public function insertVar()
    {
        $aArrayOfReturnHotelStaticData = array('description1' => false, 'description2' => false, 'geoPoints' => false, 'ratingDescription' => false, 'images' => false, 'direct' => false, 'hotelPreference' => false, 'builtYear' => false, 'renovationYear' => false, 'floors' => false, 'noOfRooms' => false, 'luxury' => false, 'address' => false, 'zipCode' => false, 'location' => false, 'locationId' => false, 'location1' => false, 'location2' => false, 'location3' => false, 'stateName' => false, 'stateCode' => false, 'countryName' => false, 'regionName' => false, 'regionCode' => false, 'amenitie' => false, 'leisure' => false, 'business' => false, 'transportation' => false, 'hotelPhone' => false, 'hotelCheckIn' => false, 'hotelCheckOut' => false, 'minAge' => false, 'rating' => false, 'fireSafety' => false, 'geoPoint' => false,'chain' => false, 'lastUpdated' => false, 'transferMandatory' => false, 'tariffNotes' => false, 'chainName' => false, 'hotelProperty' => false, 'fullAddress' => false,'exclusive' => false);
        $aArrayOfReturnHotelStaticDataRoom = array('twin' => false, 'roomAmenities' => false, 'name' => false, 'roomInfo' => false);
        $aStaticInput = get_object_vars($this->aStaticInput);
        $aReturnHotelStaticData = get_object_vars($this->aReturnHotelStaticData);
        if (isset($this->aReturnRoomTypeStaticData))
        {
            $aReturnRoomTypeStaticData = get_object_vars($this->aReturnRoomTypeStaticData);
        }
        $array_need = array();

        foreach ($aStaticInput['hotelIds'] as $key => $value)
        {
            $array_need[$key][] = $key;
            if (is_array($value))
            {
                foreach ($value as $values)
                {
                    $array_need[$key][] = $values;
                }
            } else
            {
                $array_need[$key] = $value;
            }
        }
        self::$arrayConverted['hotelIds'] = $array_need;
        self::$arrayConverted['LanguageId'] = $aStaticInput['LanguageId'];
        //Verify that all the value are provided, if not, include FALSE attribute, and remove extra attributes
        self::insert_value($aArrayOfReturnHotelStaticData, $aReturnHotelStaticData);
        self::$arrayConverted['ReturnHotelStaticData'] = $aArrayOfReturnHotelStaticData;
        //Verify that all the value are provided, if not, include FALSE attribute, and remove extra attributes
        self::insert_value($aArrayOfReturnHotelStaticDataRoom, $aReturnRoomTypeStaticData);
        self::$arrayConverted['ReturnRoomTypeStaticData'] = $aArrayOfReturnHotelStaticDataRoom;
        unset($aReturnHotelStaticData, $aArrayOfReturnHotelStaticData, $aReturnRoomTypeStaticData, $aArrayOfReturnHotelStaticDataRoom, $aStaticInput, $array_need, $key, $value, $values);
        return true;
    }

    //Insert default value FALSE if not provide in input
    Public function insert_value(&$value, &$_arr)
    {
        foreach ($value as $inKey => $inValue)
        {
            if (isset($_arr[$inKey]))
            {
                $value[$inKey] = $_arr[$inKey];
            }
        }
    }

    Public function convertToBool()
    {
        //REPLACE BOOLEANS WITH y AND N
        foreach (self::$arrayConverted as $key => $value)
        {
            if (is_array($value))
            {
                foreach ($value as $keyin => $valuein)
                {
                    if (is_array($valuein))
                    {
                        foreach ($valuein as $keyinin => $valueinin)
                        {
                            $val = $valueinin;
                            if (gettype($val) == 'boolean')
                            {
                                if ($val)
                                {
                                    $val = 'Y';
                                } else
                                {
                                    $val = 'N';
                                }
                                self::$arrayConverted[$key][$keyin][$keyinin] = $val;
                            }
                        }
                    } else
                    {
                        $val = $valuein;
                        if (gettype($val) == 'boolean')
                        {
                            if ($val)
                            {
                                $val = 'Y';
                            } else
                            {
                                $val = 'N';
                            }
                            self::$arrayConverted[$key][$keyin] = $val;
                        }
                    }
                }
            } else
            {
                $val = $value;
                if (gettype($val) == 'boolean')
                {
                    if ($val)
                    {
                        $val = 'Y';
                    } else
                    {
                        $val = 'N';
                    }
                    self::$arrayConverted[$key] = $val;
                }
            }
        }
        unset($key, $keyin, $keyinin, $val, $value, $valuein, $valueinin);
        return true;
    }

    Public function returnArray()
    {
        return self::$arrayConverted;
    }

    //INCLUDE IN GLUES THE SIGN TO SEPARATE VALUES by EXAMPLE array("|",",","~","#")
    public static function convertRequestArrayToString(array $glues, array $array)
    {
        $out = "";
        $g = array_shift($glues);
        $c = count($array);
        $i = 0;
        foreach ($array as $val)
        {
            if (is_array($val))
            {
                $out .= self::convertRequestArrayToString($glues, $val);
            } else
            {
                $out .= (string) $val;
            }
            $i++;
            if ($i < $c)
            {
                $out .= $g;
            }
        }
        unset($i, $c, $g, $val, $array, $glues);
        return $out;
    }

    Public function returnString()
    {
        return self::$stringConverted;
    }

    public function __destruct()
    {
        
    }

}

/*
 * MEMCACHE SERVER CLUSTER ROND ROBIN
 */

class MemCacheServerCluster
{

    static $key = 'multinucleo'; // KEY TO SAVE THE OBJECT IN MEMORY
    static $memcachehost = 'localhost'; // HOST WHERE WE HAVE THE MEMCACHE SERVER
    static $memcacheport = 10000; //PORT WHERE IS LISTEN THE MEMCACHE
    static $timeoutMemCache = 10; // TIME TO FLUSH ALL THE MEMORY IF DONT HAVE REQUEST
    static $fail = 3; //QUANTITY OF FAILS BEFORE TO PUT IN DISABLE
    private $debug = false;

    public static function getServerCluster()
    {
        $memcache = new \Memcache;
        $memcache->connect(self::$memcachehost, self::$memcacheport);
        $key = self::$key;
        $cache_result = $memcache->get($key);

        if ($cache_result)
        {
            $server_result = $cache_result;
        } else
        {
            $server_result = ServersCluster::$hostsPort;
            $memcache->set($key, $server_result, MEMCACHE_COMPRESSED, self::$timeoutMemCache);
        }
        return $server_result;
    }

    private static function setServerCluster($array)
    {
        $memcache = new \Memcache;
        $memcache->connect(self::$memcachehost, self::$memcacheport);
        $key = self::$key; // Unique Words
        return (true) ? $memcache->set($key, $array, MEMCACHE_COMPRESSED, self::$timeoutMemCache) : false;
    }

    public static function getServerRoundRobin($array)
    {
        //var_dump($array);
        array_push($array, array_shift($array));
        $serverPosition = 0;
        //var_dump($array[$serverPosition]);
        if ($array[$serverPosition][2] === 'ENABLED')
        {
            if (!self::checkServer($array))
            {
                $array = self::getServerRoundRobin($array);
            }
        }

        if ($array[$serverPosition][3] <= self::$fail and $array[$serverPosition][2] === 'ENABLED')
        {
            self::setServerCluster($array);
            return $array;
        } else
        {
            $array = self::getServerRoundRobin($array);
            return $array;
        }
    }

//    public static function checkServers(&$array) {
//        foreach ($array as $key => $host) {
//            $connection = @fsockopen($host[0], $host[1]);
//            if (is_resource($connection)) {
//                fclose($connection);
//                $array[$key][3] = 0;
//                self::setServerCluster($array);
//                return true;
//            } else {
//                $array[$key][3] ++;
//                self::setServerCluster($array);
//                return false;
//            }
//        }
//    }

    public static function checkServer(&$array)
    {
        $connection = @fsockopen("tcp://" . $array[0][0], $array[0][1], $errno, $errstr, 1);
        if (is_resource($connection))
        {
            @fclose($connection);
            $array[0][3] = 0;
            self::setServerCluster($array);
            return true;
        } else
        {
            $array[0][3] ++;
            self::setServerCluster($array);
            return false;
        }
    }

}

/*
 * NO MEMCACHE SERVER CLUSTER RANDOM
 */

class NoMemCacheServerCluster
{

    public static function getServerUnique()
    {
        $array = \ServersCluster::$hostsPort;
        $allfail = sizeof($array) * 2;
        $trying = 0;
        foreach ($array as $value)
        {
            if ($value[2] !== 'DISABLED')
            {
                if (self::checkServerOne($value))
                {
                    $serverPort = [$value[0], $value[1]];
                    return $serverPort;
                }
            }
            $trying++;
            if ($trying >= $allfail)
                return false;
        }
        return false;
    }

    public static function getServerRand()
    {
        $array = \ServersCluster::$hostsPort;
        $serverPosition = rand(0, sizeof($array) - 1);
        $allfail = sizeof($array) * 2;
        $trying = 0;
        while ($array[$serverPosition][2] === 'DISABLED')
        {
            $serverPosition = rand(0, sizeof($array) - 1);
            $trying++;
            if ($trying >= $allfail)
                return false;
        }
        while (!self::checkServerOne($array[$serverPosition]))
        {
            $serverPosition = rand(0, sizeof($array) - 1);
            $trying++;
            if ($trying >= $allfail)
                return false;
        }
        $serverPort = [$array[$serverPosition][0], $array[$serverPosition][1]];
        //var_dump($serverPort);
        return $serverPort;
    }

    public static function checkServerOne(&$array)
    {
        $connection = @fsockopen("tcp://" . $array[0], $array[1], $errno, $errstr, 1);
        if (!$connection)
        {
            return false;
        } else
        {
            @fclose($connection);
            return true;
        }
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

    Public function requestTCP()
    {
        $timeout = 60000;
        $debug = false;
        set_time_limit(0); //TIMEOUT into receive
        ini_set("default_socket_timeout", "60"); //TIMEOUT into send
        //Server Method $serverMethods 'unique', 'random' & 'roundrobin'
        $serverMethods = 'unique';


        if ($serverMethods == 'unique')
        {
//ONLY ONE SERVER
            if (!($serverPort = NoMemCacheServerCluster::getServerUnique()))
            {
                self::$arrayError = ['666', 'NO SERVERS ALIVE'];
                return false;
            } else
            {
                $server = $serverPort[0];
                $port = $serverPort[1];
            }
//            $serverPort = \ServersCluster::$hostsPort;
//            $server = $serverPort[0][0];
//            $port = $serverPort[0][1];
        } else if ($serverMethods == 'random')
        {
//RANDOM SERVERS
            if (!($serverPort = NoMemCacheServerCluster::getServerRand()))
            {
                self::$arrayError = ['666', 'NO SERVERS ALIVE'];
                return false;
            } else
            {
                //$serverPort = NoMemCacheServerCluster::getServerRand();
                $server = $serverPort[0];
                $port = $serverPort[1];
            }
        } else if ($serverMethods == 'roundrobin')
        {
//ROUND ROBIN SERVERS
            $serverPort = MemCacheServerCluster::getServerRoundRobin(MemCacheServerCluster::getServerCluster());
            $server = $serverPort[0][0];
            $port = $serverPort[0][1];
        } else
        {
            $this->errorCode = 001;
            $this->errorMessage = 'No server method configured \n\r';
            return false;
        }
        $seconds = 3;
        $var = $this->string;
        $message = "HOTELDATAREQUEST |$var\r\n";
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
        socket_set_option($socket, SOL_SOCKET, SO_SNDTIMEO, array('sec' => 60, 'usec' => 0));
        socket_set_option($socket, SOL_SOCKET, SO_RCVTIMEO, array('sec' => 60, 'usec' => 0));

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
            usleep(1000);
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
        //Connect socket to remote server
        $buf = NULL;
        while (true)
        {
            if (false == ($buffer = @socket_read($socket, 41943040, PHP_BINARY_READ)))
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

class AnswerTreatment
{

    public static $answerStatic = null;
    public static $HotelStaticData;
    public static $ImageData;
    public static $RoomInfo;
    public static $RoomTypeStaticData;
    public static $TransportationData;
    public static $types = array('string', 'string', 'string', 'string', 'boolean', 'string', 'boolean', 'integer', 'integer', 'integer', 'integer', 'boolean', 'string', 'string', 'string', 'string', 'integer', 'string', 'string', 'string', 'string', 'integer', 'string', 'integer', 'string', 'integer', 'string', 'integer', 'array', 'array', 'array', 'string', 'integer', 'integer', 'integer', 'integer', 'boolean', 'integer', 'string', 'array', 'array', 'array', 'integer', 'string', 'string', 'integer', 'integer');
    public static $Labels = array('description1', 'description2', 'geoPoint', 'ratingDescription', 'direct', 'hotelPreference', 'preferred', 'builtYear', 'renovationYear', 'floors', 'noOfRooms', 'luxury', 'hotelName', 'address', 'zipCode', 'location', 'locationId', 'location1', 'location2', 'location3', 'cityName', 'cityCode', 'stateName', 'stateCode', 'countryName', 'countryCode', 'regionName', 'regionCode', 'amenitie', 'leisure', 'business', 'hotelPhone', 'hotelCheckIn', 'hotelCheckOut', 'minAge', 'rating', 'fireSafety', 'chain', 'lastUpdated', 'images', 'RoomTypeStaticDataList', 'transportation', 'transferMandatory', 'tariffNotes', 'chainName', 'hotelProperty', 'hotelIdentifier');
    public static $LabelsImagesTypes = array('string', 'string', 'integer', 'string', 'integer');
    public static $LabelsImages = array('thumb', 'alt', 'category', 'url', 'roomTypeId');
    public static $LabelsTransportationTypes = array('integer', 'string', 'integer', 'integer', 'integer', 'string');
    public static $LabelsTransportation = array('Type', 'Name', 'Dist', 'DistanceUnit', 'DistTime', 'Directions');
    public static $LabelsRoomInfoTypes = array('maxOccupancy' => 'integer', 'maxAdultWithChildren' => 'integer', 'minChildAge' => 'integer', 'maxChildAge' => 'integer', 'maxAdult' => 'integer', 'maxExtraBed' => 'integer', 'maxChildren' => 'integer', 'children' => 'integer');
    public static $LabelsRoomInfo = array('maxOccupancy', 'maxAdultWithChildren', 'minChildAge', 'maxChildAge', 'maxAdult', 'maxExtraBed', 'maxChildren', 'children');
    public static $LabelsRoomTypeStaticDataTypes = array('roomTypeID' => 'integer', 'twin' => 'boolean', 'roomAmenities' => 'array', 'name' => 'string', 'roomInfo' => 'array');
    public static $LabelsRoomTypeStaticData = array('roomTypeID', 'twin', 'roomAmenities', 'name', 'roomInfo');

    public function distributeValues($data, $index = NULL)
    {
        self::$answerStatic = array();
        $errorPrint = false;
        if ($errorPrint)
        {
            echo "\n\r# 1st STEP DISTRIBUTE VALUES #\n\r";
            echo "\n\r###\n\r";
        }
        $array_need = array();
        $stringarray = explode("|||", $data);
        /*
         * Check if the ARRAY have information
         */
        if (count($stringarray) < 2)
        {
            if ($errorPrint)
            {
                echo "\n\r# ERROR OF ANSWER#\n\r";
                echo "\n\r###\n\r";
            }
            return true;
        }

        /*
         * SPLICE THE OK VALUE FROM THE ARRAY
         */
        $array = array_splice($stringarray, 1);
        /*
         * Separate in information packets of each hotel
         */

        foreach ($array as $key => $value)
        {

//            echo "######\r\n";
//            var_export($value);
//                echo "\r\n";
            if ($errorPrint)
            {
                echo "\n\r# 2dn STEP DISTRIBUTE VALUES #\n\r";
                echo "\n\r###\n\r";
            }
            $valuefinal = explode("-[-", $value);
            $indexFromLastValue = trim($valuefinal[46], "\t\n\r\0\x0B"); //Sanitize HOTEL INDEX
//            echo "#######\n\r";
//            var_export($valuefinal);
//            echo "#######\n\r";
            unset($valuefinal[46]); //Remove HOTEL INDEX, to use like ARRAY INDEX
            $hotelStaticData = new \Hotel\StaticData\HotelStaticData();
            for ($x = 0; $x < count($key); $x++)
            {

                /*
                 * Check Mandatory values
                 */
                if ($valuefinal[6] === NULL or $valuefinal[12] === NULL or $valuefinal[20] === NULL or $valuefinal[21] === NULL or $valuefinal[25] === NULL)
                {
                    echo "VALUE MANDATORY NO SET\n\r";
                    return false;
                }
                /*
                 * REMOVE "\r\n" from the last value
                 */
                //$valuefinal[44] = trim($valuefinal[44], "\t\n\r\0\x0B");
                /*
                 * Management object HOTELSTATICDATA
                 */
                for ($i = 0; $i < count($valuefinal); $i++)
                {
                    $var = self::$Labels[$i];
                    $type = self::$types[$i];

                    //CHECK if is array of ~
                    if ($type == 'array')
                    {
                        $array1 = explode("-~-", $valuefinal[$i]);
                        if (isset($array1) and $array1[0] != "")
                        {
                            $hotelStaticData->$var = $array1;
                        } else
                        {
                            $hotelStaticData->$var = array();
                        }
                    } elseif ($type == 'integer')
                    {
                        if (isset($valuefinal[$i]) and $valuefinal[$i] != '')
                        {
                            $hotelStaticData->$var = (int) $valuefinal[$i];
                        } else
                        {
                            $hotelStaticData->$var = 0;
                        }
                    } elseif ($type == 'string')
                    {
                        if (isset($valuefinal[$i]))
                        {
                            if ($valuefinal[$i] == '0,0')
                            {
                                $valuefinal[$i] = '';
                            }
                            if ($var == 'hotelPreference')
                            {
                                $hotelStaticData->$var = NULL;
                            } elseif ($var == 'description1' || $var == 'tariffNotes' || $var == 'address')
                            {
                                /* CORRECT THE TRANSLATION OF CRETURN */
                                $hotelStaticData->$var = self::translateSimilsAnswerData($valuefinal[$i]);
                            } else
                            {
                                /*
                                 * Translate symbolsData to symbols
                                 * 
                                 */

                                if ($valuefinal[$i] != '')
                                {
//                                    echo "\n\r###---##\n\r";
//                                    var_export($valuefinal[$i]);
//                                    echo "\n\r###----##\n\r";
                                    $hotelStaticData->$var = $valuefinal[$i]; //self::translateSimilsAnswerData($valuefinal[$i]);
                                } else
                                {
                                    $hotelStaticData->$var = '';
                                }
                            }
                        } else
                        {
                            $hotelStaticData->$var = '';
                        }
                    } elseif ($type == 'boolean')
                    {
                        if (isset($valuefinal[$i]) and $valuefinal[$i] != '')
                        {
                            if ($valuefinal[$i] == 'Y' or $valuefinal[$i] == '1')
                            {
                                $valuefinal[$i] = true;
                            } else
                            {
                                $valuefinal[$i] = false;
                            }
                        }

                        $hotelStaticData->$var = $valuefinal[$i];
                    } else
                    {
                        if (isset($valuefinal[$i]) and $valuefinal[$i] != '')
                        {
                            $hotelStaticData->$var = $valuefinal[$i];
                        }
                    }
                    //}
                    unset($array1);
                }
            }
            /*
             * Management object IMAGES
             */
            if (isset($hotelStaticData->images) and is_array($hotelStaticData->images))
            {
                $arrayImage = array();
//                echo "\n\r###---##\n\r";
//                var_export($hotelStaticData->images);
//                echo "\n\r###----##\n\r";
                if (is_array($hotelStaticData->images))
                {
                    foreach ($hotelStaticData->images as $keyIn => $valueIn)
                    {
                        $imageData = new \Hotel\StaticData\ImageData();
                        $array1 = explode("-#-", $valueIn);
                        foreach ($array1 as $keyInIn => $valueInIn)
                        {
                            $labelImage = self::$LabelsImages[$keyInIn];
                            if (self::$LabelsImagesTypes[$keyInIn] == 'string' && $labelImage == 'alt')
                            {
                                $imageData->$labelImage = self::translateSimilsAnswerData($valueInIn);
                            } else
                            {
                                $imageData->$labelImage = $valueInIn;
                            }
                        }
                        $arrayImage[] = $imageData;
                    }
                } else
                {
                    $imageData = new \Hotel\StaticData\ImageData();
                    $array1 = explode("-#-", $valueIn);
                    foreach ($array1 as $keyInIn => $valueInIn)
                    {
                        $labelImage = self::$LabelsImages[$keyInIn];
                        if (self::$LabelsImagesTypes[$keyInIn] == 'string' && $labelImage == 'alt')
                        {
                            $imageData->$labelImage = self::translateSimilsAnswerData($valueInIn);
                        } else
                        {
                            $imageData->$labelImage = $valueInIn;
                        }
                    }
                    $arrayImage[] = $imageData;
                }
                $hotelStaticData->images = $arrayImage;
                unset($imageData, $valueInIn, $keyInIn, $valueIn, $keyIn, $arrayImage);
            }
            /*
             * Management object Transportation
             */

            if (isset($hotelStaticData->transportation))
            {
                $arrayTransportation = array();
                if (is_array($hotelStaticData->transportation))
                {
                    foreach ($hotelStaticData->transportation as $keyIn => $valueIn)
                    {
                        $transportationData = new \Hotel\StaticData\TransportationData();
                        $array1 = explode("-#-", $valueIn);
                        foreach ($array1 as $keyInIn => $valueInIn)
                        {
                            $labelTransportation = self::$LabelsTransportation[$keyInIn];
                            if ($valueInIn != '')
                            {
                                if (self::$LabelsTransportationTypes[$keyInIn] == 'string')
                                {
//                                    echo "\n\r###---##\n\r";
//                                    var_export($keyInIn);
//                                    echo "\n\r###----##\n\r";
                                    $transportationData->$labelTransportation = $valueInIn; //self::translateSimilsAnswerData($valueInIn);
                                } else
                                {
                                    $transportationData->$labelTransportation = $valueInIn;
                                }
                            } else
                            {
                                $transportationData->$labelTransportation = '';
                            }
                        }
                        $arrayTransportation[] = $transportationData;
                    }
                    $hotelStaticData->transportation = $arrayTransportation;
                } else
                {
                    $transportationData = new \Hotel\StaticData\TransportationData();
                    $array1 = explode("-#-", $hotelStaticData->transportation);
                    foreach ($array1 as $keyInIn => $valueInIn)
                    {
                        $labelTransportation = self::$LabelsTransportation[$keyInIn];
                        if ($valueInIn != '')
                        {
                            if (self::$LabelsTransportationTypes[$keyInIn] == 'string')
                            {
//                                echo "\n\r###---##\n\r";
//                                var_export($keyInIn);
//                                echo "\n\r###----##\n\r";
                                $transportationData->$labelTransportation = $valueInIn; //self::translateSimilsAnswerData($valueInIn);
                            } else
                            {
                                $transportationData->$labelTransportation = $valueInIn;
                            }
                        } else
                        {
                            $transportationData->$labelTransportation = '';
                        }
                    }
                    $arrayTransportation[] = $transportationData;
                    $hotelStaticData->transportation = $arrayTransportation;
                }
                unset($valueInIn, $keyInIn, $valueIn, $keyIn);
            } else
            {
                $hotelStaticData->transportation = array();
            }



            /*
             * Management object LastUpdate
             */
            if (isset($hotelStaticData->lastUpdated) and $hotelStaticData->lastUpdated != '')
            {
                $hotelStaticData->lastUpdated = gmdate("Y-m-d H:i:s", $hotelStaticData->lastUpdated);
            }

            /*
             * Management object RoomTypeStaticDataList and the internal objects RoomINFO
             */

            if (isset($hotelStaticData->RoomTypeStaticDataList) and is_array($hotelStaticData->RoomTypeStaticDataList))
            {
                $arrayRoomTypeStatic = array();
                $arrayRoomTypeCode = array();
                foreach ($hotelStaticData->RoomTypeStaticDataList as $keytr => $valuetr)
                {
                    $roomTypeStaticData = new \Hotel\StaticData\RoomTypeStaticData;
                    if (preg_match('/-#-/', $valuetr))
                    {
                        $array1 = explode("-#-", $valuetr);
                        $roomInfo = new \Hotel\StaticData\RoomInfo();

                        foreach ($array1 as $keyIn => $valueIn)
                        {
                            //Obtain the label for the room data
                            $labelRoom = self::$LabelsRoomTypeStaticData[$keyIn];
                            if ($keyIn == 0)
                            {
                                $arrayRoomTypeCode[] = $valueIn;
                            }
                            //ROOM INFO save and order.

                            if (preg_match('/-{-/', $valueIn))
                            {
                                if ($labelRoom == 'roomInfo')
                                {
                                    $arrayIn = explode("-{-", $valueIn);
                                    foreach ($arrayIn as $keytri => $valuetri)
                                    {
                                        $labelRoomInfo = self::$LabelsRoomInfo[$keytri];
                                        if (isset($valuetri))
                                        {
                                            //$labelRoomInfo = self::$LabelsRoomInfo[$keytri];


                                            if ($labelRoomInfo == 'maxExtraBed')
                                            {
                                                if ($valuetri == 'Y')
                                                {
                                                    $roomInfo->$labelRoomInfo = true;
                                                } else if ($valuetri == 'N')
                                                {
                                                    $roomInfo->$labelRoomInfo = false;
                                                } else
                                                {
                                                    $roomInfo->$labelRoomInfo = NULL;
                                                }
                                            } else
                                            {
                                                $roomInfo->$labelRoomInfo = (int) $valuetri; //(int)
                                            }
                                            //$labelRoom = self::$LabelsRoomTypeStaticData[$keyIn];
                                            $roomTypeStaticData->$labelRoom = $roomInfo;
                                        }
                                    }
                                } else
                                {
                                    //$arrayIn = array_map('intval', explode('{', $valueIn));
                                    $arrayIn = array_map(null, explode("-{-", $valueIn));
                                    //$labelRoom = self::$LabelsRoomTypeStaticData[$keyIn];
                                    $roomTypeStaticData->$labelRoom = $arrayIn;
                                }
                            } else
                            {
                                //Convert and save booleans
                                if (self::$LabelsRoomTypeStaticDataTypes[$labelRoom] == 'boolean')
                                {
                                    if (isset($valueIn))
                                    {
                                        if ($valueIn == 'Y' or $valueIn == '1')
                                        {
                                            $valueIn = true;
                                        } else
                                        {
                                            $valueIn = false;
                                        }
                                    } else
                                    {
                                        $valueIn = NULL;
                                    }
                                    $roomTypeStaticData->$labelRoom = $valueIn;

                                    //Convert and save array
                                } elseif (self::$LabelsRoomTypeStaticDataTypes[$labelRoom] == 'array')
                                {
                                    if (isset($valueIn) and $valueIn != "")
                                    {
                                        //$labelRoom = self::$LabelsRoomTypeStaticData[$keyIn];
                                        $roomTypeStaticData->$labelRoom = array($valueIn);
                                    } else
                                    {
                                        //$labelRoom = self::$LabelsRoomTypeStaticData[$keyIn];
                                        $roomTypeStaticData->$labelRoom = array();
                                    }
                                } elseif (self::$LabelsRoomTypeStaticDataTypes[$labelRoom] == 'string')
                                {
                                    //$labelRoom = self::$LabelsRoomTypeStaticData[$keyIn];
                                    if (isset($valueIn) && $valueIn != '')
                                    {
//                                        echo "\n\r###---##\n\r";
//                                        var_export($labelRoom);
//                                        echo "\n\r###----##\n\r";
                                        $roomTypeStaticData->$labelRoom = $valueIn; //self::translateSimilsAnswerData($valueIn);
                                    } else
                                    {
                                        $roomTypeStaticData->$labelRoom = '';
                                    }
                                } else
                                {
                                    if ($labelRoom != 'roomTypeID')
                                    {
                                        //$labelRoom = self::$LabelsRoomTypeStaticData[$keyIn];
                                        $roomTypeStaticData->$labelRoom = $valueIn;
                                    }
                                }
                            }

                            foreach ($roomTypeStaticData as $keyRTSD => $valueRTSD)
                            {
                                if (Constructor::$arrayConverted['ReturnRoomTypeStaticData'][$keyRTSD] == 'N')
                                {
                                    $roomTypeStaticData->$keyRTSD = NULL;
                                }
                            }
                            $arrayRoomTypeStatic[$array1[0]] = $roomTypeStaticData;
                        }
                    } else
                    {
                        echo "INCORRECT ROOMTYPESTATICDATALIST\n\r";
                        return false;
                    }
                }

                $hotelStaticData->RoomTypeStaticDataList = $arrayRoomTypeStatic;
            }


////            ORDER FROM INDEX_HOTELCODE, include like index the HOTELIDS in each case. 
//            if (isset($index["hotelIds"][$key])) {
//                $arrayKeys = $index["hotelIds"];
//                ksort($hotelStaticData->RoomTypeStaticDataList);
//            } else {
//                $arrayKeys = array_keys($index["hotelIds"]);
//                ksort($hotelStaticData->RoomTypeStaticDataList);
//            }





            if (Constructor::$arrayConverted['ReturnRoomTypeStaticData']['twin'] == 'N' and Constructor::$arrayConverted['ReturnRoomTypeStaticData']['roomAmenities'] == 'N' and Constructor::$arrayConverted['ReturnRoomTypeStaticData']['name'] == 'N' and Constructor::$arrayConverted['ReturnRoomTypeStaticData']['roomInfo'] == 'N')
            {
                $hotelStaticData->RoomTypeStaticDataList = array();
            }

            foreach ($hotelStaticData as $keyHSD => $valueHSD)
            {
                if (isset(Constructor::$arrayConverted['ReturnHotelStaticData'][$keyHSD]))
                {
                    if (Constructor::$arrayConverted['ReturnHotelStaticData'][$keyHSD] == 'N')
                    {
                        $hotelStaticData->$keyHSD = NULL;
                    }
                }
            }


            self::$answerStatic[$indexFromLastValue] = $hotelStaticData;
            unset($key, $hotelStaticData);
        }

        unset($key, $x, $arrayTransportation, $arrayRoomTypeCode, $arrayKeys, $hotelStaticData, $keyHSD, $valueHSD, $keytr, $valuetr, $valueIn, $array_need, $labelRoomInfo, $roomInfo, $array, $array1, $labelRoom, $data, $i, $arrayImage, $arrayIn, $arrayRoomTypeStatic, $hotelStaticData, $roomTypeStaticData, $transportationData, $labelTransportation);
        return true;
    }

    //Function to translate characters from codes
    public function translateSimilsAnswerData($data)
    {
        return str_replace("CRETURN", "\n", $data);
    }

    public function returnAnswerStatic()
    {
        return self::$answerStatic;
    }

    public function __destruct()
    {
        
    }

}
