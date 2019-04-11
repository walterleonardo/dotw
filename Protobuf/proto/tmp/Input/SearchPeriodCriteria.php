<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: proto/dotw.proto

namespace Dotw\Proto\Input;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 *Mandatory
 *
 * Generated from protobuf message <code>dotw.proto.Input.SearchPeriodCriteria</code>
 */
class SearchPeriodCriteria extends \Google\Protobuf\Internal\Message
{
    /**
     *Mandatory int
     *
     * Generated from protobuf field <code>int32 travelFrom = 1;</code>
     */
    private $travelFrom = 0;
    /**
     *Mandatory int
     *
     * Generated from protobuf field <code>int32 travelTo = 2;</code>
     */
    private $travelTo = 0;
    /**
     *Mandatory int
     *
     * Generated from protobuf field <code>int32 bookingDateTime = 3;</code>
     */
    private $bookingDateTime = 0;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type int $travelFrom
     *          Mandatory int
     *     @type int $travelTo
     *          Mandatory int
     *     @type int $bookingDateTime
     *          Mandatory int
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Proto\Dotw::initOnce();
        parent::__construct($data);
    }

    /**
     *Mandatory int
     *
     * Generated from protobuf field <code>int32 travelFrom = 1;</code>
     * @return int
     */
    public function getTravelFrom()
    {
        return $this->travelFrom;
    }

    /**
     *Mandatory int
     *
     * Generated from protobuf field <code>int32 travelFrom = 1;</code>
     * @param int $var
     * @return $this
     */
    public function setTravelFrom($var)
    {
        GPBUtil::checkInt32($var);
        $this->travelFrom = $var;

        return $this;
    }

    /**
     *Mandatory int
     *
     * Generated from protobuf field <code>int32 travelTo = 2;</code>
     * @return int
     */
    public function getTravelTo()
    {
        return $this->travelTo;
    }

    /**
     *Mandatory int
     *
     * Generated from protobuf field <code>int32 travelTo = 2;</code>
     * @param int $var
     * @return $this
     */
    public function setTravelTo($var)
    {
        GPBUtil::checkInt32($var);
        $this->travelTo = $var;

        return $this;
    }

    /**
     *Mandatory int
     *
     * Generated from protobuf field <code>int32 bookingDateTime = 3;</code>
     * @return int
     */
    public function getBookingDateTime()
    {
        return $this->bookingDateTime;
    }

    /**
     *Mandatory int
     *
     * Generated from protobuf field <code>int32 bookingDateTime = 3;</code>
     * @param int $var
     * @return $this
     */
    public function setBookingDateTime($var)
    {
        GPBUtil::checkInt32($var);
        $this->bookingDateTime = $var;

        return $this;
    }

}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SearchPeriodCriteria::class, \Dotw\Proto\Input_SearchPeriodCriteria::class);

