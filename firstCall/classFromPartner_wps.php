<?php

/*
 * This file include all the CLASS from the CLIENT.
 */

namespace Hotel\PreSupplier;

//$message="PSFILTER |164|prod|1|Y|14,24,34,44,54,64|||||1~5#5#10~N~N,2~2#3#6~N~N||\r\n";
class Input {

    public $customerId = 1406405; //integer 1317257
    public $environment = 'prod'; //string
    public $requestSource = 1; //integer
    public $passengerNationalityOrResidenceProvided = true; //boolean
    public $hotelIds = array (); //array(int)
    public $city = 18514; //7674; //integer 7674
    public $country = null; //integer 971
    public $bookingChannelsWithAutoMapping = array (
    0 => 1011,
    1 => 1003,
    2 => 1004,
    3 => 1529,
    4 => 1005,
    5 => 1017,
    6 => 1022,
    7 => 1519,
    8 => 1797,
    9 => 1808,
    10 => 1689,
    11 => 1027
  ); //array(int)
    public $bookingChannelTypes = array (); //array(int)
    
    //ExcludedBookingchannel new object
    public $excludedBookingchannel = array(
    ); //array(int)
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
           $this->HotelFilters = new HotelFilters();
           $this->RoomTypeFilters = new RoomTypeFilters();
       }
}

class RoomOccupancy {
    public $adults = 2; //integer
    public $children = array (); //array(int)
    public $twin = false; //boolean
    public $extraBed = false; //boolean
}

class RoomOccupancy1 {
    public $adults = 2; //integer
    public $children = array(2,3,6); //array(int)
    public $twin = false; //boolean
    public $extraBed = false; //boolean
}

class RoomOccupancy2 {
    public $adults = 1; //integer
    public $children = array(3,8); //array(int)
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

//    public $rating = array(); //array(int)
//    public $luxury = null; //integer
//    public $location = null; //string
//    public $locationId = array(); //array(int)
//    public $amenitie = array(); //array(int)
//    public $leisure = array(); //array(int)
//    public $business = array(); //array(int)
//    public $hotelPreference = array(); //array(int)
//    public $chain = array(); //array(int)
//    public $attraction = null; //string
//    public $hotelName = null; //string
//    public $builtYear = null; //integer
//    public $renovationYear = null; //integer
//    public $floors = null; //integer
//    public $noOfRooms = null; //integer
//    public $fireSafety = null; //integer
//    //public $lastUpdated = null; //string
//    public $lastUpdated = '2016-01-01 00:00:00'; //string

}

class AdditionalFilters {
    
}

