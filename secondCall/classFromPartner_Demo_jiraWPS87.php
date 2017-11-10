<?php

namespace Hotel\StaticData;

class StaticInput {
//941895 //139534
    public $hotelIds = array (
    369875 => 
    array (
      //0 => 6163655,
      //1 => 18669785,
      //2 => 18669795,
      //3 => 18669805,
      //4 => 18669815,
    ),
    );
    public $LanguageId = 12;
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
    public $geoPoint = false;
    public $ratingDescription = false;
    public $images = false;
    public $direct = false;
    public $hotelPreference = true;
    public $builtYear = false;
    public $renovationYear = false;
    public $floors = false;
    public $noOfRooms = false;
    public $luxury = true;
    public $address = true;
    public $zipCode = false;
    public $location = true;
    public $locationId = true;
    public $location1 = true;
    public $location2 = true;
    public $location3 = true;
    public $stateName = false;
    public $stateCode = false;
    public $countryName = false;
    public $regionName = false;
    public $regionCode = false;
    public $amenitie = true;
    public $leisure = true;
    public $business = true;
    public $transportation = false;
    public $hotelPhone = false;
    public $hotelCheckIn = false;
    public $hotelCheckOut = false;
    public $minAge = false;
    public $rating = true;
    public $fireSafety = false;
    public $chain = true;
    public $lastUpdated = false;
    public $transferMandatory = false;
    public $tariffNotes = false;
    public $chainName = false;
    public $hotelProperty = false;
    public $fullAddress = false;
    public $attraction = false;
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
