<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


//$dbIp = "dotw-stage-v7.c3iiyumkzhr9.eu-west-1.rds.amazonaws.com";
////$dbIp = "10.255.10.55";
//$user = "multinucleo";
//$pass = "Vg7gMqKnU6UuJCnq";


$dbIp = "10.211.55.3";
$user = "dotw";
$pass = "dotw";

$dbName = "DOTW";



//Only change it. 
$custId = "1237928";







$mysqli = new mysqli($dbIp, $user, $pass, $dbName, 3306);
if ($mysqli->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

echo $mysqli->host_info . "\n";

$custCity = $mysqli->query("SELECT City FROM dotw.tbl_Customers WHERE Cod = $custId");
$custCountry = $mysqli->query("SELECT Country FROM dotw.tbl_Customers WHERE Cod = $custId");
$CustCountryValue = $custCountry->fetch_assoc()['Country'];
$custRegion = $mysqli->query("SELECT Region_Code FROM dotw.tbl_Countries WHERE Country_Code = $CustCountryValue");
echo "\n\r";
echo "\n\r";

echo "CustID: ";
echo $custId;
echo "\n\r";
echo "City: ";
$custCityValue = $custCity->fetch_assoc()['City'];
echo $custCityValue;
echo "\n\r";
echo "Country: ";
echo $CustCountryValue;
echo "\n\r";
echo "Region: ";
$custRegionValue = $custRegion->fetch_assoc()['Region_Code'];
echo $custRegionValue;
echo "\n\r";
//
$query = "SELECT distinct(info.RestId)
		  FROM tbl_CustomerRestrictionDetailsInfo info
	INNER JOIN tbl_CustomerRestrictionDetailsExpanded cust
			ON info.RestId = cust.RestId
	INNER JOIN tbl_CustomerRestrictionDetailsExpanded prod
			ON info.RestId = prod.restid
	INNER JOIN tbl_CustomerRestrictionDetailsExpanded channel
			ON info.restid = channel.RestId
		 WHERE ServiceType = 1
		   AND cust.Type IN (1,2,3,4,5) 
		   AND prod.Type IN (6,7,8,9)
           AND channel.type = 10
           AND
           (
				(
					info.CustomerRestApply = 2
					AND 
					(
						cust.Type = 1 AND cust.value = IFNULL($custId, cust.value)
						OR
						cust.Type = 2 AND cust.value = IFNULL($custCityValue, cust.value)
						OR
						cust.Type = 3 AND cust.value = IFNULL($CustCountryValue, cust.value)
						OR
						cust.Type = 4 AND cust.value = IFNULL($custRegionValue, cust.value)				
					)
				)
				OR
                (
					info.CustomerRestApply = 3
					AND 
                    (
						cust.Type = 1 AND cust.value != IFNULL($custId, cust.value)
						OR
						cust.Type = 2 AND cust.value != IFNULL($custCityValue, cust.value)
						OR
						cust.Type = 3 AND cust.value != IFNULL($CustCountryValue, cust.value)
						OR
						cust.Type = 4 AND cust.value != IFNULL($custRegionValue, cust.value)
					)
				)			
			);";

$restrictions = $mysqli->query($query);

echo "Orden del conjunto de resultados...\n";
$restrictions->data_seek(0);
while ($fila = $restrictions->fetch_assoc()) {
    echo " id = " . $fila['RestId'] . "\n";
}