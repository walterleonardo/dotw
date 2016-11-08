<?php

namespace Hotel\StaticData;

class StaticInput {

    public $hotelIds = array(
        30814 =>
        array(
            0 => 59904,
            1 => 59914,
            2 => 59924,
            3 => 59934,
            4 => 59944,
            5 => 386574,
            6 => 386584,
            7 => 386594,
            8 => 386604,
            9 => 386614,
            10 => 386624,
            11 => 386634,
            12 => 386644,
            13 => 386654,
            14 => 1249625,
            15 => 1249635,
            16 => 1249645,
            17 => 1249655,
            18 => 1249665,
            19 => 1249675,
            20 => 1249685,
            21 => 1249705,
            22 => 1249725,
            23 => 1249745,
            24 => 1249775,
            25 => 1249795,
            26 => 2306555,
            27 => 11580728,
            28 => 11580738,
            29 => 11580748,
            30 => 11580758,
            31 => 11580768,
            32 => 11586828,
            33 => 11586838,
            34 => 11586848,
            35 => 11586858,
            36 => 11586868,
            37 => 11586878,
            38 => 11586888,
            39 => 11586898,
            40 => 11586908,
            41 => 17398288,
            42 => 17715008,
            43 => 17715018,
            44 => 17715028,
            45 => 17734778,
            46 => 17734788,
            47 => 17734798,
            48 => 17734808,
            49 => 17734818,
            50 => 17734828,
            51 => 17734838,
            52 => 17734848,
            53 => 17789738,
            54 => 17789848,
            55 => 17789858,
            56 => 17789928,
            57 => 17789958,
            58 => 17789968,
            59 => 17789978,
            60 => 17790018,
            61 => 17790048,
            62 => 17790088,
            63 => 17790098,
            64 => 17790408,
            65 => 17790428,
            66 => 17790448,
            67 => 17790468,
            68 => 17790478,
            69 => 17790528,
            70 => 17790738,
            71 => 17791108,
            72 => 20512945,
            73 => 20512955,
            74 => 20512965,
            75 => 20512975,
            76 => 20605285,
            77 => 20605295,
            78 => 20605305,
            79 => 20605315,
            80 => 20680345,
            81 => 20680355,
            82 => 20680365,
            83 => 20680375,
            84 => 20680385,
            85 => 20680395,
            86 => 20680405,
            87 => 20680415,
            88 => 20680425,
            89 => 20680435,
            90 => 20680445,
            91 => 20680455,
            92 => 20680465,
            93 => 20680475,
            94 => 20680485,
            95 => 20680495,
            96 => 20680505,
            97 => 20680515,
            98 => 20680525,
            99 => 20680535,
            100 => 20680545,
            101 => 20680555,
            102 => 20680565,
            103 => 20680575,
            104 => 20680585,
            105 => 20680595,
            106 => 20680605,
            107 => 20680615,
            108 => 20680625,
            109 => 20680635,
            110 => 20680645,
            111 => 20680655,
            112 => 20680665,
            113 => 20680675,
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
    public $fullAddress = true;

}

class ReturnRoomTypeStaticData {

    public $twin = true; //NO MANDATORY BOOL
    public $roomAmenities = true;
    public $name = true;
    public $roomInfo = true;
    public $specials = true;
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
