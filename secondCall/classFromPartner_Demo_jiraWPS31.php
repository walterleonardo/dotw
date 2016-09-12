<?php

namespace Hotel\StaticData;

class StaticInput {

    public $hotelIds = array(
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

    public $description1 = false; //NO MANDATORY BOOL
    public $description2 = false;
    public $geoPoints = false;
    public $ratingDescription = false;
    public $images = false;
    public $direct = false;
    public $hotelPreference = false;
    public $builtYear = false;
    public $renovationYear = false;
    public $floors = false;
    public $noOfRooms = false;
    public $luxury = false;
    public $address = false;
    public $zipCode = false;
    public $location = false;
    public $locationId = false;
    public $location1 = false;
    public $location2 = false;
    public $location3 = false;
    public $stateName = false;
    public $stateCode = false;
    public $countryName = false;
    public $regionName = false;
    public $regionCode = false;
    public $attraction = false;
    public $amenitie = false;
    public $leisure = false;
    public $business = false;
    public $transportation = false;
    public $hotelPhone = false;
    public $hotelCheckIn = false;
    public $hotelCheckOut = false;
    public $minAge = false;
    public $rating = false;
    public $fireSafety = false;
    public $geoPoint = true;
    public $chain = false;
    public $lastUpdated = false;

}

class ReturnRoomTypeStaticData {

    public $twin = false; //NO MANDATORY BOOL
    public $roomAmenities = false;
    public $name = false;
    public $roomInfo = false;

}

class ReturnRateData {
    public $status = false;
    public $rateType = false;
    public $allowsExtraMeals = false;
    public $allowsSpecialRequests = false;
    public $allowsBeddingPreference = false;
    public $passengerNamesRequiredForBooking = false;
    public $allocationDetails = false;
    public $cancellationRules = false;
    public $minStay = false;
    public $withinCancellationDeadline = false;
    public $isBookable = false;
    public $onRequest = false;
    public $total = false;
    public $dates = false;
    public $specials = false;
    public $tariffNotes = false;
    public $dayOnRequest = false;
    public $including = false;
    public $leftToSellDaily = false;
    public $dailyMinStay = false;
    public $freeStay = false;
}
