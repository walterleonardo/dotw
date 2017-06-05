<?php

namespace Hotel\StaticData;


class StaticInput
{

    public $hotelIds = array();


    /**
     * @var ReturnHotelStaticData;
     */
    public $ReturnHotelStaticData;


    /**
     * @var ReturnRoomTypeStaticData;
     */
    public $ReturnRoomTypeStaticData;

        function __construct() {
$this->ReturnHotelStaticData = new ReturnHotelStaticData();
$this->ReturnRoomTypeStaticData = new ReturnRoomTypeStaticData();
}
}