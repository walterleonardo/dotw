<?php

/*
 * This file include all the CLASS from the CLIENT.
 */

namespace Hotel\PreSupplier;

//$message="PSFILTER |164|prod|1|Y|14,24,34,44,54,64|||||1~5#5#10~N~N,2~2#3#6~N~N||\r\n";
class Input {

    public $customerId = 1253108; //integer 1124718 84/12844 --- 1237928 CITY 12624 country 81
    public $environment = 'prod'; //string
    public $requestSource = 2; //integer
    public $exceptRestrictions = array(
//        0,1,2,3,4,5,6,8,9,10,61274
//        ,919755
//,917305
//,912885
//,904345
//,902555
//,900075
//,899805
//,899595
//,899225
//,898365
//,862805
//,860475
//,847905
//,847625
//,823035
//,821215
//,820995
//,817555
//,817535
//,816725
//,811355
//,809215
//,807855
//,807835
//,807815
//,807795
//,807775
//,807755
//,807735
//,807715
//,807695
//,807675
//,807655
//,807635
//,807615
//,807595
//,807575
//,807555
//,807535
//,807515
//,807495
//,807475
//,807455
//,807435
//,807415
//,807395
//,807375
//,807355
//,807335
//,807315
//,807295
//,807275
//,807255
//,807235
//,807215
//,807195
//,807175
//,807155
//,807135
//,807115
//,807095
//,807075
//,807055
//,807035
//,806915
//,807015
//,806995
//,806975
//,806955
//,806935
//,806895
//,806875
//,806795
//,806855
//,806775
//,806835
//,806815
//,806555
//,806755
//,806655
//,806735
//,806635
//,806715
//,806695
//,806675
//,806615
//,806595
//,806575
//,806535
//,806515
//,806415
//,806495
//,806475
//,806455
//,806435
//,806295
//,740305
//,806395
//,806355
//,806335
//,806375
//,806275
//,806095
//,806075
//,806055
//,806035
//,806015
//,806315
//,806255
//,806235
//,806215
//,805995
//,806195
//,806175
//,806155
//,806135
//,806115
//,805975
//,805955
//,805935
//,805915
//,805895
//,805875
//,805855
//,805835
//,805815
//,805795
//,805775
//,805755
//,805695
//,805735
//,805715
//,805675
//,805655
//,805635
//,740305
//,805615
//,805595
//,805575
//,740305
//,740305
//,805555
//,805535
//,740305
//,740305
//,740305
//,805515
//,805495
//,805475
//,732085
//,805455
////,804035
////,811555
//,799335
//,725588
//,722958
); //array integer No mandatory ,811555 804035
    public $passengerNationalityOrResidenceProvided = true; //boolean
    public $hotelIds = array (/*0 => 2233005*/); //array(int)
    //country 143 and city 85516
    public $city = 364; //364 dubai //12764; //7674; //integer 7674 // 13474 Zamora //12624 BUCHARESt //14 kuwait
    public $country = null; //integer 971
    public $bookingChannelsWithAutoMapping = array (
//    0 => 1011,
//    1 => 1003,
//    2 => 1529,
//    3 => 1017,
//    4 => 1005,
//    5 => 1004,
//    6 => 1022,
//    7 => 1027,
//    8 => 1689,
//    9 => 1797,
//    10 => 1519,
//    11 => 1808,
//    12 => 1746,
//    13 => 1821,
//    14 => 1006,
//    15 => 1818,
//    16 => 1819,
//    17 => 1801
  ); //array(int)
    public $bookingChannelTypes = array (); //array(int)
    
    //ExcludedBookingchannel new object
    public $excludedBookingchannel = array(0 => 1549); //array(int)
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
    public $travelFrom = 1534723200; //Mandatory
    public $travelTo = 1534723200;//Mandatory
    public $bookingDateTime = 1529583407;//1529331799; //1528974697;//Mandatory
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

