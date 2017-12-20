<?php
/*
 * Class to translate objest attributes in a string to request information from DAEMON Server.
 *  2016
 * 
 * Enterprise MULTINUCLEO.COM
 * Created by Walter Lopez Pascual
 * 
 * ||
 * Use example;
 * To start the process we only need call this class "RUN" and the 
 * method "managerSupplierRequest" after to fill all the attributes into the objects.
 * And we will receive the answer in array format or False in error.
 * This function internaly call to the OBJESTs and their attributes that we need for the request.
 */
/*
 * MNtransductorClass.php, include all the class that make the hard work. 
 */
require 'MNtransductorClass.php';
$info = "detail"; //detail or normal
$debug = true;

error_reporting(E_ALL);
ini_set('display_errors','On');
ini_set('error_log','/logs/errors.log');

/*
 * This is a example of USE of the FUNCTION
 */

$requestNumber = 0;
$numberOfRequest = 1;
$err = 0;
$start = microtime(true);

while ($requestNumber < $numberOfRequest){
$run = new \First\Run;
    /* @var $answerRequest First */
    $answerRequest = $run->managerSupplierRequest(new \Hotel\PreSupplier\Input);

if (!$answerRequest) {
    echo "Error: ";
    print_r($run->getError());
    echo "Error code: ";
    print_r($run->getErrorCode());
    echo "\n";
    echo "Received value: ";
    var_export($answerRequest);
    echo "\n\r";
    echo "##\n\r";
    $err++;
} else {
    echo "##\n\r";
    var_export($answerRequest);
    echo "##\n\r";
    
    
    echo "\n\r";

        $roomsNumber = 0;
        $roomsNumber2 = 0;
        $imagesNumber = 0;
        $transportationNumber = 0;
        if ($debug) {
            foreach ($answerRequest as $key => $value) {
                echo "For Array ID ";
                var_export($key);
                echo "\t\n";
                echo "have Parties ";
                var_export(count($answerRequest[$key]));
                echo "\t\n";
                
                foreach($answerRequest[$key] as $key2 => $value2)
                {
                  echo "have Hotels ";
                  var_export(count($answerRequest[$key][$key2])); 
                  echo "\t\n";
                  
                  foreach ($answerRequest[$key][$key2] as $key3 => $value3)
                  {
                  echo "For hotel ID ";
                  var_export($key3);
                  echo " locate in city code ";
                  var_export($answerRequest[$key][$key2][$key3]["cityCode"]); 
                  echo " have ";
                  var_export(count($answerRequest[$key][$key2][$key3]["roomData"])); 
                  echo " Rooms \t\n";
                  }
                  
                  
                  
                  
                  
                }
                
                
                
                
                
                
         
                echo "\n";
            }


            echo "## ";
            echo "## ";
          
            echo " ##\n\r";
        }
}



$requestNumber++;

}

$time_elapsed_secs = microtime(true) - $start;
echo "REQUEST = " . $numberOfRequest;
echo "\r";
echo "ERRORS = " . $err;
echo "\r";
echo "TIME ELAPSED = " . $time_elapsed_secs;
echo "\n\r";