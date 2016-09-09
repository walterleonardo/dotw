<?php

namespace Hotel\StaticData;

class StaticInput {

    public $hotelIds = array(
        // 1114368 => array(), //false direct
        //941895 => array(0 => 6163655,), //true direct
            44 => 
    array (
      0 => 44,
      1 => 1385055,
      2 => 1385065,
      3 => 1385075,
      4 => 1385085,
      5 => 1385095,
      6 => 2355245,
      7 => 2355255,
      8 => 2355265,
      9 => 2355275,
      10 => 2355285,
      11 => 2355295,
      12 => 2413855,
      13 => 2413865,
      14 => 2413875,
      15 => 2413885,
      16 => 2413895,
      17 => 2414325,
      18 => 2414335,
      19 => 2414345,
      20 => 2414355,
      21 => 2414365,
      22 => 2414375,
      23 => 3670345,
      24 => 3865235,
      25 => 3865245,
      26 => 3865255,
      27 => 3865265,
      28 => 3865275,
      29 => 3865285,
      30 => 3865295,
      31 => 3865305,
      32 => 3865315,
      33 => 6047385,
      34 => 6047395,
      35 => 6047405,
      36 => 6047415,
      37 => 6047425,
      38 => 9312388,
      39 => 9312398,
      40 => 9312408,
      41 => 9316448,
      42 => 11342018,
      43 => 11907518,
      44 => 11907528,
      45 => 11907538,
      46 => 11907548,
      47 => 11907558,
      48 => 11907568,
      49 => 14165188,
      50 => 14165268,
      51 => 16322588,
      52 => 18238995,
      53 => 18239005,
      54 => 18239015,
    ),
//         24 => 
//    array (
//      0 => 4,
//      1 => 950076,
//      2 => 2342175,
//      3 => 2342185,
//      4 => 6044545,
//      5 => 6044555,
//      6 => 11907028,
//      7 => 11907038,
//      8 => 11907048,
//      9 => 19750755,
//    ),
        
    );
    public $LanguageId = 1;
    //MANDATORY ARRAY
    /**
     * @var ReturnHotelStaticData;
     */
    public $ReturnHotelStaticData = array();

    /**
     * @var ReturnRoomTypeStaticData;
     */
    public $ReturnRoomTypeStaticData = array();

    /**
     * @var ReturnRateData;
     */
    public $ReturnRateData = array();
    
    function __construct() {
        $this->ReturnHotelStaticData = new ReturnHotelStaticData();
        $this->ReturnRoomTypeStaticData = new ReturnRoomTypeStaticData();
        $this->ReturnRateData = new ReturnRateData();
    }

}

class ReturnHotelStaticData {

    public $description1 = true; //NO MANDATORY BOOL
    public $description2 = true;
    public $geoPoints = true;
    public $ratingDescription = true;
    public $images = true;
    public $direct = true;
    public $hotelPreference = true;
    public $builtYear = true;
    public $renovationYear = true;
    public $floors = true;
    public $noOfRooms = true;
    public $luxury = true;
    public $address = true;
    public $zipCode = true;
    public $location = true;
    public $locationId = true;
    public $location1 = true;
    public $location2 = true;
    public $location3 = true;
    public $stateName = true;
    public $stateCode = true;
    public $countryName = true;
    public $regionName = true;
    public $regionCode = true;
    public $attraction = true;
    public $amenitie = true;
    public $leisure = true;
    public $business = true;
    public $transportation = true;
    public $hotelPhone = true;
    public $hotelCheckIn = true;
    public $hotelCheckOut = true;
    public $minAge = true;
    public $rating = true;
    public $fireSafety = true;
    public $geoPoint = true;
    public $chain = true;
    public $lastUpdated = true;

}

class ReturnRoomTypeStaticData {

    public $twin = true; //NO MANDATORY BOOL
    public $roomAmenities = true;
    public $name = true;
    public $roomInfo = true;

}

class ReturnRateData {
    public $status = true;
    public $rateType = true;
    public $allowsExtraMeals = true;
    public $allowsSpecialRequests = true;
    public $allowsBeddingPreference = true;
    public $passengerNamesRequiredForBooking = true;
    public $allocationDetails = true;
    public $cancellationRules = true;
    public $minStay = true;
    public $withinCancellationDeadline = true;
    public $isBookable = true;
    public $onRequest = true;
    public $total = true;
    public $dates = true;
    public $specials = true;
    public $tariffNotes = true;
    public $dayOnRequest = true;
    public $including = true;
    public $leftToSellDaily = true;
    public $dailyMinStay = true;
    public $freeStay = true;
}
