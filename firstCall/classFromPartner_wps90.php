<?php

/*
 * This file include all the CLASS from the CLIENT.
 */

namespace Hotel\PreSupplier;

//$message="PSFILTER |164|prod|1|Y|14,24,34,44,54,64|||||1~5#5#10~N~N,2~2#3#6~N~N||\r\n";
class Input {

    public $customerId = 1317257; //integer 1317257
    public $environment = 'dev'; //string
    public $requestSource = 1; //integer
    public $restReason = array(1,2,3); //array integer
    public $passengerNationalityOrResidenceProvided = true; //boolean
    public $hotelIds = array (); //array(int)
    //country 143 and city 85516
    public $city = 364; //7674; //integer 7674
    public $country = null; //integer 971
    public $bookingChannelsWithAutoMapping = array (
            0 => 1011,
            1 => 1003,
            2 => 1004,
            3 => 1529,
            4 => 1005,
            5 => 1017,
            6 => 1022,
            7 => 1797,
            8 => 1808,
            9 => 1519,
            10 => 1689,
            11 => 1027,
  ); //array(int)
    public $bookingChannelTypes = array (); //array(int)
    
    //ExcludedBookingchannel new object
    public $excludedBookingchannel = array(0 => 1549,); //array(int)
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
           $this->SearchPeriodCriteria = new SearchPeriodCriteria();
       }
}

class  SearchPeriodCriteria{
    public $travelFrom = '20180402';
    public $travelTo = '20180403';
    public $bookingDateTime ='20180318';
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

    public $suite = null; //integer
    public $roomAmenitie = null; //array(int)
    public $roomId = null; //array(int)
    public $roomName = null; //string

}

class HotelFilters {

    public $rating = null; //array(int)
    public $luxury = null; //integer
    public $location = null; //string
    public $locationId = null; //array(int)
    public $amenitie = null; //array(int)
    public $leisure = null; //array(int)
    public $business = null; //array(int)
    public $hotelPreference = null; //array(int)
    public $chain = null; //array(int)
    public $attraction = null; //string
    public $hotelName = null; //string
    public $builtYear = null; //integer
    public $renovationYear = null; //integer
    public $floors = null; //integer
    public $noOfRooms = null; //integer
    public $fireSafety = null; //integer
    public $lastUpdated = null; //string
}


class AdditionalFilters {
    
}

