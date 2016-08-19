<?php

namespace Hotel\PreSupplier;


class StaticInput
{

    public $hotelIds = array(
'14' => array(166350, 6043085),
'24' => array(4,950076),
    34,44,54,64,74
); //MANDATORY ARRAY
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