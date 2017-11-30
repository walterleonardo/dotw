<?php

namespace Hotel\StaticData;

class StaticInput {
//941895 //139534
    public $hotelIds = array (
    139534 => 
    array (
      0 => 384084,
      1 => 384094,
      2 => 384124,
      3 => 384134,
      4 => 11579428,
      5 => 11579438,
      6 => 14419378,
      7 => 14419498,
      8 => 14419558,
      9 => 14419628,
      10 => 14476288,
      11 => 14476298,
      12 => 17778558,
      13 => 17778568,
      14 => 17778578,
      15 => 17778588,
      16 => 17778598,
      17 => 17778608,
      18 => 17778628,
      19 => 17778638,
      20 => 17779068,
      21 => 17779248,
      22 => 17779338,
      23 => 17779408,
      24 => 17779498,
      25 => 17779508,
      26 => 17779518,
      27 => 19692265,
      28 => 19692275,
      29 => 19692285,
      30 => 19692295,
      31 => 19692305,
      32 => 19692315,
      33 => 19692325,
      34 => 19692335,
      35 => 19692345,
      36 => 19692355,
      37 => 19692365,
      38 => 19692375,
      39 => 19692385,
      40 => 19692395,
      41 => 19692405,
      42 => 19692415,
      43 => 19692425,
      44 => 19692435,
      45 => 19692445,
      46 => 19692455,
      47 => 19692465,
      48 => 19692475,
      49 => 19692485,
      50 => 19692495,
      51 => 19692505,
      52 => 19692515,
      53 => 19692525,
      54 => 19692535,
      55 => 19692545,
      56 => 19692555,
      57 => 19692565,
      58 => 19692575,
      59 => 19692585,
      60 => 19692595,
      61 => 19692605,
      62 => 19692615,
      63 => 19692625,
      64 => 19692635,
      65 => 19692645,
      66 => 19692655,
      67 => 19692665,
      68 => 19878515,
      69 => 19878525,
      70 => 19878535,
      71 => 19878555,
      72 => 20508295,
      73 => 20508305,
      74 => 20508315,
      75 => 20508325,
      76 => 20508335,
      77 => 20508345,
      78 => 20508355,
      79 => 20508365,
      80 => 20508375,
      81 => 20508385,
      82 => 20508395,
      83 => 20508405,
      84 => 20508415,
      85 => 20508425,
      86 => 20508435,
      87 => 20605135,
      88 => 20605145,
      89 => 20605155,
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
    public $description1 = false; //NO MANDATORY BOOL
    public $description2 = false;
    public $geoPoint = false;
    public $ratingDescription = false;
    public $images = false;
    public $direct = false;
    public $hotelPreference = true;
    public $builtYear = false;
    public $renovationYear = false;
    public $floors = false;
    public $noOfRooms = false;
    public $luxury = false;
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
