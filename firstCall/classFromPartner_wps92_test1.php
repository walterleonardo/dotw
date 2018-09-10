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
    public $hotelIds = array (0 => 33464); //array(int)
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
         18 => 1669,
            19 => 1825,
            20 => 1823

  ); //array(int)
    public $bookingChannelTypes = array (); //array(int)
    
    //ExcludedBookingchannel new object
    public $excludedBookingchannel = array(
         0 => 500
            ,1 => 1001
            ,2 => 1002
            ,3 => 1003
            ,4 => 1004
            ,5 => 1005
            ,6 => 1006
            ,7 => 1007
            ,8 => 1008
            ,9 => 1009
            ,10 => 1010
            ,11 => 1011
            ,12 => 1012
            ,13 => 1013
            ,14 => 1014
            ,15 => 1015
            ,16 => 1016
            ,17 => 1017
            ,18 => 1018
            ,19 => 1019
            ,20 => 1020
            ,21 => 1021
            ,22 => 1022
            ,23 => 1023
            ,24 => 1024
            ,25 => 1025
            ,26 => 1026
            ,27 => 1027
            ,28 => 1029
            ,29 => 1030
            ,30 => 1101
            ,31 => 1201
            ,32 => 1301
            ,33 => 1401
            ,34 => 1409
            ,35 => 1501
            ,36 => 1519
            ,37 => 1529
            ,38 => 1539
            ,39 => 1549
            ,40 => 1579
            ,41 => 1599
            ,42 => 1619
            ,43 => 1629
            ,44 => 1639
            ,45 => 1649
            ,46 => 1659
            ,47 => 1669
            ,48 => 1679
            ,49 => 1689
            ,50 => 1699
            ,51 => 1709
            ,52 => 1719
            ,53 => 1729
            ,54 => 1739
            ,55 => 1740
            ,56 => 1741
            ,57 => 1742
            ,58 => 1744
            ,59 => 1745
            ,60 => 1746
            ,61 => 1747
            ,62 => 1748
            ,63 => 1749
            ,64 => 1750
            ,65 => 1751
            ,66 => 1752
            ,67 => 1753
            ,68 => 1754
            ,69 => 1755
            ,70 => 1756
            ,71 => 1757
            ,72 => 1758
            ,73 => 1759
            ,74 => 1760
            ,75 => 1762
            ,76 => 1763
            ,77 => 1764
            ,78 => 1765
            ,79 => 1775
            ,80 => 1776
            ,81 => 1777
            ,82 => 1778
            ,83 => 1779
            ,84 => 1781
            ,85 => 1782
            ,86 => 1783
            ,87 => 1785
            ,88 => 1786
            ,89 => 1787
            ,90 => 1788
            ,91 => 1789
            ,92 => 1790
            ,93 => 1791
            ,94 => 1792
            ,95 => 1793
            ,96 => 1794
            ,97 => 1795
            ,98 => 1796
            ,99 => 1797
            ,100 => 1798
            ,101 => 1800
            ,102 => 1801
            ,103 => 1802
            ,104 => 1803
            ,105 => 1804
            ,106 => 1805
            ,107 => 1806
            ,108 => 1807
            ,109 => 1808
            ,110 => 1810
            ,111 => 1811
            ,112 => 1813
            ,113 => 1814
            ,114 => 1815
            ,115 => 1816
            ,116 => 1817
            ,117 => 1818
            ,118 => 1819
            ,119 => 1820
            ,120 => 1821
            ,121 => 1823
            ,122 => 1824
            ,123 => 2216055
            ,124 => 2216056
            ,125 => 500
            ,126 => 1001
            ,127 => 1002
            ,128 => 1003
            ,129 => 1004
            ,130 => 1005
            ,131 => 1006
            ,132 => 1007
            ,133 => 1008
            ,134 => 1009
            ,135 => 1010
            ,136 => 1011
            ,137 => 1012
            ,138 => 1013
            ,139 => 1014
            ,140 => 1015
            ,141 => 1016
            ,142 => 1017
            ,143 => 1018
            ,144 => 1019
            ,145 => 1020
            ,146 => 1021
            ,147 => 1022
            ,148 => 1023
            ,149 => 1024
            ,150 => 1025
            ,151 => 1026
            ,152 => 1027
            ,153 => 1029
            ,154 => 1030
            ,155 => 1101
            ,156 => 1201
            ,157 => 1301
            ,158 => 1401
            ,159 => 1409
            ,160 => 1501
            ,161 => 1519
            ,162 => 1529
            ,163 => 1539
            ,164 => 1549
            ,165 => 1579
            ,166 => 1599
            ,167 => 1619
            ,168 => 1629
            ,169 => 1639
            ,170 => 1649
            ,171 => 1659
            ,172 => 1669
            ,173 => 1679
            ,174 => 1689
            ,175 => 1699
            ,176 => 1709
            ,177 => 1719
            ,178 => 1729
            ,179 => 1739
            ,180 => 1740
            ,181 => 1741
            ,182 => 1742
            ,183 => 1744
            ,184 => 1745
            ,185 => 1746
            ,186 => 1747
            ,187 => 1748
            ,188 => 1749
            ,189 => 1750
            ,190 => 1751
            ,191 => 1752
            ,192 => 1753
            ,193 => 1754
            ,194 => 1755
            ,195 => 1756
            ,196 => 1757
            ,197 => 1758
            ,198 => 1759
            ,199 => 1760
            ,200 => 1762
            ,201 => 1763
            ,202 => 1764
            ,203 => 1765
            ,204 => 1775
            ,205 => 1776
            ,206 => 1777
            ,207 => 1778
            ,208 => 1779
            ,209 => 1781
            ,210 => 1782
            ,211 => 1783
            ,212 => 1785
            ,213 => 1786
            ,214 => 1787
            ,215 => 1788
            ,216 => 1789
            ,217 => 1790
            ,218 => 1791
            ,219 => 1792
            ,220 => 1793
            ,221 => 1794
            ,222 => 1795
            ,223 => 1796
            ,224 => 1797
            ,225 => 1798
            ,226 => 1800
            ,227 => 1801
            ,228 => 1802
            ,229 => 1803
            ,230 => 1804
            ,231 => 1805
            ,232 => 1806
            ,233 => 1807
            ,234 => 1808
            ,235 => 1810
            ,236 => 1811
            ,237 => 1813
            ,238 => 1814
            ,239 => 1815
            ,240 => 1816
            ,241 => 1817
            ,242 => 1818
            ,243 => 1819
            ,244 => 1820
            ,245 => 1821
            ,246 => 1823
            ,247 => 1824
            ,248 => 2216055
            ,249 => 2216056
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
           //$this->roomCategories = array( new RoomCategory());
       }
}


class  SearchPeriodCriteria{ //Mandatory
    public $travelFrom = 1536883200; //Mandatory
    public $travelTo = 1536883200;//Mandatory
    public $bookingDateTime = 1535715964;//1529331799; //1528974697;//Mandatory
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
           $this->roomCategories = array( /*new RoomCategory()/*,new RoomCategory1()*/);
       }
}

class RoomCategory{
        public $MainCategory = null;//62215; //integer
        public $SubCategory = null;//integer
        public $View = null;//integer
        public $BeddingType = 64042;//integer
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

class RoomCategory2{
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




