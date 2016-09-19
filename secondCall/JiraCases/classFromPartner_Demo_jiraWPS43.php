<?php

namespace Hotel\StaticData;

class StaticInput {

    public $hotelIds = array(
     1674 => 
    array (
      0 => 2464,
//      1 => 2494,
//      2 => 811696,
//      3 => 933466,
//      4 => 933476,
//      5 => 933486,
//      6 => 933496,
//      7 => 933506,
//      8 => 3447505,
//      9 => 6894765,
//      10 => 6894775,
//      11 => 6894785,
//      12 => 12724478,
//      13 => 12724558,
//      14 => 12724578,
//      15 => 12724728,
//      16 => 12724758,
//      17 => 12724768,
//      18 => 12724778,
//      19 => 12724788,
//      20 => 12724798,
//      21 => 12724808,
//      22 => 12724848,
//      23 => 12724888,
//      24 => 12724898,
//      25 => 12724908,
//      26 => 12724918,
//      27 => 12724938,
//      28 => 12724968,
//      29 => 12725058,
//      30 => 12725088,
//      31 => 12725188,
//      32 => 12725248,
//      33 => 12725358,
//      34 => 12725388,
//      35 => 12725428,
//      36 => 12725438,
//      37 => 12725448,
//      38 => 13328888,
//      39 => 13328898,
//      40 => 13328908,
//      41 => 17869898,
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
