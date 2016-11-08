<?php

namespace Hotel\StaticData;

class StaticInput {

    public $hotelIds = array(
        26804 =>
        array(
            0 => 49384,
            1 => 49414,
            2 => 49424,
            3 => 49434,
            4 => 273612,
            5 => 273642,
            6 => 852666,
            7 => 852676,
            8 => 852686,
            9 => 852696,
            10 => 858076,
            11 => 858086,
            12 => 858096,
            13 => 858106,
            14 => 858116,
            15 => 858126,
            16 => 858136,
            17 => 858146,
            18 => 858156,
            19 => 858166,
            20 => 858176,
            21 => 858186,
            22 => 858196,
            23 => 858206,
            24 => 858216,
            25 => 858226,
            26 => 858236,
            27 => 858246,
            28 => 858256,
            29 => 858266,
            30 => 858276,
            31 => 858286,
            32 => 858296,
            33 => 858306,
            34 => 858316,
            35 => 858326,
            36 => 5492605,
            37 => 5492645,
            38 => 6027855,
            39 => 6062985,
            40 => 6062995,
            41 => 6063005,
            42 => 6063015,
            43 => 12415348,
            44 => 12415718,
            45 => 12415818,
            46 => 13494578,
            47 => 13494588,
            48 => 13494598,
            49 => 13494608,
            50 => 13494618,
            51 => 13494628,
            52 => 13494638,
            53 => 13494648,
            54 => 13494658,
            55 => 13494668,
            56 => 13494678,
            57 => 13494688,
            58 => 13494698,
            59 => 13494708,
            60 => 14562468,
            61 => 18401585,
            62 => 18401595,
            63 => 18401605,
            64 => 18401615,
            65 => 18401625,
            66 => 18401635,
            67 => 18401645,
            68 => 18401655,
            69 => 18401665,
            70 => 18401675,
            71 => 18401685,
            72 => 18401695,
            73 => 18401705,
            74 => 18401715,
            75 => 18401725,
            76 => 18401745,
            77 => 18401755,
            78 => 18401765,
            79 => 18401775,
            80 => 18401785,
            81 => 18401795,
            82 => 18401805,
            83 => 18401815,
            84 => 18401825,
            85 => 18401835,
            86 => 18401845,
            87 => 18401865,
            88 => 18401875,
            89 => 18401885,
            90 => 18401895,
            91 => 18401905,
            92 => 18401915,
            93 => 18401925,
            94 => 18401935,
            95 => 18401945,
            96 => 18401965,
            97 => 18401975,
            98 => 18401985,
            99 => 18401995,
            100 => 18402005,
            101 => 20860845,
            102 => 20860935,
            103 => 20860955,
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
