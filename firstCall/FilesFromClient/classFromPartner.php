<?php

/*
 * This file include all the CLASS from the CLIENT.
 */

namespace Hotel\PreSupplier;

class Input {

    public $customerId = 164; //integer
    public $environment = 'prod'; //string
    public $requestSource = 1; //integer
    public $passengerNationalityOrResidenceProvided = true; //boolean
    public $hotelIds = array(14, 24, 34,44,54,64); //array(int)
    public $city = NULL; //integer
    public $bookingChannelsWithAutoMapping = array(1, 2, 3); //array(int)
    public $bookingChannelTypes = array(1, 2, 3); //array(int)

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

}

class RoomOccupancy {

    public $adults = 1; //integer
    public $children = array(5, 5, 10); //array(int)
    public $twin = false; //boolean
    public $extraBed = false; //boolean

}

class RoomTypeFilters {

    public $suite = 1; //integer
    public $roomAmenitie = array(1, 2, 3); //array(int)
    public $roomId = array(1, 2, 3); //array(int)
    public $roomName = 'string'; //string

}

class HotelFilters {

    public $rating = array(1, 2, 3); //array(int)
    public $luxury = 1; //integer
    public $location = 'string'; //string
    public $locationId = array(1, 2, 3); //array(int)
    public $amenitie = array(1, 2, 3); //array(int)
    public $leisure = array(1, 2, 3); //array(int)
    public $business = array(1, 2, 3); //array(int)
    public $hotelPreference = array(1, 2, 3); //array(int)
    public $chain = array(1, 2, 3); //array(int)
    public $attraction = 'string'; //string
    public $hotelName = 'string'; //string
    public $builtYear = 2; //integer
    public $renovationYear = 2; //integer
    public $floors = 2; //integer
    public $noOfRooms = 3; //integer
    public $fireSafety = 4; //integer
    public $lastUpdated = 'DATE'; //string

}

class StaticInput {

    public $hotelIds = array(12, 123, 1234, 12345, 123456, 1234567, 12345678, 12); //MANDATORY ARRAY

    /**
     * @var ReturnHotelStaticData;
     */
    public $ReturnHotelStaticData = array(); //MANDATORY ARRAY VARIOS

    /**
     * @var ReturnRoomTypeStaticData;
     */
    public $ReturnRoomTypeStaticData = array(); // NO MANDATORY ARRAY VARIOS

}

class ReturnRoomTypeStaticData {

    public $twin = NULL; //NO MANDATORY BOOL
    public $roomAmenities = FALSE;
    public $name = TRUE;
    public $roomInfo;

}

class ReturnHotelStaticData {

    public $description1; //NO MANDATORY BOOL
    public $description2 = NULL;
    public $geoPoints = false;
    public $ratingDescription = false;
    public $images = true;
    public $direct = NULL;
    public $hotelPreference;
    public $builtYear;
    public $renovationYear;
    public $floors;
    public $noOfRooms;
    public $luxury;
    public $address;
    public $zipCode;
    public $location;
    public $locationId;
    public $location1;
    public $location2;
    public $location3;
    public $stateName;
    public $stateCode;
    public $countryName;
    public $regionName;
    public $regionCode;
    public $attraction;
    public $amenitie;
    public $leisure;
    public $business;
    public $transportation;
    public $hotelPhone;
    public $hotelCheckIn;
    public $hotelCheckOut;
    public $minAge;
    public $rating;
    public $fireSafety;
    public $geoPoint;
    public $chain;
    public $lastUpdated;

}
