<?php

namespace DotwCalls\SecondCall;

class StaticInput {
    public $hotelIds = array (
    2434 => 
        array (
            0 => 133414
            ,1 => 133424
            ,2 => 133434
            ,3 => 133444
            ,4 => 133454
            ,5 => 133464
            ,6 => 133474
            ,7 => 133484
            ,8 => 133494
            ,9 => 133504
            ,10 => 137316
            ,11 => 16145218
            ,12 => 16145228
            ,13 => 16145238
            ,14 => 16145248
            ,15 => 16145258
            ,16 => 16145268
            ,17 => 16145278
            ,18 => 16145288
            ,19 => 16145298
            ,20 => 16145308
            ,21 => 16145318
            ,22 => 16145328
            ,23 => 35211535
            ,24 => 56017195
            ,25 => 56017205
            ,26 => 56017215
            ,27 => 64514355
            ,28 => 64514365
            ,29 => 64514375
            ,30 => 64514385
            ,31 => 64514395
            ,32 => 64514405
            ,33 => 64514415
            ,34 => 64514425
            ,35 => 64514435
            ,36 => 64514445
            ,37 => 64514455
            ,38 => 64514465
            ,39 => 64514475
            ,40 => 76528115
            ,41 => 76531395
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
    public $fullAddress = true;
    public $exclusive = true;
    public $attraction = true;//Future develop
    public $areaCode = false;//Future develop
    public $areaName = false;//Future develop
    public $geoLocations = false;//Future develop
    public $priority = false;//Future develop
}

class ReturnRoomTypeStaticData {
    public $roomAmenities = true;
    public $name = true;
    public $supplierRoomName = true;
    public $twin = true; //NO MANDATORY BOOL
    public $roomInfo = false;
    public $specials = true;
    public $roomImages = false;
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
