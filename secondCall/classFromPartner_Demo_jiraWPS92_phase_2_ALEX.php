<?php

namespace Hotel\StaticData;

class StaticInput {
//941895 //139534
    public $hotelIds = array (
    71934 => 
    array (
       0 => 116084
                    ,1 => 116094
                    ,2 => 116104
                    ,3 => 213565
                    ,4 => 1058855
                    ,5 => 1058865
                    ,6 => 1058875
                    ,7 => 1235645
                    ,8 => 1235655
                    ,9 => 1235675
                    ,10 => 1235695
                    ,11 => 1235705
                    ,12 => 1235725
                    ,13 => 1235745
                    ,14 => 1235755
                    ,15 => 1235775
                    ,16 => 1235795
                    ,17 => 1235815
                    ,18 => 1235825
                    ,19 => 1582285
                    ,20 => 2824455
                    ,21 => 3450525
                    ,22 => 12114668
                    ,23 => 12114678
                    ,24 => 12114688
                    ,25 => 12114698
                    ,26 => 12114748
                    ,27 => 12114768
                    ,28 => 12114778
                    ,29 => 12114788
                    ,30 => 12114808
                    ,31 => 12114818
                    ,32 => 12114828
                    ,33 => 12114838
                    ,34 => 12114878
                    ,35 => 12114888
                    ,36 => 15397648
                    ,37 => 18083928
                    ,38 => 18083938
                    ,39 => 18083948
                    ,40 => 61846472
                    ,41 => 61851183
                    ,42 => 61851185
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
    public $address = true;
    public $zipCode = false;
    public $location = true;
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
    public $rating = true;
    public $fireSafety = false;
    public $chain = false;
    public $lastUpdated = false;
    public $transferMandatory = false;
    public $tariffNotes = false;
    public $chainName = false;
    public $hotelProperty = false;
    public $fullAddress = false;//Future develop
    public $exclusive = true; 
    public $attraction = true;//Future develop
    public $areaCode = false;//Future develop
    public $areaName = false;//Future develop
    public $geoLocations = false;//Future develop
}

class ReturnRoomTypeStaticData {
    public $roomAmenities = true;
    public $name = true;
    public $supplierRoomName = true;
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
