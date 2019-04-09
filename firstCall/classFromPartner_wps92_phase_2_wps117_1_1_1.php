<?php
 
/*
 * This file include all the CLASS from the CLIENT.
 */
 
namespace Hotel\PreSupplier;
 
//$message="PSFILTER |164|prod|1|Y|14,24,34,44,54,64|||||1~5#5#10~N~N,2~2#3#6~N~N||\r\n";
class Input {
 
    public $customerId = 1389355; //integer 1124718 84/12844 --- 1237928 CITY 12624 country 81
    public $environment = 'prod'; //string
    public $requestSource = 1; //integer
    public $exceptRestrictions = array(); //array integer No mandatory ,811555 804035
    public $passengerNationalityOrResidenceProvided = true; //boolean
    public $hotelIds = array (/*0 => 820415,*/18674); //array(int)
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
    public $bookingChannelTypes = array (); //array(int)
    
    //ExcludedBookingchannel new object
    public $excludedBookingchannel = array(
            0 => 500,
    2 => 1001,
    3 => 1002,
    4 => 1003,
    5 => 1004,
    6 => 1005,
    7 => 1006,
    8 => 1007,
    9 => 1008,
    10 => 1009,
    11 => 1010,
    12 => 1011,
    13 => 1012,
    14 => 1013,
    15 => 1014,
    16 => 1015,
    17 => 1016,
    18 => 1017,
    19 => 1018,
    20 => 1019,
    21 => 1020,
    22 => 1021,
    23 => 1022,
    24 => 1023,
    25 => 1024,
    26 => 1025,
    27 => 1026,
    28 => 1027,
    29 => 1029,
    30 => 1030,
    31 => 1101,
    32 => 1201,
    33 => 1301,
    34 => 1401,
    35 => 1409,
    36 => 1501,
    37 => 1519,
    38 => 1529,
    39 => 1539,
    40 => 1549,
    41 => 1579,
    42 => 1599,
    43 => 1619,
    44 => 1629,
    45 => 1639,
    46 => 1649,
    47 => 1659,
    48 => 1669,
    49 => 1679,
    50 => 1689,
    51 => 1699,
    52 => 1709,
    53 => 1719,
    54 => 1729,
    55 => 1739,
    56 => 1740,
    57 => 1741,
    58 => 1742,
    59 => 1744,
    60 => 1745,
    61 => 1746,
    62 => 1747,
    63 => 1748,
    64 => 1749,
    65 => 1750,
    66 => 1751,
    67 => 1752,
    68 => 1753,
    69 => 1754,
    70 => 1755,
    71 => 1756,
    72 => 1757,
    73 => 1758,
    74 => 1759,
    75 => 1760,
    76 => 1761,
    77 => 1762,
    78 => 1775,
    79 => 1776,
    80 => 1777,
    81 => 1778,
    82 => 1779,
    83 => 1780,
    84 => 1781,
    85 => 1782,
    86 => 1783,
    87 => 1784,
    88 => 1785,
    89 => 1786,
    90 => 1787,
    91 => 1788,
    92 => 1789,
    93 => 1790,
    94 => 1791,
    95 => 1792,
    96 => 1793,
    97 => 1794,
    98 => 1795,
    99 => 1796,
    100 => 1797,
    101 => 1798,
    102 => 1799,
    103 => 1800,
    104 => 1801,
    105 => 1802,
    106 => 1803,
    107 => 1804,
    108 => 1805,
    109 => 1806,
    110 => 1807,
    111 => 1808,
    112 => 1810,
    113 => 1811,
    114 => 1812,
    115 => 1813,
    116 => 1814,
    117 => 1815,
    118 => 1816,
    119 => 1817,
    120 => 1818,
    121 => 1819,
    122 => 1820,
    123 => 1821,
    124 => 1822,
    125 => 1823,
    126 => 1824,
    127 => 1825,
    128 => 1826,
    129 => 1827,
    130 => 1828,
    131 => 1829,
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
           $this->RoomTypeFilters = new RoomTypeFilters();
           $this->SearchPeriodCriteria = new SearchPeriodCriteria();
       }
}
 

class  SearchPeriodCriteria{ //Mandatory
    public $travelFrom = 1544832000; //Mandatory
    public $travelTo = 1544832000;//Mandatory
    public $bookingDateTime = 1543876463;//1529331799; //1528974697;//Mandatory
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