<?php

namespace First;
ini_set('memory_limit', '-1');
//INCLUDE LIKE $platform value these differents options 'dev|test|prod'
/*
 * test = localhost
 * dev = virtualServer
 * prod = production IP
 */
$platform = 'dev';
$includeConfigFile = '../config/' . $platform . '/config.php';
include_once $includeConfigFile;

//List of Channel Manager codes 
class ArrayChannelCodes {
    public static $array_of_channel_manager_codes = array (1000,1010);
}

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
//$memcache = new \Memcache();

/*
 * You need replace this previous require for your objets files
 */
require 'classFromPartner_wps92.php';


if ($platform == 'test')
{
    error_reporting(E_ALL);
    ini_set("log_errors", 1);
    ini_set("error_log", "logs/errors.log");
}

Class Run
{
    /*
     * Function to management all the classes
     * You need declare previously all the attributes and then run this Function to request to server.
     */

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

    public function managerSupplierRequest(\Hotel\PreSupplier\Input &$inputObj)
    {
        $aInput = $inputObj;
        $aRoomOccupancy = $inputObj->RoomOccupancy;
        $aRoomTypeFilters = $inputObj->RoomTypeFilters;
        $aHotelFilters = $inputObj->HotelFilters;
        $aSearchPeriodCriteria = $inputObj->SearchPeriodCriteria;
        $errorPrint = true;
        /*
         * Creation of instance for the Ckeck CLASS.
         */
        $classCheck = new \First\Check();
        /*
         * Check Mandatory and type attributes from all the objets needed.
         */
        //var_export($aInput);
        if (!$classCheck->mandatoryTypeInput($aInput))
        {
            $this->errorCode = "1";
            $this->errorMessage = "Error_Input_Values";
            return false;
        }
        if (!$classCheck->mandatoryTypeRoomOccupancy($aRoomOccupancy))
        {
            $this->errorCode = "2";
            $this->errorMessage = "Error_RoomOccupancy_Values";
            return false;
        }
        if (!$classCheck->mandatoryTypeRoomTypeFilters($aRoomTypeFilters))
        {
            $this->errorCode = "3";
            $this->errorMessage = "Error_RoomTypeFilters_Values";
            return false;
        }
        if (!$classCheck->mandatoryTypeHotelFilters($aHotelFilters))
        {
            $this->errorCode = "4";
            $this->errorMessage = "Error_HotelFilters_Values";
            return false;
        }
        if (!$classCheck->mandatoryTypeSearchPeriodCriteria($aSearchPeriodCriteria))
        {
            $this->errorCode = "5";
            $this->errorMessage = "Error_SearchPeriodCriteria_Values";
            return false;
        }
        
        /*
         * Create an Instance of CONSTRUCTOR and give all the objets needed it
         */
        if ($errorPrint)
        {
            echo "\n\r# INPUT OBJECT CREATED #\n\r";
            var_export($aInput);
            echo "\n\r###\n\r";
        }
        $contructor = new \First\Constructor($aInput, $aRoomOccupancy, $aRoomTypeFilters, $aHotelFilters, $aSearchPeriodCriteria);
        /*
         * Join all the attributes from all the objets in a simple array
         */
        $contructor->insertVar();
        /*
         * Translate all the Booleans values to "Y" or "N"
         */
        $contructor->convertToBool();

        /*
         * Create the string that DAEMON Server need.
         */
        $arrayReturned = $contructor->returnArray();
        $string = $contructor->convertRequestArrayToString(array('|', ',', '~', '#'), $arrayReturned);
        /*
         * Create an Instance of ConnectorTCP and give the String and values for connection
         */
        if ($errorPrint)
        {
            echo "\n\r# STRING LINE CREATED #\n\r";
            echo "PSFILTER |";
            print_r($string);
            echo "\n\r###\n\r";
        }
        $connector = new \First\ConnectorTCP($string);
        /*
         * Send the String to the DAEMON Server
         */
//        if (!($checkAnswer = $connector->requestTCP())) {
//            $this->errorCode = $checkAnswer[0];
//            $this->errorMessage = "Error_TCP_request = " . $checkAnswer[1] . " from server " . $checkAnswer[2] . " and port " . $checkAnswer[3];
//            return false;
//        }

        if (!$connector->requestTCP())
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
        if ($errorPrint)
        {
            echo "\n\r# Answer from DAEMON #\n\r";
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
             * If the mandatory value are correct
             * we fill the array to answer
             */

            $mngAnswer = new \First\fillArrayValues();
            if ($mngAnswer->distributeValues($answerFromTCP) == true)
            {
                return $mngAnswer::$answerStatic;
            }
//             else {
//                $this->errorCode = '0';
//                $this->errorMessage = 'String Answer OK but NO DISPO';
//                return false;
//            }
        } else
        {
            $this->errorCode = '0';
            $this->errorMessage = $checkAnswer;
            return false;
        }
        /*
         * Answer in a return or send False in error.
         */
        return false;
        //return $mngAnswer::$answerStatic;
    }

    public function __destruct()
    {
        
    }

}

/*
 * Class to make all the check that we need before and after to send the string to DAEMON
 */

class Check
{

    private $errorMessage;

    public function getError()
    {
        return $this->errorMessage;
    }

    public function mandatoryTypeInput(&$data)
    {
        $array = get_object_vars($data);
        unset($array['AdditionalFilters']); //DAEMON dont need it attribute
        $types = array('customerId' => 'integer', 'environment' => 'string', 'requestSource' => 'integer','exceptRestrictions' => 'array', 'passengerNationalityOrResidenceProvided' => 'boolean', 'hotelIds' => 'array', 'city' => 'integer', 'country' => 'integer','bookingChannelsWithAutoMapping' => 'array', 'excludedBookingchannel' => 'array', 'bookingChannelTypes' => 'array','activeForRoomCategories' => 'boolean', 'RoomOccupancy' => 'array', 'HotelFilters' => 'object', 'RoomTypeFilters' => 'object', 'AdditionalFilters' => 'array','SearchPeriodCriteria' => 'object');
        $mandatory = array('customerId' => true, 'environment' => true, 'requestSource' => true,'exceptRestrictions' => true, 'passengerNationalityOrResidenceProvided' => true, 'hotelIds' => false, 'city' => false, 'country' => false,'bookingChannelsWithAutoMapping' => false, 'excludedBookingchannel' => false, 'bookingChannelTypes' => false,  'activeForRoomCategories' => false, 'RoomOccupancy' => true, 'HotelFilters' => false, 'RoomTypeFilters' => false, 'AdditionalFilters' => false, 'SearchPeriodCriteria' => true);
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
            if (isset($value))
            {
                if (gettype($value) != $types[$key] and $types[$key] != "null")
                {
                    return false;
                }
            }
        }
        return true;
    }

    public function mandatoryTypeRoomOccupancy(&$data)
    {
        $array = $data;
        $mandatory = array('adults' => true, 'children' => false, 'twin' => false, 'extraBed' => false);
        $types = array('adults' => 'integer', 'children' => 'array', 'twin' => 'boolean', 'extraBed' => 'boolean');
        //print_r($array);
        foreach ($array as $object)
        {
            $valueArray = get_object_vars($object);
            foreach ($mandatory as $key => $value)
            {
                if ($value)
                {
                    if (!isset($valueArray[$key]))
                    {
                        return false;
                    }
                }
            }
            foreach ($valueArray as $key => $value)
            {
                if (isset($value))
                {
                    if (gettype($value) != $types[$key])
                    {
                        return false;
                    }
                }
            }
        }
        return true;
    }

    public function mandatoryTypeRoomTypeFilters(&$data)
    {
        if (isset($data))
        {
            $array = get_object_vars($data);
            $mandatory = array('suite' => false, 'roomAmenitie' => false, 'roomId' => false, 'roomName' => false);
            $types = array('suite' => 'integer', 'roomAmenitie' => 'array', 'roomId' => 'array', 'roomName' => 'string');
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
                if (isset($value))
                {
                    if (gettype($value) != $types[$key])
                    {
                        return false;
                    }
                }
            }
            return true;
        }
        return true;
    }

    public function mandatoryTypeHotelFilters(&$data)
    {
        if (isset($data))
        {
            $array = get_object_vars($data);
            $mandatory = array('rating' => false, 'luxury' => false,
                'location' => false, 'locationId' => false, 'amenitie' => false,
                'leisure' => false, 'business' => false, 'hotelPreference' => false,
                'chain' => false, 'attraction' => false, 'hotelName' => false,
                'builtYear' => false, 'renovationYear' => false, 'floors' => false,
                'noOfRooms' => false, 'fireSafety' => false, 'lastUpdated' => false);
            $types = array('rating' => 'array', 'luxury' => 'integer',
                'location' => 'string', 'locationId' => 'array', 'amenitie' => 'array',
                'leisure' => 'array', 'business' => 'array', 'hotelPreference' => 'array',
                'chain' => 'array', 'attraction' => 'string', 'hotelName' => 'string',
                'builtYear' => 'integer', 'renovationYear' => 'integer', 'floors' => 'integer',
                'noOfRooms' => 'integer', 'fireSafety' => 'integer', 'lastUpdated' => 'string');
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
                if (isset($value))
                {
                    if (gettype($value) != $types[$key])
                    {
                        return false;
                    }
                }
            }
            return true;
        }
        return true;
    }

    
    public function mandatoryTypeSearchPeriodCriteria(&$data)
    {
        if (isset($data))
        {
            $array = get_object_vars($data);
            $mandatory = array('travelFrom' => true, 'travelTo' => true, 'bookingDateTime' => true);
            $types = array('travelFrom' => 'integer', 'travelTo' => 'integer',
                'bookingDateTime' => 'integer');
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
                if (isset($value))
                {
                    if (gettype($value) != $types[$key])
                    {
                        return false;
                    }
                }
            }
            return true;
        }
        return true;
    }

    
    public function answer(&$data)
    {
        if (preg_match('/OK/', $data))
        {
            $arraypre = explode('|||', $data);
            $array = array_splice($arraypre, 1);
            if (count($array) > 0)
            {
                foreach ($array as $value)
                {
                    $arrayExploded = explode(",", $value);
                    if (count($arrayExploded) < 6)
                    {
                        $this->errorMessage = "Less_than_6_values_in_answer -> " . $value;
                        return $this->errorMessage;
                    }
                }
            }
        } else
        {
            $this->errorMessage = "No_OK_String_in_answer -> " . $data;
            return $this->errorMessage;
        }
        return true;
    }

}

/*
 * Class to join all the attributes in a multidimensional array and fill the empty values. To make a compatible string for the DAEMON
 */

class Constructor
{

    private $aInput;
    private $aRoomOccupancy;
    private $aRoomTypeFilters;
    private $aHotelFilters;
    private $aSearchPeriodCriteria;
    public static $arrayConverted = array('customerId' => '', 'environment' => '', 'requestSource' => '', 'passengerNationalityOrResidenceProvided' => '', 'hotelIds' => '', 'city' => '', 'bookingChannelTypes' => '', 'excludedBookingchannel' => '', 'bookingChannelsWithAutoMapping' => '', 'RoomOccupancy' => '', 'HotelFilters' => '', 'RoomTypeFilters' => '', 'SearchPeriodCriteria' => '');

    function __construct($aInput, $aRoomOccupancy, $aRoomTypeFilters = null, $aHotelFilters = null, $aSearchPeriodCriteria = null)
    {
        $this->aInput = $aInput;
        $this->aRoomOccupancy = self::obj2Array($aRoomOccupancy);
        $this->aRoomTypeFilters = $aRoomTypeFilters;
        $this->aHotelFilters = $aHotelFilters;
        $this->aSearchPeriodCriteria = $aSearchPeriodCriteria;
    }

    public function insertVar()
    {
        $aInputArray = get_object_vars($this->aInput);

        /*
         * PROCESSING OF CITY OR COUNTRY INTO THE CITY ATTRIBUTE
         */
        if (isset($aInputArray['city']))
        {
            unset($aInputArray['country']);
        } else if (isset($aInputArray['country']))
        {
            $newValue = (string) $aInputArray['country'];
            $aInputArray['city'] = "c" . $newValue;
            unset($aInputArray['country']);
        } else
        {
            unset($aInputArray['country']);
        }
        
        
        /*
         * ADD 1 TO REQUEST SOURCE TO MAKE COMPATIBLE VALUES WITH DB OF DAEMON
         */
        
        if (isset($aInputArray['requestSource']))
        {
            $newValue = $aInputArray['requestSource'];
            $aInputArray['requestSource'] = $newValue +1;
        } 
        //var_dump($aInputArray);
        /*
         * OTHER ARRAY INCLUSION
         */
        $aRoomOccupancyArray = $this->aRoomOccupancy;
        if (isset($this->aRoomTypeFilters))
        {
            $aRoomTypeFiltersArray = get_object_vars($this->aRoomTypeFilters);
        } else
        {
            $aRoomTypeFiltersArray = null;
        }
        if (isset($this->aHotelFilters))
        {
            $aHotelFiltersArray = get_object_vars($this->aHotelFilters);
            
            if (isset($aHotelFiltersArray["lastUpdated"])){                
                $d = new \DateTime($aHotelFiltersArray["lastUpdated"], new \DateTimeZone('GMT'));
               $aHotelFiltersArray["lastUpdated"]=$d->getTimestamp();
            }
          
        } else
        {
            $aHotelFiltersArray = null;
        }
        
        if (isset($this->aSearchPeriodCriteria))
        {
            $aSearchPeriodCriteriaArray = get_object_vars($this->aSearchPeriodCriteria);
            //TODO:: modificar campos a dates
//            if (isset($aSearchPeriodCriteriaArray["travelFrom"])){                
//                $d = new \DateTime($aSearchPeriodCriteriaArray["travelFrom"], new \DateTimeZone('GMT'));
//               $aSearchPeriodCriteriaArray["travelFrom"]=$d->getTimestamp();
//            }
            if (isset($aSearchPeriodCriteriaArray["travelFrom"])){                
               $aSearchPeriodCriteriaArray["travelFrom"]=$aSearchPeriodCriteriaArray["travelFrom"];
            }
            if (isset($aSearchPeriodCriteriaArray["travelTo"])){                
               $aSearchPeriodCriteriaArray["travelTo"]=$aSearchPeriodCriteriaArray["travelTo"];
            }
            if (isset($aSearchPeriodCriteriaArray["bookingDateTime"])){                
               $aSearchPeriodCriteriaArray["bookingDateTime"]=$aSearchPeriodCriteriaArray["bookingDateTime"];
            }
          
        } else
        {
            $aSearchPeriodCriteriaArray = null;
        }
        
        foreach ($aInputArray as $key => $value)
        {
            if (isset($aInputArray[$key]))
            {
                self::$arrayConverted[$key] = $value;
            }
        }
        self::$arrayConverted['RoomOccupancy'] = $aRoomOccupancyArray;
        self::$arrayConverted['RoomTypeFilters'] = $aRoomTypeFiltersArray;
        self::$arrayConverted['HotelFilters'] = $aHotelFiltersArray;
        self::$arrayConverted['SearchPeriodCriteria'] = $aSearchPeriodCriteriaArray;
    }

    public static function obj2Array(&$obj)
    {
        foreach ($obj as $key => $value)
        {
            if (is_object($value))
            {
                $arrayin[$key] = get_object_vars($value);
            } else
            {
                $arrayin[$key] = $value;
            }
        }
        return $arrayin;
    }

    public function convertToBool()
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
        return true;
    }

    public function returnArray()
    {
        return self::$arrayConverted;
    }

    //INCLUDE IN GLUES THE SIGN TO SEPARATE VALUES by EXAMPLE array("|",",","~","#")
    public static function convertRequestArrayToString(array $glues, array &$array)
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
    static $fail = 1; //QUANTITY OF FAILS BEFORE TO PUT THE SERVER DISABLED
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
            //echo "Con memoria ocupada \n";
        } else
        {
            $server_result = \ServersCluster::$hostsPort;
            $memcache->set($key, $server_result, MEMCACHE_COMPRESSED, self::$timeoutMemCache);
            //echo "Sin memoria ocupada \n";
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
        array_push($array, array_shift($array));
        $serverPosition = 0;
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

/*
 * Class to management all the TCP communication request and response
 */

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
        $timeout = 3000;
        $debug = false;
        set_time_limit(0); //TIMEOUT into receive
        ini_set("default_socket_timeout", "3"); //TIMEOUT into send
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
        $message = "PSFILTER |$var\r\n";
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

/*
 * Create an Array and modify the type of attributes
 */

class fillArrayValues
{

    public static $answerStatic = array();

    public function distributeValues(&$param)
    {
        $arrayAnswer = explode("|||", $param);
        $array_need = array();
        $arrayAnswerSplice = array_splice($arrayAnswer, 1);

        if (count($arrayAnswerSplice) >= 1)
        {
            foreach ($arrayAnswerSplice as $array_values)
            {
                if ($array_values)
                {
                    $folders = explode(",", $array_values);
                    // Possible solution to a new line problem. For the future.
                    $folders5 = \trim($folders[5], "\t\n\r\0\x0B");
                    //$folders5 = $folders[5];
                    $array_need[$folders[0]][$folders[1]][$folders5]['cityCode'] = $folders[2];

                    //if ($folders[1] === 1000 || $folders[1] === 1010)
                    if (in_array($folders[1], ArrayChannelCodes::$array_of_channel_manager_codes))
                    {
                        if (isset($folders[6]))
                        {
                            if (trim($folders[6]) != '')
                            {
                                $array_need[$folders[0]][$folders[1]][$folders5]['roomData'][$folders[4]] = trim($folders[6], "\t\n\r\0\x0B");
                            } else
                            {
                                $array_need[$folders[0]][$folders[1]][$folders5]['roomData'][] = $folders[4];
                            }
                        } else
                        {
                            $array_need[$folders[0]][$folders[1]][$folders5]['roomData'][] = $folders[4];
                        }
                    } else
                    {
                        if (isset($folders[6]))
                        {
                            if (trim($folders[6]) != '')
                            {
                                $array_need[$folders[0]][$folders[1]][$folders5]['roomData'][$folders[4]] = trim($folders[6], "\t\n\r\0\x0B");
                            } else
                            {
                                $array_need[$folders[0]][$folders[1]][$folders5]['roomData'][] = $folders[4];
                            }
                        }
                    }
                    $array_need[$folders[0]][$folders[1]][$folders5]['hotelCodeOriginal'] = $folders[3];
                }
            }
        } else
        {
            //self::$answerStatic = false;
            self::$answerStatic = $array_need;
            return true;
        }
        unset($folders, $arrayAnswer, $array_values, $arrayAnswerSplice);
        self::$answerStatic = $array_need;
        return true;
    }

    public function __destruct()
    {
        
    }

}
