<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: proto/Dotw_protoBuf_Psfilter.proto

namespace Protobuffer\Dotwproto\PSFReply;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>protobuffer.dotwproto.PSFReply.HotelCode</code>
 */
class HotelCode extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>int32 hotelCodeOriginal = 1;</code>
     */
    private $hotelCodeOriginal = 0;
    /**
     * Generated from protobuf field <code>string cityCode = 2;</code>
     */
    private $cityCode = '';
    /**
     * Generated from protobuf field <code>repeated .protobuffer.dotwproto.PSFReply.RoomData roomData = 3;</code>
     */
    private $roomData;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type int $hotelCodeOriginal
     *     @type string $cityCode
     *     @type \Protobuffer\Dotwproto\PSFReply\RoomData[]|\Google\Protobuf\Internal\RepeatedField $roomData
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Proto\DotwProtoBufPsfilter::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>int32 hotelCodeOriginal = 1;</code>
     * @return int
     */
    public function getHotelCodeOriginal()
    {
        return $this->hotelCodeOriginal;
    }

    /**
     * Generated from protobuf field <code>int32 hotelCodeOriginal = 1;</code>
     * @param int $var
     * @return $this
     */
    public function setHotelCodeOriginal($var)
    {
        GPBUtil::checkInt32($var);
        $this->hotelCodeOriginal = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string cityCode = 2;</code>
     * @return string
     */
    public function getCityCode()
    {
        return $this->cityCode;
    }

    /**
     * Generated from protobuf field <code>string cityCode = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setCityCode($var)
    {
        GPBUtil::checkString($var, True);
        $this->cityCode = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>repeated .protobuffer.dotwproto.PSFReply.RoomData roomData = 3;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getRoomData()
    {
        return $this->roomData;
    }

    /**
     * Generated from protobuf field <code>repeated .protobuffer.dotwproto.PSFReply.RoomData roomData = 3;</code>
     * @param \Protobuffer\Dotwproto\PSFReply\RoomData[]|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setRoomData($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Protobuffer\Dotwproto\PSFReply\RoomData::class);
        $this->roomData = $arr;

        return $this;
    }

}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(HotelCode::class, \Protobuffer\Dotwproto\PSFReply_HotelCode::class);

