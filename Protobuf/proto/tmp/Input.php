<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: proto/dotw.proto

namespace Dotw\Proto;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>dotw.proto.Input</code>
 */
class Input extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>string psfilter = 1;</code>
     */
    private $psfilter = '';
    /**
     * Generated from protobuf field <code>int32 customerId = 2;</code>
     */
    private $customerId = 0;
    /**
     * Generated from protobuf field <code>string environment = 3;</code>
     */
    private $environment = '';
    /**
     * Generated from protobuf field <code>int32 requestSource = 4;</code>
     */
    private $requestSource = 0;
    /**
     * Generated from protobuf field <code>string exceptRestrictions = 5;</code>
     */
    private $exceptRestrictions = '';
    /**
     * Generated from protobuf field <code>bool passengerNationalityOrResidenceProvided = 6;</code>
     */
    private $passengerNationalityOrResidenceProvided = false;
    /**
     * Generated from protobuf field <code>string hotelIds = 7;</code>
     */
    private $hotelIds = '';
    /**
     * Generated from protobuf field <code>string city = 8;</code>
     */
    private $city = '';
    /**
     * Generated from protobuf field <code>string country = 9;</code>
     */
    private $country = '';
    /**
     * Generated from protobuf field <code>string bookingChannelsWithAutoMapping = 10;</code>
     */
    private $bookingChannelsWithAutoMapping = '';
    /**
     * Generated from protobuf field <code>string bookingChannelTypes = 11;</code>
     */
    private $bookingChannelTypes = '';
    /**
     * Generated from protobuf field <code>string excludedBookingchannel = 12;</code>
     */
    private $excludedBookingchannel = '';
    /**
     * Generated from protobuf field <code>bool activeForRoomCategories = 13;</code>
     */
    private $activeForRoomCategories = false;
    /**
     * Generated from protobuf field <code>repeated .dotw.proto.Input.RoomOccupancy roomOcupancy = 14;</code>
     */
    private $roomOcupancy;
    /**
     * Generated from protobuf field <code>.dotw.proto.Input.HotelFilters hotelFilters = 15;</code>
     */
    private $hotelFilters = null;
    /**
     * Generated from protobuf field <code>.dotw.proto.Input.RoomTypeFilters roomTypeFilters = 16;</code>
     */
    private $roomTypeFilters = null;
    /**
     * Generated from protobuf field <code>.dotw.proto.Input.AdditionalFilters additionalFilters = 17;</code>
     */
    private $additionalFilters = null;
    /**
     * Generated from protobuf field <code>.dotw.proto.Input.SearchPeriodCriteria searchPeriodCriteria = 18;</code>
     */
    private $searchPeriodCriteria = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $psfilter
     *     @type int $customerId
     *     @type string $environment
     *     @type int $requestSource
     *     @type string $exceptRestrictions
     *     @type bool $passengerNationalityOrResidenceProvided
     *     @type string $hotelIds
     *     @type string $city
     *     @type string $country
     *     @type string $bookingChannelsWithAutoMapping
     *     @type string $bookingChannelTypes
     *     @type string $excludedBookingchannel
     *     @type bool $activeForRoomCategories
     *     @type \Dotw\Proto\Input\RoomOccupancy[]|\Google\Protobuf\Internal\RepeatedField $roomOcupancy
     *     @type \Dotw\Proto\Input\HotelFilters $hotelFilters
     *     @type \Dotw\Proto\Input\RoomTypeFilters $roomTypeFilters
     *     @type \Dotw\Proto\Input\AdditionalFilters $additionalFilters
     *     @type \Dotw\Proto\Input\SearchPeriodCriteria $searchPeriodCriteria
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Proto\Dotw::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>string psfilter = 1;</code>
     * @return string
     */
    public function getPsfilter()
    {
        return $this->psfilter;
    }

    /**
     * Generated from protobuf field <code>string psfilter = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setPsfilter($var)
    {
        GPBUtil::checkString($var, True);
        $this->psfilter = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>int32 customerId = 2;</code>
     * @return int
     */
    public function getCustomerId()
    {
        return $this->customerId;
    }

    /**
     * Generated from protobuf field <code>int32 customerId = 2;</code>
     * @param int $var
     * @return $this
     */
    public function setCustomerId($var)
    {
        GPBUtil::checkInt32($var);
        $this->customerId = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string environment = 3;</code>
     * @return string
     */
    public function getEnvironment()
    {
        return $this->environment;
    }

    /**
     * Generated from protobuf field <code>string environment = 3;</code>
     * @param string $var
     * @return $this
     */
    public function setEnvironment($var)
    {
        GPBUtil::checkString($var, True);
        $this->environment = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>int32 requestSource = 4;</code>
     * @return int
     */
    public function getRequestSource()
    {
        return $this->requestSource;
    }

    /**
     * Generated from protobuf field <code>int32 requestSource = 4;</code>
     * @param int $var
     * @return $this
     */
    public function setRequestSource($var)
    {
        GPBUtil::checkInt32($var);
        $this->requestSource = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string exceptRestrictions = 5;</code>
     * @return string
     */
    public function getExceptRestrictions()
    {
        return $this->exceptRestrictions;
    }

    /**
     * Generated from protobuf field <code>string exceptRestrictions = 5;</code>
     * @param string $var
     * @return $this
     */
    public function setExceptRestrictions($var)
    {
        GPBUtil::checkString($var, True);
        $this->exceptRestrictions = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>bool passengerNationalityOrResidenceProvided = 6;</code>
     * @return bool
     */
    public function getPassengerNationalityOrResidenceProvided()
    {
        return $this->passengerNationalityOrResidenceProvided;
    }

    /**
     * Generated from protobuf field <code>bool passengerNationalityOrResidenceProvided = 6;</code>
     * @param bool $var
     * @return $this
     */
    public function setPassengerNationalityOrResidenceProvided($var)
    {
        GPBUtil::checkBool($var);
        $this->passengerNationalityOrResidenceProvided = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string hotelIds = 7;</code>
     * @return string
     */
    public function getHotelIds()
    {
        return $this->hotelIds;
    }

    /**
     * Generated from protobuf field <code>string hotelIds = 7;</code>
     * @param string $var
     * @return $this
     */
    public function setHotelIds($var)
    {
        GPBUtil::checkString($var, True);
        $this->hotelIds = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string city = 8;</code>
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Generated from protobuf field <code>string city = 8;</code>
     * @param string $var
     * @return $this
     */
    public function setCity($var)
    {
        GPBUtil::checkString($var, True);
        $this->city = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string country = 9;</code>
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Generated from protobuf field <code>string country = 9;</code>
     * @param string $var
     * @return $this
     */
    public function setCountry($var)
    {
        GPBUtil::checkString($var, True);
        $this->country = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string bookingChannelsWithAutoMapping = 10;</code>
     * @return string
     */
    public function getBookingChannelsWithAutoMapping()
    {
        return $this->bookingChannelsWithAutoMapping;
    }

    /**
     * Generated from protobuf field <code>string bookingChannelsWithAutoMapping = 10;</code>
     * @param string $var
     * @return $this
     */
    public function setBookingChannelsWithAutoMapping($var)
    {
        GPBUtil::checkString($var, True);
        $this->bookingChannelsWithAutoMapping = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string bookingChannelTypes = 11;</code>
     * @return string
     */
    public function getBookingChannelTypes()
    {
        return $this->bookingChannelTypes;
    }

    /**
     * Generated from protobuf field <code>string bookingChannelTypes = 11;</code>
     * @param string $var
     * @return $this
     */
    public function setBookingChannelTypes($var)
    {
        GPBUtil::checkString($var, True);
        $this->bookingChannelTypes = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string excludedBookingchannel = 12;</code>
     * @return string
     */
    public function getExcludedBookingchannel()
    {
        return $this->excludedBookingchannel;
    }

    /**
     * Generated from protobuf field <code>string excludedBookingchannel = 12;</code>
     * @param string $var
     * @return $this
     */
    public function setExcludedBookingchannel($var)
    {
        GPBUtil::checkString($var, True);
        $this->excludedBookingchannel = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>bool activeForRoomCategories = 13;</code>
     * @return bool
     */
    public function getActiveForRoomCategories()
    {
        return $this->activeForRoomCategories;
    }

    /**
     * Generated from protobuf field <code>bool activeForRoomCategories = 13;</code>
     * @param bool $var
     * @return $this
     */
    public function setActiveForRoomCategories($var)
    {
        GPBUtil::checkBool($var);
        $this->activeForRoomCategories = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>repeated .dotw.proto.Input.RoomOccupancy roomOcupancy = 14;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getRoomOcupancy()
    {
        return $this->roomOcupancy;
    }

    /**
     * Generated from protobuf field <code>repeated .dotw.proto.Input.RoomOccupancy roomOcupancy = 14;</code>
     * @param \Dotw\Proto\Input\RoomOccupancy[]|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setRoomOcupancy($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Dotw\Proto\Input\RoomOccupancy::class);
        $this->roomOcupancy = $arr;

        return $this;
    }

    /**
     * Generated from protobuf field <code>.dotw.proto.Input.HotelFilters hotelFilters = 15;</code>
     * @return \Dotw\Proto\Input\HotelFilters
     */
    public function getHotelFilters()
    {
        return $this->hotelFilters;
    }

    /**
     * Generated from protobuf field <code>.dotw.proto.Input.HotelFilters hotelFilters = 15;</code>
     * @param \Dotw\Proto\Input\HotelFilters $var
     * @return $this
     */
    public function setHotelFilters($var)
    {
        GPBUtil::checkMessage($var, \Dotw\Proto\Input_HotelFilters::class);
        $this->hotelFilters = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>.dotw.proto.Input.RoomTypeFilters roomTypeFilters = 16;</code>
     * @return \Dotw\Proto\Input\RoomTypeFilters
     */
    public function getRoomTypeFilters()
    {
        return $this->roomTypeFilters;
    }

    /**
     * Generated from protobuf field <code>.dotw.proto.Input.RoomTypeFilters roomTypeFilters = 16;</code>
     * @param \Dotw\Proto\Input\RoomTypeFilters $var
     * @return $this
     */
    public function setRoomTypeFilters($var)
    {
        GPBUtil::checkMessage($var, \Dotw\Proto\Input_RoomTypeFilters::class);
        $this->roomTypeFilters = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>.dotw.proto.Input.AdditionalFilters additionalFilters = 17;</code>
     * @return \Dotw\Proto\Input\AdditionalFilters
     */
    public function getAdditionalFilters()
    {
        return $this->additionalFilters;
    }

    /**
     * Generated from protobuf field <code>.dotw.proto.Input.AdditionalFilters additionalFilters = 17;</code>
     * @param \Dotw\Proto\Input\AdditionalFilters $var
     * @return $this
     */
    public function setAdditionalFilters($var)
    {
        GPBUtil::checkMessage($var, \Dotw\Proto\Input_AdditionalFilters::class);
        $this->additionalFilters = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>.dotw.proto.Input.SearchPeriodCriteria searchPeriodCriteria = 18;</code>
     * @return \Dotw\Proto\Input\SearchPeriodCriteria
     */
    public function getSearchPeriodCriteria()
    {
        return $this->searchPeriodCriteria;
    }

    /**
     * Generated from protobuf field <code>.dotw.proto.Input.SearchPeriodCriteria searchPeriodCriteria = 18;</code>
     * @param \Dotw\Proto\Input\SearchPeriodCriteria $var
     * @return $this
     */
    public function setSearchPeriodCriteria($var)
    {
        GPBUtil::checkMessage($var, \Dotw\Proto\Input_SearchPeriodCriteria::class);
        $this->searchPeriodCriteria = $var;

        return $this;
    }

}

