<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: proto/Dotw_protoBuf_Psfilter.proto

namespace Protobuffer\Dotwproto\PSFRequest\RoomTypeFilters;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>protobuffer.dotwproto.PSFRequest.RoomTypeFilters.RoomCategory</code>
 */
class RoomCategory extends \Google\Protobuf\Internal\Message
{
    /**
     *62215; //integer
     *
     * Generated from protobuf field <code>int32 MainCategory = 1;</code>
     */
    private $MainCategory = 0;
    /**
     *integer
     *
     * Generated from protobuf field <code>int32 SubCategory = 2;</code>
     */
    private $SubCategory = 0;
    /**
     *integer
     *
     * Generated from protobuf field <code>int32 View = 3;</code>
     */
    private $View = 0;
    /**
     *integer
     *
     * Generated from protobuf field <code>int32 BeddingType = 4;</code>
     */
    private $BeddingType = 0;
    /**
     *integer
     *
     * Generated from protobuf field <code>int32 Attribute1 = 5;</code>
     */
    private $Attribute1 = 0;
    /**
     *integer
     *
     * Generated from protobuf field <code>int32 Attribute2 = 6;</code>
     */
    private $Attribute2 = 0;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type int $MainCategory
     *          62215; //integer
     *     @type int $SubCategory
     *          integer
     *     @type int $View
     *          integer
     *     @type int $BeddingType
     *          integer
     *     @type int $Attribute1
     *          integer
     *     @type int $Attribute2
     *          integer
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Proto\DotwProtoBufPsfilter::initOnce();
        parent::__construct($data);
    }

    /**
     *62215; //integer
     *
     * Generated from protobuf field <code>int32 MainCategory = 1;</code>
     * @return int
     */
    public function getMainCategory()
    {
        return $this->MainCategory;
    }

    /**
     *62215; //integer
     *
     * Generated from protobuf field <code>int32 MainCategory = 1;</code>
     * @param int $var
     * @return $this
     */
    public function setMainCategory($var)
    {
        GPBUtil::checkInt32($var);
        $this->MainCategory = $var;

        return $this;
    }

    /**
     *integer
     *
     * Generated from protobuf field <code>int32 SubCategory = 2;</code>
     * @return int
     */
    public function getSubCategory()
    {
        return $this->SubCategory;
    }

    /**
     *integer
     *
     * Generated from protobuf field <code>int32 SubCategory = 2;</code>
     * @param int $var
     * @return $this
     */
    public function setSubCategory($var)
    {
        GPBUtil::checkInt32($var);
        $this->SubCategory = $var;

        return $this;
    }

    /**
     *integer
     *
     * Generated from protobuf field <code>int32 View = 3;</code>
     * @return int
     */
    public function getView()
    {
        return $this->View;
    }

    /**
     *integer
     *
     * Generated from protobuf field <code>int32 View = 3;</code>
     * @param int $var
     * @return $this
     */
    public function setView($var)
    {
        GPBUtil::checkInt32($var);
        $this->View = $var;

        return $this;
    }

    /**
     *integer
     *
     * Generated from protobuf field <code>int32 BeddingType = 4;</code>
     * @return int
     */
    public function getBeddingType()
    {
        return $this->BeddingType;
    }

    /**
     *integer
     *
     * Generated from protobuf field <code>int32 BeddingType = 4;</code>
     * @param int $var
     * @return $this
     */
    public function setBeddingType($var)
    {
        GPBUtil::checkInt32($var);
        $this->BeddingType = $var;

        return $this;
    }

    /**
     *integer
     *
     * Generated from protobuf field <code>int32 Attribute1 = 5;</code>
     * @return int
     */
    public function getAttribute1()
    {
        return $this->Attribute1;
    }

    /**
     *integer
     *
     * Generated from protobuf field <code>int32 Attribute1 = 5;</code>
     * @param int $var
     * @return $this
     */
    public function setAttribute1($var)
    {
        GPBUtil::checkInt32($var);
        $this->Attribute1 = $var;

        return $this;
    }

    /**
     *integer
     *
     * Generated from protobuf field <code>int32 Attribute2 = 6;</code>
     * @return int
     */
    public function getAttribute2()
    {
        return $this->Attribute2;
    }

    /**
     *integer
     *
     * Generated from protobuf field <code>int32 Attribute2 = 6;</code>
     * @param int $var
     * @return $this
     */
    public function setAttribute2($var)
    {
        GPBUtil::checkInt32($var);
        $this->Attribute2 = $var;

        return $this;
    }

}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RoomCategory::class, \Protobuffer\Dotwproto\PSFRequest_RoomTypeFilters_RoomCategory::class);

