<?php

namespace Hotel\PreSupplier;


class StaticInput
{

    public $hotelIds = array(
'30954' => array(6564025, 6564045,6564035),
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
//$this->ReturnRoomTypeStaticData = new ReturnRoomTypeStaticData();
}

}