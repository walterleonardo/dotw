<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: genProto/Dotw_ProtoBuf.proto

namespace Protobuffer\Dotwproto;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>protobuffer.dotwproto.HDReply.HotelStaticData.RoomTypeStaticData.RoomName</code>
 */
class HDReply_HotelStaticData_RoomTypeStaticData_RoomName extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>string roomCode = 1;</code>
     */
    private $roomCode = '';
    /**
     * Generated from protobuf field <code>string roomName = 2;</code>
     */
    private $roomName = '';

    public function __construct() {
        \GPBMetadata\GenProto\DotwProtoBuf::initOnce();
        parent::__construct();
    }

    /**
     * Generated from protobuf field <code>string roomCode = 1;</code>
     * @return string
     */
    public function getRoomCode()
    {
        return $this->roomCode;
    }

    /**
     * Generated from protobuf field <code>string roomCode = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setRoomCode($var)
    {
        GPBUtil::checkString($var, True);
        $this->roomCode = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string roomName = 2;</code>
     * @return string
     */
    public function getRoomName()
    {
        return $this->roomName;
    }

    /**
     * Generated from protobuf field <code>string roomName = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setRoomName($var)
    {
        GPBUtil::checkString($var, True);
        $this->roomName = $var;

        return $this;
    }

}

