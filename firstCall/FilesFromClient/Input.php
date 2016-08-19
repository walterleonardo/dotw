<?php

namespace Hotel\PreSupplier;


class Input
{

    public $customerId = 0;
    public $environment = '';
    public $requestSource = 0;
    public $passengerNationalityOrResidenceProvided = false;
    public $hotelIds = array();
    public $city = 0;
    public $bookingChannelsWithAutoMapping = array();
    public $bookingChannelTypes = array();

    /**
     * @var array of RoomOccupancy
     */
    public $RoomOccupancy = array();

    /**
     * @var HotelFilters
     */
    public $HotelFilters = null;

    /**
     * @var RoomTypeFilters
     */
    public $RoomTypeFilters = null;


    /**
     * @var AtomicFilter or ComplexFilter
     *
     * not used anymore
     *
     */
    public $AdditionalFilters = null;



} 