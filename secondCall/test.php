<?php
require 'MNtransductorClass.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
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
    //var_export($answerRequest);
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