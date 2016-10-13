<?php

namespace Hotel\StaticData;

class StaticInput {

    public $hotelIds = array(
//        0 => 17074,
//        1=> 17444,
        24424 => 
    array (
      0 => 836136,
      1 => 836146,
      2 => 836156,
      3 => 2083645,
      4 => 2083655,
      5 => 2083665,
      6 => 2083675,
      7 => 2083685,
      8 => 2083695,
      9 => 3639615,
      10 => 5335975,
      11 => 13276338,
      12 => 13276348,
      13 => 13276358,
      14 => 17308378,
      15 => 17308388,
      16 => 17308438,
      17 => 17308458,
      18 => 17308468,
      19 => 17308498,
      20 => 17577138,
      21 => 17577198,
      22 => 18843585,
      23 => 18843595,
    ),
//        5 => 8674,
//        8674 => array(15578918)
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

    //
    //
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
    //public $geoPoint = true;
    public $chain = true;
    public $lastUpdated = true;
    public $transferMandatory = true;
    public $tariffNotes = true;
    public $chainName = true;

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
