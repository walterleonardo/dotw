<?php

/*
 * This file include all the CLASS from the CLIENT.
 */

namespace Hotel\PreSupplier;

//$message="PSFILTER |164|prod|1|Y|14,24,34,44,54,64|||||1~5#5#10~N~N,2~2#3#6~N~N||\r\n";
class Input {

    public $customerId = 1317257; //integer 1124718 84/12844 --- 1237928 CITY 12624 country 81
    public $environment = 'dev'; //string
    public $requestSource = 1; //integer
    public $exceptRestrictions = array(); //array integer No mandatory ,811555 804035
    public $passengerNationalityOrResidenceProvided = true; //boolean
    public $hotelIds = array (0 => 83682); //array(int)
    //country 143 and city 85516
    public $city = null; //364 dubai //12764; //7674; //integer 7674 // 13474 Zamora //12624 BUCHARESt //14 kuwait
    public $country = null; //integer 971
    public $bookingChannelsWithAutoMapping = array (
     0 => 1011,
    1 => 1003,
    2 => 1529,
    3 => 1017,
    4 => 1005,
    5 => 1004,
    6 => 1022,
    7 => 1027,
    8 => 1689,
    9 => 1797,
    10 => 1519,
    11 => 1808,
    12 => 1746,
13 => 1821,
    14 => 1006,
    15 => 1818,
    16 => 1819,
    17 => 1801

  ); //array(int)
    public $bookingChannelTypes = array (); //array(int)
    
    //ExcludedBookingchannel new object
    public $excludedBookingchannel = array(); //array(int)
    /**
     * @var array of activeDorRoomCategories
     */
    public $activeForRoomCategories = true; //bolean
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


class  SearchPeriodCriteria{ //Mandatory
    public $travelFrom = 1537833600; //Mandatory
    public $travelTo = 1537833600;//Mandatory
    public $bookingDateTime = 1537833600;//1529331799; //1528974697;//Mandatory
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
    public $roomCategories = array(); //roomCategories Objects
        function __construct() {
           $this->roomCategories = array( new RoomCategory(),new RoomCategory1());
       }
}

class RoomCategory{
        public $MainCategory = 63857;//62215; //integer
        public $SubCategory = null;//integer
        public $View = null;//integer
        public $BeddingType = 62159;//integer
        public $Attribute1 = null;//integer
        public $Attribute2 = null;//integer
}

class RoomCategory1{
        public $MainCategory = 62214; //integer
        public $SubCategory = null;//integer
        public $View = null;//integer
        public $BeddingType = 62158;//integer
        public $Attribute1 = null;//integer
        public $Attribute2 = null;//integer
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


class AdditionalFilters {
    
}




