<?php

namespace Hotel\StaticData;

class StaticInput {

    public $hotelIds = Array
        (
            34 => Array
                (
                    0 => 15335608,
                    1 => 15335658,
                    2 => 15335718,
                    3 => 15335808,
                    4 => 15574898,
                    5 => 15574918,
                    6 => 15574928,
                    7 => 8546398,
                    8 => 8546388,
                    9 => 8546268,
                    10 => 8546408,
                    11 => 8546438,
                    12 => 8546418,
                    13 => 8546428,
                    14 => 8547148,
                    15 => 1892845,
                    16 => 1892855,
                    17 => 34,
                    18 => 16325428,
                    19 => 14,
                    20 => 16325398,
                    21 => 16325408,
                    22 => 16325418,
                    23 => 2355115,
                    24 => 2355135,
                    25 => 2355145,
                    26 => 2355125,
                    27 => 2355105,
                    28 => 2355095,
                ),

            44 => Array
                (
                    0 => 14165188,
                    1 => 14165268,
                    2 => 3865315,
                    3 => 3865295,
                    4 => 3865245,
                    5 => 3865235,
                    6 => 3865305,
                    7 => 3865285,
                    8 => 9312388,
                    9 => 3865265,
                    10 => 3865255,
                    11 => 1385075,
                    12 => 9312398,
                    13 => 3865275,
                    14 => 9312408,
                    15 => 1385065,
                    16 => 1385055,
                    17 => 9316448,
                    18 => 1385085,
                    19 => 1385095,
                    20 => 2414325,
                    21 => 2413855,
                    22 => 2414335,
                    23 => 2413865,
                    24 => 2414345,
                    25 => 2413875,
                    26 => 2414355,
                    27 => 2413885,
                    28 => 44,
                    29 => 2414365,
                    30 => 2414375,
                    31 => 2413895,
                    32 => 16322588,
                    33 => 2355275,
                    34 => 2355255,
                    35 => 2355265,
                    36 => 2355285,
                    37 => 2355295,
                    38 => 2355245,
                ),

            74 => Array
                (
                    0 => 13590818,
                    1 => 13590918,
                    2 => 13612048,
                    3 => 13620158,
                    4 => 13623788,
                    5 => 13643188,
                    6 => 13647788,
                    7 => 13652218,
                    8 => 16178458,
                    9 => 6736265,
                    10 => 16178518,
                    11 => 16178558,
                    12 => 6736285,
                    13 => 2415275,
                    14 => 2415285,
                    15 => 2415295,
                    16 => 2415305,
                    17 => 2415315,
                    18 => 16322108,
                    19 => 2354805,
                    20 => 16322158,
                    21 => 16322078,
                    22 => 16322098,
                    23 => 16322118,
                    24 => 16321788,
                    25 => 16321708,
                    26 => 16321738,
                    27 => 2354815,
                    28 => 2354825,
                    29 => 16322148,
                    30 => 16322068,
                    31 => 2354785,
                    32 => 16322138,
                    33 => 2354795,
                ),

         

            799075 => Array
                (
                    0 => 6858715,
                    1 => 3973065,
                    2 => 6861445,
                    3 => 3973055,
                    4 => 6897068,
                    5 => 4034055,
                    6 => 4039965,
                    7 => 11551938,
                    8 => 3973045,
                    9 => 6858725,
                    10 => 4212815,
                    11 => 6870805,
                    12 => 4234575,
                    13 => 3973035,
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
    public $chain = true;
    public $lastUpdated = true;
    public $transferMandatory = true;
    public $tariffNotes = true;
    public $chainName = true;
    public $hotelProperty = true;

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
    public $minStay = false;
    public $withinCancellationDeadline = true;
    public $isBookable = true;
    public $onRequest = true;
    public $total = true;
    public $dates = true;
    public $specials = true;
    public $tariffNotes = false;
    public $dayOnRequest = false;
    public $including = false;
    public $leftToSellDaily = true;
    public $dailyMinStay = true;
    public $freeStay = false;

}
