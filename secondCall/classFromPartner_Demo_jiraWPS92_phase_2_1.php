<?php

namespace Hotel\StaticData;

class StaticInput {
//941895 //139534
    public $hotelIds = array (
    30304 => 
    array (
       0 => 57854
                    ,1 => 945306
                    ,2 => 5186945
                    ,3 => 5186955
                    ,4 => 5186965
                    ,5 => 5186975
                    ,6 => 5186985
                    ,7 => 5186995
                    ,8 => 5187005
                    ,9 => 5188175
                    ,10 => 5188185
                    ,11 => 5188195
                    ,12 => 5188215
                    ,13 => 5211055
                    ,14 => 5975235
                    ,15 => 6047598
                    ,16 => 6047648
                    ,17 => 7227868
                    ,18 => 9362668
                    ,19 => 9362678
                    ,20 => 10966038
                    ,21 => 11741408
                    ,22 => 11741418
                    ,23 => 13044908
                    ,24 => 13044918
                    ,25 => 13044938
                    ,26 => 13044948
                    ,27 => 13044968
                    ,28 => 13044978
                    ,29 => 13045008
                    ,30 => 14568768
                    ,31 => 14568938
                    ,32 => 14569148
                    ,33 => 14570388
                    ,34 => 14570438
                    ,35 => 14570588
                    ,36 => 15344328
                    ,37 => 17711978
                    ,38 => 17711988
                    ,39 => 17712008
                    ,40 => 17712018
                    ,41 => 17712028
                    ,42 => 17712038
                    ,43 => 17712048
                    ,44 => 17712058
                    ,45 => 17712068
                    ,46 => 17712078
                    ,47 => 17712088
                    ,48 => 17712098
                    ,49 => 17813338
                    ,50 => 17813348
                    ,51 => 17813358
                    ,52 => 17813368
                    ,53 => 17813378
                    ,54 => 17813388
                    ,55 => 17813398
                    ,56 => 17813408
                    ,57 => 17813418
                    ,58 => 17813428
                    ,59 => 17813438
                    ,60 => 17813448
                    ,61 => 17813458
                    ,62 => 17813468
                    ,63 => 17813478
                    ,64 => 17813488
                    ,65 => 17813498
                    ,66 => 17813508
                    ,67 => 17813518
                    ,68 => 17813528
                    ,69 => 17813538
                    ,70 => 17813548
                    ,71 => 17813558
                    ,72 => 17813568
                    ,73 => 17813578
                    ,74 => 17813588
                    ,75 => 17813598
                    ,76 => 17813608
                    ,77 => 17813618
                    ,78 => 17813628
                    ,79 => 17813638
                    ,80 => 17813648
                    ,81 => 17813658
                    ,82 => 17813668
                    ,83 => 17813678
                    ,84 => 17813688
                    ,85 => 17813698
                    ,86 => 17813708
                    ,87 => 17813718
                    ,88 => 17813728
                    ,89 => 17813738
                    ,90 => 17813748
                    ,91 => 17813758
                    ,92 => 17813768
                    ,93 => 17813778
                    ,94 => 17813788
                    ,95 => 17813798
                    ,96 => 17813808
                    ,97 => 17813818
                    ,98 => 17813838
                    ,99 => 20504445
                    ,100 => 20504455
                    ,101 => 20504465
                    ,102 => 20504475
                    ,103 => 20504485
                    ,104 => 20504495
                    ,105 => 20504505
                    ,106 => 20504515
                    ,107 => 20504525
                    ,108 => 20938608
                    ,109 => 20945208
                    ,110 => 20948401
                    ,111 => 20948402
                    ,112 => 20948403
                    ,113 => 20948443
                    ,114 => 20948444
                    ,115 => 41586209
                    ,116 => 41586210
                    ,117 => 41586211
                    ,118 => 41586212
                    ,119 => 41586213
                    ,120 => 41586214
                    ,121 => 41586215
                    ,122 => 61842410
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
    public $address = false;
    public $zipCode = false;
    public $location = false;
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
    public $rating = false;
    public $fireSafety = false;
    public $chain = false;
    public $lastUpdated = false;
    public $transferMandatory = false;
    public $tariffNotes = false;
    public $chainName = false;
    public $hotelProperty = false;
    public $fullAddress = false;//Future develop
    public $exclusive = false; 
    public $attraction = false;//Future develop
    public $areaCode = false;//Future develop
    public $areaName = false;//Future develop
    public $geoLocations = false;//Future develop
}

class ReturnRoomTypeStaticData {
    public $roomAmenities = false;
    public $name = false;
    public $supplierRoomName = true;
    public $twin = false; //NO MANDATORY BOOL
    public $roomInfo = false;
    public $specials = false;
    public $roomImages = false;
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
