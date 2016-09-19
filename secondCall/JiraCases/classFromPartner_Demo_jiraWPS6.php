<?php

namespace Hotel\StaticData;

class StaticInput {

    public $hotelIds = array(
        941895 => array(0 => 6163655,),
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
    public $description2 = false;
    public $geoPoints = false;
    public $ratingDescription = true;
    public $images = true;
    public $direct = false;
    public $hotelPreference = false;
    public $builtYear = false;
    public $renovationYear = false;
    public $floors = false;
    public $noOfRooms = false;
    public $luxury = true;
    public $address = false;
    public $zipCode = false;
    public $location = true;
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
    public $hotelPhone = true;
    public $hotelCheckIn = false;
    public $hotelCheckOut = false;
    public $minAge = false;
    public $rating = true;
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
//    public $status = true;
//    public $rateType = true;
//    public $allowsExtraMeals = true;
//    public $allowsSpecialRequests = true;
//    public $allowsBeddingPreference = true;
//    public $passengerNamesRequiredForBooking = true;
//    public $allocationDetails = true;
//    public $cancellationRules = true;
//    public $minStay = true;
//    public $withinCancellationDeadline = true;
//    public $isBookable = true;
//    public $onRequest = true;
//    public $total = true;
//    public $dates = true;
//    public $specials = true;
//    public $tariffNotes = true;
//    public $dayOnRequest = true;
//    public $including = true;
//    public $leftToSellDaily = true;
//    public $dailyMinStay = true;
//    public $freeStay = true;
}
