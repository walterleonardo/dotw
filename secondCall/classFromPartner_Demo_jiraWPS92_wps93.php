<?php

namespace Hotel\StaticData;

class StaticInput {
//941895 //139534
    public $hotelIds = array (
    33464 => 
    array (
        0=> 15413978
// 0  => 1195115
//                    ,1  => 1195125
//                    ,2  => 1195165
//                    ,3  => 1195185
//                    ,4  => 1195215
//                    ,5  => 1790305
//                    ,6  => 1790315
//                    ,7  => 1790325
//                    ,8  => 1790335
//                    ,9  => 1790345
//                    ,10  => 1790355
//                    ,11  => 1790365
//                    ,12  => 1790375
//                    ,13  => 1790385
//                    ,14  => 1790395
//                    ,15  => 1790405
//                    ,16  => 1790415
//                    ,17  => 1790425
//                    ,18  => 1790435
//                    ,19  => 1790445
//                    ,20  => 1790455
//                    ,21  => 1790465
//                    ,22  => 1790475
//                    ,23  => 3556265
//                    ,24  => 3556275
//                    ,25  => 6121265
//                    ,26  => 6121275
//                    ,27  => 6561745
//                    ,28  => 6561775
//                    ,29  => 9489128
//                    ,30  => 9489158
//                    ,31  => 9489198
//                    ,32  => 11412548
//                    ,33  => 11705468
//                    ,34  => 11705478
//                    ,35  => 11705488
//                    ,36  => 11705498
//                    ,37  => 11948258
//                    ,38  => 12093808
//                    ,39  => 12093948
//                    ,40  => 12093968
//                    ,41  => 12094038
//                    ,42  => 12094088
//                    ,43  => 12094398
//                    ,44  => 12094608
//                    ,45  => 12094908
//                    ,46  => 12095748
//                    ,47  => 12095778
//                    ,48  => 12095908
//                    ,49  => 12096038
//                    ,50  => 12096188
//                    ,51  => 12096258
//                    ,52  => 12096318
//                    ,53  => 12096478
//                    ,54  => 12096678
//                    ,55  => 12096688
//                    ,56  => 12096828
//                    ,57  => 12098368
//                    ,58  => 12098438
//                    ,59  => 12098538
//                    ,60  => 12098728
//                    ,61  => 12098838
//                    ,62  => 12098998
//                    ,63  => 12099128
//                    ,64  => 13363948
//                    ,65  => 13363958
//                    ,66  => 13363968
//                    ,67  => 13363978
//                    ,68  => 13363988
//                    ,69  => 13363998
//                    ,70  => 13535848
//                    ,71  => 13535938
//                    ,72  => 13535958
//                    ,73  => 13535988
//                    ,74  => 13536008
//                    ,75  => 14966178
//                    ,76  => 15413888
//                    ,77  => 15413938
//                    ,78  => 15413948
//                    ,79  => 15413958
//                    ,80  => 15413978
//                    ,81  => 15576688
//                    ,82  => 15679348
//                    ,83  => 19535875
//                    ,84  => 19535885
//                    ,85  => 19535895
//                    ,86  => 19535905
//                    ,87  => 19535915
//                    ,88  => 20780795
//                    ,89  => 20780805
//                    ,90  => 20780815
//                    ,91  => 20780825
//                    ,92  => 20780835
//                    ,93  => 20780845
//                    ,94  => 20780855
//                    ,95  => 20780865
//                    ,96  => 20780875
//                    ,97  => 20780885
//                    ,98  => 20780895
//                    ,99  => 20780905
//                    ,100  => 20780915
//                    ,101  => 20780925
//                    ,102  => 20780935
//                    ,103  => 20780945
//                    ,104  => 20780955
//                    ,105  => 20780965
//                    ,106  => 20780975
//                    ,107  => 20780985
//                    ,108  => 20780995
//                    ,109  => 20781005
//                    ,110  => 20781015
//                    ,111  => 20781025
//                    ,112  => 20781035
//                    ,113  => 20781045
//                    ,114  => 20781055
//                    ,115  => 20781065
//                    ,116  => 20781075
//                    ,117  => 20781085
//                    ,118  => 20781095
//                    ,119  => 20781105
//                    ,120  => 20781115
//                    ,121  => 20781125
//                    ,122  => 20781135
//                    ,123  => 20781145
//                    ,124  => 20781155
//                    ,125  => 20781165
//                    ,126  => 20781175
//                    ,127  => 20781185
//                    ,128  => 20781195
//                    ,129  => 20781205
//                    ,130  => 20781215
//                    ,131  => 20781225
//                    ,132  => 20781255
//                    ,133  => 20938224
//                    ,134  => 20938225
//                    ,135  => 20938226
//                    ,136  => 20938227
//                    ,137  => 20938228
//                    ,138  => 20938229
//                    ,139  => 20938230
//                    ,140  => 20938231
//                    ,141  => 20938232
//                    ,142  => 20938233
//                    ,143  => 34720742
//                    ,144  => 61846242
//                    ,145  => 61846243
//                    ,146  => 61846324
//                    ,147  => 61846428
//                    ,148  => 61846471
//                    ,149  => 61846481
//                    ,150  => 61847725
//                    ,151  => 61847727
//                    ,152  => 61847987
//                    ,153  => 61847988
//                    ,154  => 61848607
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
    public $roomAmenities = true;
    public $name = true;
    public $twin = true; //NO MANDATORY BOOL
    public $roomInfo = true;
    public $specials = true;
    public $roomImages = true;
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
