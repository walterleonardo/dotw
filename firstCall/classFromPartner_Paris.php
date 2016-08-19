<?php

/*
 * This file include all the CLASS from the CLIENT.
 */

namespace Hotel\PreSupplier;

class Input {

    public $customerId = 1078348; //integer
    public $environment = 'dev'; //string
    public $requestSource = 1; //integer
    public $passengerNationalityOrResidenceProvided = false; //boolean
    public $hotelIds = array(); //array(int)
    public $city = 7674; //string7674 Paris
    public $country = null;
    public $bookingChannelsWithAutoMapping = array(1011, 1003, 1004,1529,1005,1017,1022,1027); //array(int)
    public $bookingChannelTypes = array(); //array(int)

    /**
     * @var array of RoomOccupancy
     */
    public $RoomOccupancy = array(); //array(varios)

    /**
     * @var HotelFilters
     */
    public $HotelFilters = array(); //array(varios)

    /**
     * @var RoomTypeFilters
     */
    public $RoomTypeFilters = array(); //array(varios)

    /**
     * @var AtomicFilter or ComplexFilter
     *
     * not used anymore
     *
     */
    public $AdditionalFilters = null; //array(varios)
       function __construct() {
           $this->RoomOccupancy = array(new RoomOccupancy(),new RoomOccupancy());
           $this->HotelFilters = new HotelFilters();
           $this->RoomTypeFilters = new RoomTypeFilters();
       }
}

class RoomOccupancy {

    public $adults = 1; //integer
    public $children = array(); //array(int)
    public $twin = false; //boolean
    public $extraBed = false; //boolean

}

class RoomTypeFilters {

    public $suite = null; //integer
    public $roomAmenitie = null; //array(int)
    public $roomId = null; //array(int)
    public $roomName = null; //string

}

class HotelFilters {

    public $rating = null; //array(int)
    public $luxury = null; //integer
    public $location = null; //string
    public $locationId = null; //array(int)
    public $amenitie = null; //array(int)
    public $leisure = null; //array(int)
    public $business = null; //array(int)
    public $hotelPreference = null; //array(int)
    public $chain = null; //array(int)
    public $attraction = null; //string
    public $hotelName = null; //string
    public $builtYear = null; //integer
    public $renovationYear = null; //integer
    public $floors = null; //integer
    public $noOfRooms = null; //integer
    public $fireSafety = null; //integer
    public $lastUpdated = null; //string
}



