<?php

namespace Hotel\StaticData;

class StaticInput {
//941895 //139534
    public $hotelIds = array (
    98099 => 
    array (
        0 => 15011168,
//        1 => 14570388,
//        2 => 20938608,
//        3 => 14568768,
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
    public $geoPoint = false;
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
    public $countryName = true;
    public $regionName = false;
    public $regionCode = false;
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
    public $chain = false;
    public $lastUpdated = false;
    public $transferMandatory = false;
    public $tariffNotes = false;
    public $chainName = false;
    public $hotelProperty = false;
    public $fullAddress = false;//Future develop
    public $exclusive = false; 
    public $attraction = false;//Future develop
    public $areaCode = false;//Future develop
    public $areaName = false;//Future develop
    public $geoLocations = false;//Future develop
}

class ReturnRoomTypeStaticData {
    public $roomAmenities = true;
    public $name = true;
    public $twin = true; //NO MANDATORY BOOL
    public $roomInfo = true;
    public $specials = true;
    public $roomImages = true;
    public $roomCategory = true; //new attribute
}

class ReturnRateData {
    public $occupancy = true;
    public $status = true;
    public $rateType = true;
    public $paymentMode = true;
    public $allowsExtraMeals = true;
    public $allowsSpecialRequests = true;
    public $allowsBeddingPreference = true;
    public $allowsSpecials = true;
    public $passengerNamesRequiredForBooking = true;
    public $allocationDetails = true;
    public $minStay = true;
    public $dateApplyMinStay = true;
    public $cancellationRules = true;
    public $withinCancellationDeadline = true;
    public $tariffNotes = true;
    public $isBookable = true;
    public $onRequest = true;
    public $total = true;
    public $dates = true;
    public $freeStay = true;
    public $discount = true; 
    public $dayOnRequest = true;
    public $including = true;
    public $dailyLeftToSell = true;
    public $dailyMinStay = true;
    public $leftToSell = true; 
    public $specials = true;
}
