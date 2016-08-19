<?php

/*
 * This file include all the CLASS from the CLIENT.
 */

namespace Hotel\PreSupplier;

//$message="PSFILTER |164|prod|1|Y|14,24,34,44,54,64|||||1~5#5#10~N~N,2~2#3#6~N~N||\r\n";
class Input {

    public $customerId = 1078348; //integer
    public $environment = 'dev'; //string
    public $requestSource = 1; //integer
    public $passengerNationalityOrResidenceProvided = true; //boolean
    public $hotelIds = array(); //array(int)
    public $city = 364; //integer
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
           $this->RoomOccupancy = array(new RoomOccupancy(),new RoomOccupancy2());
           $this->HotelFilters = NULL;
           $this->RoomTypeFilters = NULL;
       }
}

class RoomOccupancy {

    public $adults = 1; //integer
    public $children = array(12); //array(int)
    public $twin = false; //boolean
    public $extraBed = false; //boolean

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

