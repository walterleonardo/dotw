<?php

namespace Hotel\StaticData;

class StaticInput {

    public $hotelIds = array(
        23314 =>
        array(
            0 => 123214,
            1 => 1568675,
            2 => 1568685,
            3 => 1972835,
            4 => 1972845,
            5 => 1972855,
            6 => 1972865,
            7 => 2613705,
            8 => 3544635,
            9 => 5296745,
            10 => 11579788,
            11 => 11914078,
            12 => 11914088,
            13 => 11914098,
            14 => 11951458,
            15 => 11951548,
            16 => 11951558,
            17 => 11951568,
            18 => 11951578,
            19 => 11951588,
            20 => 11951638,
            21 => 12366518,
            22 => 12366578,
            23 => 12366708,
            24 => 12366748,
            25 => 12366778,
            26 => 12366948,
            27 => 12366978,
            28 => 12367088,
            29 => 12367118,
            30 => 15127098,
            31 => 16409598,
            32 => 16409618,
            33 => 16409638,
            34 => 16409668,
            35 => 17071878,
            36 => 17622968,
            37 => 17932698,
            38 => 17932708,
            39 => 17932718,
            40 => 17932728,
            41 => 20701885,
            42 => 20701895,
            43 => 20701905,
            44 => 20701915,
            45 => 20701925,
            46 => 20701935,
            47 => 20701945,
            48 => 20701955,
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
