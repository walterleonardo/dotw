<?php

namespace Hotel\StaticData;

class StaticInput {

    public $hotelIds = array(
  1884 =>
    array (
      0 => 64344,
      1 => 5858635,
      2 => 6268435,
      3 => 6268455,
      4 => 6400305,
      5 => 9465588,
      6 => 11480718,
      7 => 11480728,
      8 => 11480738,
      9 => 12113938,
      10 => 12114368,
      11 => 12114588,
      12 => 12114648,
      13 => 13329528,
      14 => 13329538,
      15 => 15739938,
      16 => 15817638,
      17 => 17351338,
      18 => 17351348,
      19 => 17351358,
      20 => 20357145,
      21 => 20357165,
      22 => 20357175,
    ),
        
        24 =>
    array (
      0 => 64344,
      1 => 5858635,
      2 => 6268435,
      3 => 6268455,
      4 => 6400305,
      5 => 9465588,
      6 => 11480718,
      7 => 11480728,
      8 => 11480738,
      9 => 12113938,
      10 => 12114368,
      11 => 12114588,
      12 => 12114648,
      13 => 13329528,
      14 => 13329538,
      15 => 15739938,
      16 => 15817638,
      17 => 17351338,
      18 => 17351348,
      19 => 17351358,
      20 => 20357145,
      21 => 20357165,
      22 => 20357175,
    ),
        301575 =>
    array (
      0 => 64344,
      1 => 5858635,
      2 => 6268435,
      3 => 6268455,
      4 => 6400305,
      5 => 9465588,
      6 => 11480718,
      7 => 11480728,
      8 => 11480738,
      9 => 12113938,
      10 => 12114368,
      11 => 12114588,
      12 => 12114648,
      13 => 13329528,
      14 => 13329538,
      15 => 15739938,
      16 => 15817638,
      17 => 17351338,
      18 => 17351348,
      19 => 17351358,
      20 => 20357145,
      21 => 20357165,
      22 => 20357175,
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

    //
    //
    public $description1 = true; //NO MANDATORY BOOL
    public $description2 = true;
    public $geoPoint = true;
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
    public $chain = true;
    public $lastUpdated = true;
    public $transferMandatory = true;
    public $tariffNotes = true;
    public $chainName = true;
    public $hotelProperty = true;

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
