<?php

namespace Hotel\StaticData;

class StaticInput {
//941895 //139534
    public $hotelIds = array (
    30304 => 
    array (
      //0 => 6163655,
      //1 => 18669785,
      //2 => 18669795,
      //3 => 18669805,
      //4 => 18669815,
    ),
    );
    public $LanguageId = 20;
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
    public $address = true;
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
    //public $fullAddress = false;//Future develop
    //public $attraction = false;//Future develop
    public $exclusive = true; //new in tickets


}

class ReturnRoomTypeStaticData {
    public $roomAmenities = true;
    public $name = true;
    public $twin = true; //NO MANDATORY BOOL
    public $roomInfo = true;
    public $specials = false; //new
    public $roomImages = false; //new
}

class ReturnRateData {
    public $occupancy = true; //new
    public $status = true;
    public $rateType = true;
    public $paymentMode = true; //new
    public $allowsExtraMeals = true;
    public $allowsSpecialRequests = true;
    public $allowsBeddingPreference = true;
    public $allowsSpecials = true; //new
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
    public $discount = true; //new
    public $dayOnRequest = true;
    public $including = true;
    public $dailyLeftToSell = true; //new
    public $dailyMinStay = true;
    public $leftToSell = true; //change
    public $specials = true;
}
