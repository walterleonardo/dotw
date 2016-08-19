<?php

/*
 * This file include all the CLASS from the CLIENT.
 */

namespace Hotel\PreSupplier;

//$message="PSFILTER |164|prod|1|Y|14,24,34,44,54,64|||||1~5#5#10~N~N,2~2#3#6~N~N||\r\n";
class Input {

    public $customerId = 593625; //integer
    public $environment = 'dev'; //string
    public $requestSource = 1; //integer
    public $passengerNationalityOrResidenceProvided = false; //boolean
    public $hotelIds = 
            array (
    0 => 629785,
    1 => 468375,
    2 => 186196,
    3 => 466995,
    4 => 627985,
    5 => 380895,
    6 => 262595,
    7 => 724095,
    8 => 237316,
    9 => 345305,
    10 => 364405,
    11 => 278635,
    12 => 25264,
    13 => 228796,
    14 => 228816,
    15 => 228766,
    16 => 36044,
    17 => 339065,
    18 => 629705,
    19 => 629685,
    20 => 339085,
    21 => 996735,
    22 => 232676,
    23 => 329745,
    24 => 25194,
    25 => 25154,
    26 => 468495,
    27 => 389865,
    28 => 222436,
    29 => 921415,
    30 => 364605,
    31 => 312335,
    32 => 107522,
    33 => 627895,
    34 => 468505,
    35 => 627915,
    36 => 627355,
    37 => 627795,
  ); //array(int)
    //public $city = 100456; //integer
    public $bookingChannelsWithAutoMapping = array (
    0 => 1011,
    1 => 1003,
    2 => 1004,
    3 => 1529,
    4 => 1005,
    5 => 1017,
    6 => 1022,
    7 => 1027,
  ); //array(int)
    public $bookingChannelTypes = array(); //array(int)

    /**
     * @var array of RoomOccupancy
     */
    public $RoomOccupancy = array(); //array(varios)

    /**
     * @var HotelFilters
     */
    public $HotelFilters = array(); //array(varios)

    /**
     * @var RoomTypeFilters
     */
    public $RoomTypeFilters = array(); //array(varios)

    /**
     * @var AtomicFilter or ComplexFilter
     *
     * not used anymore
     *
     */
    public $AdditionalFilters = null; //array(varios)
       function __construct() {
           $this->RoomOccupancy = array(new RoomOccupancy());
           $this->HotelFilters = NULL;
           $this->RoomTypeFilters = NULL;
       }
}

class RoomOccupancy {

    public $adults = 2; //integer
    public $children = array(9); //array(int)
    public $twin = false; //boolean
    public $extraBed = true; //boolean

}
class RoomOccupancy2 {

    public $adults = 1; //integer
    public $children = array(); //array(int)
    public $twin = false; //boolean
    public $extraBed = false; //boolean

}

class RoomTypeFilters {

//    public $suite = null; //integer
//    public $roomAmenitie = null; //array(int)
//    public $roomId = null; //array(int)
//    public $roomName = null; //string

}

class HotelFilters {

//    public $rating = null; //array(int)
//    public $luxury = null; //integer
//    public $location = null; //string
//    public $locationId = null; //array(int)
//    public $amenitie = null; //array(int)
//    public $leisure = null; //array(int)
//    public $business = null; //array(int)
//    public $hotelPreference = null; //array(int)
//    public $chain = null; //array(int)
//    public $attraction = null; //string
//    public $hotelName = null; //string
//    public $builtYear = null; //integer
//    public $renovationYear = null; //integer
//    public $floors = null; //integer
//    public $noOfRooms = null; //integer
//    public $fireSafety = null; //integer
//    public $lastUpdated = null; //string

}

