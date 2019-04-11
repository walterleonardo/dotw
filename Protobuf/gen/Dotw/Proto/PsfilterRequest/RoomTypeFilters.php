<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: proto/dotw.proto

namespace Dotw\Proto\PsfilterRequest;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>dotw.proto.PsfilterRequest.RoomTypeFilters</code>
 */
class RoomTypeFilters extends \Google\Protobuf\Internal\Message
{
    /**
     *integer
     *
     * Generated from protobuf field <code>int32 suite = 1;</code>
     */
    private $suite = 0;
    /**
     *array(int)
     *
     * Generated from protobuf field <code>string roomAmenitie = 2;</code>
     */
    private $roomAmenitie = '';
    /**
     *array(int)
     *
     * Generated from protobuf field <code>string roomId = 3;</code>
     */
    private $roomId = '';
    /**
     *string
     *
     * Generated from protobuf field <code>string roomName = 4;</code>
     */
    private $roomName = '';
    /**
     *roomCategories Objects
     *
     * Generated from protobuf field <code>repeated .dotw.proto.PsfilterRequest.RoomCategory roomCategories = 5;</code>
     */
    private $roomCategories;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type int $suite
     *          integer
     *     @type string $roomAmenitie
     *          array(int)
     *     @type string $roomId
     *          array(int)
     *     @type string $roomName
     *          string
     *     @type \Dotw\Proto\PsfilterRequest\RoomCategory[]|\Google\Protobuf\Internal\RepeatedField $roomCategories
     *          roomCategories Objects
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Proto\Dotw::initOnce();
        parent::__construct($data);
    }

    /**
     *integer
     *
     * Generated from protobuf field <code>int32 suite = 1;</code>
     * @return int
     */
    public function getSuite()
    {
        return $this->suite;
    }

    /**
     *integer
     *
     * Generated from protobuf field <code>int32 suite = 1;</code>
     * @param int $var
     * @return $this
     */
    public function setSuite($var)
    {
        GPBUtil::checkInt32($var);
        $this->suite = $var;

        return $this;
    }

    /**
     *array(int)
     *
     * Generated from protobuf field <code>string roomAmenitie = 2;</code>
     * @return string
     */
    public function getRoomAmenitie()
    {
        return $this->roomAmenitie;
    }

    /**
     *array(int)
     *
     * Generated from protobuf field <code>string roomAmenitie = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setRoomAmenitie($var)
    {
        GPBUtil::checkString($var, True);
        $this->roomAmenitie = $var;

        return $this;
    }

    /**
     *array(int)
     *
     * Generated from protobuf field <code>string roomId = 3;</code>
     * @return string
     */
    public function getRoomId()
    {
        return $this->roomId;
    }

    /**
     *array(int)
     *
     * Generated from protobuf field <code>string roomId = 3;</code>
     * @param string $var
     * @return $this
     */
    public function setRoomId($var)
    {
        GPBUtil::checkString($var, True);
        $this->roomId = $var;

        return $this;
    }

    /**
     *string
     *
     * Generated from protobuf field <code>string roomName = 4;</code>
     * @return string
     */
    public function getRoomName()
    {
        return $this->roomName;
    }

    /**
     *string
     *
     * Generated from protobuf field <code>string roomName = 4;</code>
     * @param string $var
     * @return $this
     */
    public function setRoomName($var)
    {
        GPBUtil::checkString($var, True);
        $this->roomName = $var;

        return $this;
    }

    /**
     *roomCategories Objects
     *
     * Generated from protobuf field <code>repeated .dotw.proto.PsfilterRequest.RoomCategory roomCategories = 5;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getRoomCategories()
    {
        return $this->roomCategories;
    }

    /**
     *roomCategories Objects
     *
     * Generated from protobuf field <code>repeated .dotw.proto.PsfilterRequest.RoomCategory roomCategories = 5;</code>
     * @param \Dotw\Proto\PsfilterRequest\RoomCategory[]|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setRoomCategories($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Dotw\Proto\PsfilterRequest\RoomCategory::class);
        $this->roomCategories = $arr;

        return $this;
    }

}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RoomTypeFilters::class, \Dotw\Proto\PsfilterRequest_RoomTypeFilters::class);
