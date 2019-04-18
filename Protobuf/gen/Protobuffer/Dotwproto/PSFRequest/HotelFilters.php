<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: proto/Dotw_protoBuf_Psfilter.proto

namespace Protobuffer\Dotwproto\PSFRequest;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>protobuffer.dotwproto.PSFRequest.HotelFilters</code>
 */
class HotelFilters extends \Google\Protobuf\Internal\Message
{
    /**
     *array(int)
     *
     * Generated from protobuf field <code>repeated int32 rating = 1;</code>
     */
    private $rating;
    /**
     *integer bool
     *
     * Generated from protobuf field <code>int32 luxury = 2;</code>
     */
    private $luxury = 0;
    /**
     *string
     *
     * Generated from protobuf field <code>string location = 3;</code>
     */
    private $location = '';
    /**
     *array(int)
     *
     * Generated from protobuf field <code>repeated int32 locationId = 4;</code>
     */
    private $locationId;
    /**
     *array(int)
     *
     * Generated from protobuf field <code>repeated int32 amenitie = 5;</code>
     */
    private $amenitie;
    /**
     *array(int)
     *
     * Generated from protobuf field <code>repeated int32 leisure = 6;</code>
     */
    private $leisure;
    /**
     *array(int)
     *
     * Generated from protobuf field <code>repeated int32 business = 7;</code>
     */
    private $business;
    /**
     *array(int)
     *
     * Generated from protobuf field <code>repeated int32 hotelPreference = 8;</code>
     */
    private $hotelPreference;
    /**
     *array(int)
     *
     * Generated from protobuf field <code>repeated int32 chain = 9;</code>
     */
    private $chain;
    /**
     *string
     *
     * Generated from protobuf field <code>string attraction = 10;</code>
     */
    private $attraction = '';
    /**
     *string
     *
     * Generated from protobuf field <code>string hotelName = 11;</code>
     */
    private $hotelName = '';
    /**
     *integer
     *
     * Generated from protobuf field <code>int32 builtYear = 12;</code>
     */
    private $builtYear = 0;
    /**
     *integer
     *
     * Generated from protobuf field <code>int32 renovationYear = 13;</code>
     */
    private $renovationYear = 0;
    /**
     *integer
     *
     * Generated from protobuf field <code>int32 floors = 14;</code>
     */
    private $floors = 0;
    /**
     *integer
     *
     * Generated from protobuf field <code>int32 noOfRooms = 15;</code>
     */
    private $noOfRooms = 0;
    /**
     *integer bool
     *
     * Generated from protobuf field <code>int32 fireSafety = 16;</code>
     */
    private $fireSafety = 0;
    /**
     *string
     *
     * Generated from protobuf field <code>string lastUpdated = 17;</code>
     */
    private $lastUpdated = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type int[]|\Google\Protobuf\Internal\RepeatedField $rating
     *          array(int)
     *     @type int $luxury
     *          integer bool
     *     @type string $location
     *          string
     *     @type int[]|\Google\Protobuf\Internal\RepeatedField $locationId
     *          array(int)
     *     @type int[]|\Google\Protobuf\Internal\RepeatedField $amenitie
     *          array(int)
     *     @type int[]|\Google\Protobuf\Internal\RepeatedField $leisure
     *          array(int)
     *     @type int[]|\Google\Protobuf\Internal\RepeatedField $business
     *          array(int)
     *     @type int[]|\Google\Protobuf\Internal\RepeatedField $hotelPreference
     *          array(int)
     *     @type int[]|\Google\Protobuf\Internal\RepeatedField $chain
     *          array(int)
     *     @type string $attraction
     *          string
     *     @type string $hotelName
     *          string
     *     @type int $builtYear
     *          integer
     *     @type int $renovationYear
     *          integer
     *     @type int $floors
     *          integer
     *     @type int $noOfRooms
     *          integer
     *     @type int $fireSafety
     *          integer bool
     *     @type string $lastUpdated
     *          string
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Proto\DotwProtoBufPsfilter::initOnce();
        parent::__construct($data);
    }

    /**
     *array(int)
     *
     * Generated from protobuf field <code>repeated int32 rating = 1;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getRating()
    {
        return $this->rating;
    }

    /**
     *array(int)
     *
     * Generated from protobuf field <code>repeated int32 rating = 1;</code>
     * @param int[]|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setRating($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::INT32);
        $this->rating = $arr;

        return $this;
    }

    /**
     *integer bool
     *
     * Generated from protobuf field <code>int32 luxury = 2;</code>
     * @return int
     */
    public function getLuxury()
    {
        return $this->luxury;
    }

    /**
     *integer bool
     *
     * Generated from protobuf field <code>int32 luxury = 2;</code>
     * @param int $var
     * @return $this
     */
    public function setLuxury($var)
    {
        GPBUtil::checkInt32($var);
        $this->luxury = $var;

        return $this;
    }

    /**
     *string
     *
     * Generated from protobuf field <code>string location = 3;</code>
     * @return string
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     *string
     *
     * Generated from protobuf field <code>string location = 3;</code>
     * @param string $var
     * @return $this
     */
    public function setLocation($var)
    {
        GPBUtil::checkString($var, True);
        $this->location = $var;

        return $this;
    }

    /**
     *array(int)
     *
     * Generated from protobuf field <code>repeated int32 locationId = 4;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getLocationId()
    {
        return $this->locationId;
    }

    /**
     *array(int)
     *
     * Generated from protobuf field <code>repeated int32 locationId = 4;</code>
     * @param int[]|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setLocationId($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::INT32);
        $this->locationId = $arr;

        return $this;
    }

    /**
     *array(int)
     *
     * Generated from protobuf field <code>repeated int32 amenitie = 5;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getAmenitie()
    {
        return $this->amenitie;
    }

    /**
     *array(int)
     *
     * Generated from protobuf field <code>repeated int32 amenitie = 5;</code>
     * @param int[]|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setAmenitie($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::INT32);
        $this->amenitie = $arr;

        return $this;
    }

    /**
     *array(int)
     *
     * Generated from protobuf field <code>repeated int32 leisure = 6;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getLeisure()
    {
        return $this->leisure;
    }

    /**
     *array(int)
     *
     * Generated from protobuf field <code>repeated int32 leisure = 6;</code>
     * @param int[]|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setLeisure($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::INT32);
        $this->leisure = $arr;

        return $this;
    }

    /**
     *array(int)
     *
     * Generated from protobuf field <code>repeated int32 business = 7;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getBusiness()
    {
        return $this->business;
    }

    /**
     *array(int)
     *
     * Generated from protobuf field <code>repeated int32 business = 7;</code>
     * @param int[]|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setBusiness($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::INT32);
        $this->business = $arr;

        return $this;
    }

    /**
     *array(int)
     *
     * Generated from protobuf field <code>repeated int32 hotelPreference = 8;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getHotelPreference()
    {
        return $this->hotelPreference;
    }

    /**
     *array(int)
     *
     * Generated from protobuf field <code>repeated int32 hotelPreference = 8;</code>
     * @param int[]|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setHotelPreference($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::INT32);
        $this->hotelPreference = $arr;

        return $this;
    }

    /**
     *array(int)
     *
     * Generated from protobuf field <code>repeated int32 chain = 9;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getChain()
    {
        return $this->chain;
    }

    /**
     *array(int)
     *
     * Generated from protobuf field <code>repeated int32 chain = 9;</code>
     * @param int[]|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setChain($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::INT32);
        $this->chain = $arr;

        return $this;
    }

    /**
     *string
     *
     * Generated from protobuf field <code>string attraction = 10;</code>
     * @return string
     */
    public function getAttraction()
    {
        return $this->attraction;
    }

    /**
     *string
     *
     * Generated from protobuf field <code>string attraction = 10;</code>
     * @param string $var
     * @return $this
     */
    public function setAttraction($var)
    {
        GPBUtil::checkString($var, True);
        $this->attraction = $var;

        return $this;
    }

    /**
     *string
     *
     * Generated from protobuf field <code>string hotelName = 11;</code>
     * @return string
     */
    public function getHotelName()
    {
        return $this->hotelName;
    }

    /**
     *string
     *
     * Generated from protobuf field <code>string hotelName = 11;</code>
     * @param string $var
     * @return $this
     */
    public function setHotelName($var)
    {
        GPBUtil::checkString($var, True);
        $this->hotelName = $var;

        return $this;
    }

    /**
     *integer
     *
     * Generated from protobuf field <code>int32 builtYear = 12;</code>
     * @return int
     */
    public function getBuiltYear()
    {
        return $this->builtYear;
    }

    /**
     *integer
     *
     * Generated from protobuf field <code>int32 builtYear = 12;</code>
     * @param int $var
     * @return $this
     */
    public function setBuiltYear($var)
    {
        GPBUtil::checkInt32($var);
        $this->builtYear = $var;

        return $this;
    }

    /**
     *integer
     *
     * Generated from protobuf field <code>int32 renovationYear = 13;</code>
     * @return int
     */
    public function getRenovationYear()
    {
        return $this->renovationYear;
    }

    /**
     *integer
     *
     * Generated from protobuf field <code>int32 renovationYear = 13;</code>
     * @param int $var
     * @return $this
     */
    public function setRenovationYear($var)
    {
        GPBUtil::checkInt32($var);
        $this->renovationYear = $var;

        return $this;
    }

    /**
     *integer
     *
     * Generated from protobuf field <code>int32 floors = 14;</code>
     * @return int
     */
    public function getFloors()
    {
        return $this->floors;
    }

    /**
     *integer
     *
     * Generated from protobuf field <code>int32 floors = 14;</code>
     * @param int $var
     * @return $this
     */
    public function setFloors($var)
    {
        GPBUtil::checkInt32($var);
        $this->floors = $var;

        return $this;
    }

    /**
     *integer
     *
     * Generated from protobuf field <code>int32 noOfRooms = 15;</code>
     * @return int
     */
    public function getNoOfRooms()
    {
        return $this->noOfRooms;
    }

    /**
     *integer
     *
     * Generated from protobuf field <code>int32 noOfRooms = 15;</code>
     * @param int $var
     * @return $this
     */
    public function setNoOfRooms($var)
    {
        GPBUtil::checkInt32($var);
        $this->noOfRooms = $var;

        return $this;
    }

    /**
     *integer bool
     *
     * Generated from protobuf field <code>int32 fireSafety = 16;</code>
     * @return int
     */
    public function getFireSafety()
    {
        return $this->fireSafety;
    }

    /**
     *integer bool
     *
     * Generated from protobuf field <code>int32 fireSafety = 16;</code>
     * @param int $var
     * @return $this
     */
    public function setFireSafety($var)
    {
        GPBUtil::checkInt32($var);
        $this->fireSafety = $var;

        return $this;
    }

    /**
     *string
     *
     * Generated from protobuf field <code>string lastUpdated = 17;</code>
     * @return string
     */
    public function getLastUpdated()
    {
        return $this->lastUpdated;
    }

    /**
     *string
     *
     * Generated from protobuf field <code>string lastUpdated = 17;</code>
     * @param string $var
     * @return $this
     */
    public function setLastUpdated($var)
    {
        GPBUtil::checkString($var, True);
        $this->lastUpdated = $var;

        return $this;
    }

}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(HotelFilters::class, \Protobuffer\Dotwproto\PSFRequest_HotelFilters::class);

