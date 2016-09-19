<?php

namespace Hotel\StaticData;

class StaticInput {

    public $hotelIds = array(
        30954 => array(
            0 => 60694,
            1 => 60704,
            2 => 60714,
            3 => 60724,
            4 => 60734,
            5 => 60744,
            6 => 224889,
            7 => 1251755,
            8 => 1251765,
            9 => 1251775,
            10 => 1251785,
            11 => 1251795,
            12 => 1251805,
            13 => 1251815,
            14 => 2307285,
            15 => 5169345,
            16 => 5370455,
            17 => 6564025,
            18 => 6564035,
            19 => 6564045,
            20 => 7687438,
            21 => 7687458,
            22 => 7687478,
            23 => 7687498,
            24 => 7688638,
            25 => 7692168,
            26 => 7706438,
            27 => 7706458,
            28 => 7706488,
            29 => 9242698,
            30 => 9242708,
            31 => 9242718,
            32 => 9501088,
            33 => 11525958,
            34 => 17739848,
            35 => 17739858,
            36 => 17739868,
            37 => 19565755,
            38 => 19565765,
            39 => 19565775,
            40 => 19565785,
            41 => 19565795,
            42 => 19565805,
            43 => 19565815,
            44 => 19565825,
            45 => 19565835,
            46 => 19565845,
            47 => 19565855,
            48 => 19565865,
            49 => 19565875,
            50 => 19565885,
            51 => 19565895,
            52 => 19565905,
            53 => 19565915,
            54 => 19565925,
            55 => 20501095,
            56 => 20501105,
            57 => 20501115,
            58 => 20501125,
            59 => 20501135,
            60 => 20501145,
            61 => 20501155,
            62 => 20501165,
            63 => 20501175,
        )
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
    public $attraction = false;
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
    public $geoPoint = false;
    public $chain = false;
    public $lastUpdated = false;

}

class ReturnRoomTypeStaticData {

    public $twin = true; //NO MANDATORY BOOL
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
