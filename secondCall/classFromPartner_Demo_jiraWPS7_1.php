<?php

namespace Hotel\StaticData;

class StaticInput {

    public $hotelIds = array(
        0 => 143596,
        1 => 31094,
        2 => 994005,
        3 => 856915,
        4 => 446025,
        5 => 911115,
        6 => 30924,
        7 => 994075,
        8 => 30604,
        9 => 30864,
        10 => 31354,
        11 => 30844,
        12 => 31194,
        13 => 120022,
        14 => 133294,
        15 => 93336,
        16 => 56234,
        17 => 108262,
        18 => 122554,
        19 => 306225,
        20 => 870045,
        21 => 474615,
        22 => 444495,
        23 => 911475,
        24 => 231096,
        25 => 244386,
        26 => 30524,
        27 => 92008,
        28 => 122314,
        29 => 31444,
        30 => 75464,
        31 => 133044,
        32 => 30894,
        33 => 30664,
        34 => 133064,
        35 => 39774,
        36 => 1466648,
        37 => 31434,
        38 => 920055,
        39 => 133104,
        40 => 133264,
        41 => 30534,
        42 => 55584,
        43 => 933445,
        44 => 130014,
        45 => 223496,
        46 => 149176,
        47 => 31084,
        48 => 31264,
        49 => 30704,
        50 => 130244,
        51 => 30754,
        52 => 41784,
        53 => 444505,
        54 => 31384,
        55 => 45364,
        56 => 31054,
        57 => 120182,
        58 => 30914,
        59 => 30734,
        60 => 142534,
        61 => 108452,
        62 => 30964,
        63 => 53754,
        64 => 921085,
        65 => 31064,
        66 => 39784,
        67 => 148506,
        68 => 82390,
        69 => 86390,
        70 => 138024,
        71 => 31404,
        72 => 932925,
        73 => 31274,
        74 => 925775,
        75 => 30584,
        76 => 30774,
        77 => 30834,
        78 => 490195,
        79 => 86449,
        80 => 104941,
        81 => 30854,
        82 => 135494,
        83 => 31034,
        84 => 119242,
        85 => 941015,
        86 => 31154,
        87 => 117662,
        88 => 120012,
        89 => 444455,
        90 => 868985,
        91 => 89720,
        92 => 919425,
        93 => 30814,
        94 => 572035,
        95 => 977905,
        96 => 30824,
        97 => 967195,
        98 => 952585,
        99 => 30644,
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
    public $geoPoint = true;
    public $chain = true;
    public $lastUpdated = true;

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
