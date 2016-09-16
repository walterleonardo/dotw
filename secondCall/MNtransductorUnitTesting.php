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
$arrayOffiles = array();
error_reporting(E_ALL);
ini_set('display_errors', 'On');
ini_set('error_log', '/logs/errors.log');


$directory = shell_exec('pwd');
$scanned_directory = array_diff(scandir('/Users/walterleonardo/NetBeansProjects/multinucleo/multinucleo/secondCall'), array('..', '.'));

foreach ($scanned_directory as $value) {

   if (substr($value, 0, 4) == "clas"){
          $arrayOffiles[] = $value; 
   }
}
assert(true);

assert(!shell_exec("php MNtransductorClass.php $arrayOffiles[7]"));


