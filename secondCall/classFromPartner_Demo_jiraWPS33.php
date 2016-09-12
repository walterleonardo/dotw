<?php

namespace Hotel\StaticData;

class StaticInput {

    public $hotelIds = array(
44 => 
    array (
      0 => 44,
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
    //public $description1 = false; //NO MANDATORY BOOL
    public $description2 = true;
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
    //public $attraction = false;
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
    //public $geoPoint = true;
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
