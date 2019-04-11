<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: proto/dotw.proto

namespace Dotw\Proto\PsfilterRequest;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>dotw.proto.PsfilterRequest.RoomOccupancy</code>
 */
class RoomOccupancy extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>int32 adults = 1;</code>
     */
    private $adults = 0;
    /**
     * Generated from protobuf field <code>string children = 2;</code>
     */
    private $children = '';
    /**
     * Generated from protobuf field <code>bool twin = 3;</code>
     */
    private $twin = false;
    /**
     * Generated from protobuf field <code>bool extraBed = 4;</code>
     */
    private $extraBed = false;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type int $adults
     *     @type string $children
     *     @type bool $twin
     *     @type bool $extraBed
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Proto\Dotw::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>int32 adults = 1;</code>
     * @return int
     */
    public function getAdults()
    {
        return $this->adults;
    }

    /**
     * Generated from protobuf field <code>int32 adults = 1;</code>
     * @param int $var
     * @return $this
     */
    public function setAdults($var)
    {
        GPBUtil::checkInt32($var);
        $this->adults = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string children = 2;</code>
     * @return string
     */
    public function getChildren()
    {
        return $this->children;
    }

    /**
     * Generated from protobuf field <code>string children = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setChildren($var)
    {
        GPBUtil::checkString($var, True);
        $this->children = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>bool twin = 3;</code>
     * @return bool
     */
    public function getTwin()
    {
        return $this->twin;
    }

    /**
     * Generated from protobuf field <code>bool twin = 3;</code>
     * @param bool $var
     * @return $this
     */
    public function setTwin($var)
    {
        GPBUtil::checkBool($var);
        $this->twin = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>bool extraBed = 4;</code>
     * @return bool
     */
    public function getExtraBed()
    {
        return $this->extraBed;
    }

    /**
     * Generated from protobuf field <code>bool extraBed = 4;</code>
     * @param bool $var
     * @return $this
     */
    public function setExtraBed($var)
    {
        GPBUtil::checkBool($var);
        $this->extraBed = $var;

        return $this;
    }

}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RoomOccupancy::class, \Dotw\Proto\PsfilterRequest_RoomOccupancy::class);

