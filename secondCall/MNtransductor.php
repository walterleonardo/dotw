<?php

//CLASS FROM PARTNER INCLUDE ALL THE OBJETS THAT WE NEED.
//MNtransductor Class, include all the class that make the hard work.

/*
 * Use example;
 * We only need call this function to start the process.
 * And we will receive the answer in array format.
 */

/*
 * MNtransductorClass.php, include all the class that make the hard work. 
 */
require 'MNtransductorClass.php';

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
$run = new \Second\run;
$answerRequest = $run->managerSupplierRequest(new \Hotel\StaticData\StaticInput);


if ($answerRequest == false) {
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
    echo "\n\r";
    var_export($answerRequest);
    echo "\n\r";
    echo "## ";
    echo "Hotels received ";
    var_export(count($answerRequest));
    echo " ##\n\r";
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