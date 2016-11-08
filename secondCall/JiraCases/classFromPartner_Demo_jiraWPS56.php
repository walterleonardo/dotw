<?php

namespace Hotel\StaticData;

class StaticInput {

    public $hotelIds = array(
        18464 => array(
            0 => 34324,
            1 => 34334,
            2 => 34344,
            3 => 34354,
            4 => 34364,
            5 => 34374,
            6 => 34384,
            7 => 411746,
            8 => 2512525,
            9 => 2512535,
            10 => 2512545,
            11 => 2512555,
            12 => 2512565,
            13 => 2512575,
            14 => 2512585,
            15 => 2512595,
            16 => 2512605,
            17 => 2512615,
            18 => 2512625,
            19 => 2512635,
            20 => 2512645,
            21 => 2512655,
            22 => 2512665,
            23 => 2512675,
            24 => 2512685,
            25 => 2512695,
            26 => 2512705,
            27 => 2512715,
            28 => 2512725,
            29 => 2512735,
            30 => 3636895,
            31 => 6221375,
            32 => 6221385,
            33 => 12838108,
            34 => 12838128,
            35 => 12838318,
            36 => 12838418,
            37 => 12838518,
            38 => 13336468,
            39 => 13336478,
            40 => 13336488,
            41 => 13336498,
            42 => 15048638,
            43 => 15048648,
            44 => 15048658,
            45 => 15048668,
            46 => 15048678,
            47 => 15048688,
            48 => 15048698,
            49 => 15048708,
            50 => 15054598,
            51 => 15054608,
            52 => 15054618,
            53 => 15054628,
            54 => 15054638,
            55 => 15054648,
            56 => 15054658,
            57 => 15054668,
        ),
        17184 =>
        array(
            0 => 29314,
            1 => 29334,
            2 => 332524,
            3 => 8909218,
            4 => 8911998,
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
