<?php
 
/*
 * This file include all the CLASS from the CLIENT.
 * PSFILTER |1541195|prod|2|Y|934175||||1011,1003,1529,1017,1005,1004,1022,1027,1689,1797,1519,1808,1746,1821,1006,1818,1819,1801,1828,1749,1669,1825,1014,1823,1025,1599,1741|2~~N~N|||1548633600,1548633600,1543968000||N
 */
 
namespace Hotel\PreSupplier;
 
//$message="PSFILTER |164|prod|1|Y|14,24,34,44,54,64|||||1~5#5#10~N~N,2~2#3#6~N~N||\r\n";
class Input {
 
    public $customerId = 993565;//1534906; //integer 1124718 84/12844 --- 1237928 CITY 12624 country 81
    public $environment = 'prod'; //string
    public $requestSource = 1; //integer
    public $exceptRestrictions = array(); //array integer No mandatory ,811555 804035
    public $passengerNationalityOrResidenceProvided = true; //boolean
    public $hotelIds = array (79604 /*0 => 820415,*/); //array(int)
    //country 143 and city 85516
    public $city = null; //364 dubai //12764; //7674; //integer 7674 // 13474 Zamora //12624 BUCHARESt //14 kuwait
    public $country = null; //integer 971
    public $bookingChannelsWithAutoMapping = array (
           0 => 1011,
    1 => 1005,
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
    17 => 1801,
    18 => 1828,
    19 => 1749,
    20 => 1669,
    21 => 1825,
    22 => 1014,
    23 => 1823,
    24 => 1025,
    25 => 1599,
    26 => 1741,
 
  ); //array(int)
    public $bookingChannelTypes = array (8,64,16,32); //array(int)
    
    //ExcludedBookingchannel new object
    public $excludedBookingchannel = array(1005,1659,1699
      
    ); //array(int)
    /**
     * @var array of activeDorRoomCategories
     */
    public $activeForRoomCategories = false; //bolean
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
           $this->RoomTypeFilters = null;//new RoomTypeFilters();
           $this->SearchPeriodCriteria = new SearchPeriodCriteria();
       }
}
 

class  SearchPeriodCriteria{ //Mandatory
    public $travelFrom = 1555545600;//1553558400; //Mandatory
    public $travelTo = 1555545600;//Mandatory
    public $bookingDateTime = 1551687703;//1529331799; //1528974697;//Mandatory
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
           $this->roomCategories = array( /*new RoomCategory(),new RoomCategory1()*/);
       }
}
 
class RoomCategory{
        public $MainCategory = null;//62215; //integer
        public $SubCategory = 63884;//integer
        public $View = null;//integer
        public $BeddingType = null;//integer
        public $Attribute1 = null;//integer
        public $Attribute2 = null;//integer
}
 
class RoomCategory1{
        public $MainCategory = 63850; //integer
        public $SubCategory = null;//integer
        public $View = null;//integer
        public $BeddingType = null;//integer
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