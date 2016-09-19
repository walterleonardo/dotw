<?php

namespace Hotel\StaticData;

class StaticInput {

    public $hotelIds = array(
        // 1114368 => array(), //false direct
        //941895 => array(0 => 6163655,), //true direct
        //34=> array(0 => 3489555,),
        34 => 
    array (
      0 => '14',
      1 => '24',
      2 => '34',
      3 => '265212',
      4 => '1892835',
      5 => '1892845',
      6 => '1892855',
      7 => '2355095',
      8 => '2355105',
      9 => '2355115',
      10 => '2355125',
      11 => '2355135',
      12 => '2355145',
      13 => '3489535',
      14 => '3489555',
      15 => '3489575',
      16 => '6047365',
      17 => '6047375',
      18 => '6238335',
      19 => '6241405',
      20 => '6241415',
      21 => '6241425',
      22 => '6241435',
      23 => '6735845',
      24 => '8546268',
      25 => '8546388',
      26 => '8546398',
      27 => '8546408',
      28 => '8546418',
      29 => '8546428',
      30 => '8546438',
      31 => '8547148',
      32 => '9029178',
      33 => '11907298',
      34 => '11907308',
      35 => '11907318',
      36 => '11907328',
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
