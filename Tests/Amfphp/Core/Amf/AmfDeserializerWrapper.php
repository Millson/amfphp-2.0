<?php

/**
 *  This file is part of amfPHP
 *
 * LICENSE
 *
 * This source file is subject to the license that is bundled
 * with this package in the file license.txt.
 * @package Tests_Amfphp_Core_Amf
 */

/**
 * This class exports some internal (public) methods. This way, those methods
 * can be tested separately.
 * @package Tests_Amfphp_Core_Amf
 * @author Ariel Sommeria-klein
 */
class AmfDeserializerWrapper extends Amfphp_Core_Amf_Deserializer {

    /**
     * constructor
     * @param string $raw
     */
    public function __construct($raw) {
        $this->rawData = $raw;
    }

    /**
     * read byte
     * @return int
     */
    public function readByte() {
        return parent::readByte();
    }

    /**
     * read int
     * @return int
     */
    public function readInt() {
        return parent::readInt();
    }

    /**
     * read long
     * @return int
     */
    public function readLong() {
        return parent::readLong();
    }

    /**
     * read utf
     * @return string
     */
    public function readUtf() {
        return parent::readUtf();
    }

    /**
     * reaad double
     * @return float
     */
    public function readDouble() {
        return parent::readDouble();
    }

    /**
     * read long utf
     * @return string
     */
    public function readLongUtf() {
        return parent::readLongUtf();
    }

    /**
     * read date
     * @return Amfphp_Core_Amf_Types_Date a container with the date in ms.
     * 
     */
    public function readDate() {
        return parent::readDate();
    }

    /**
     * read array
     * @return array
     */
    public function readArray() {
        return parent::readArray();
    }

    /**
     * read object
     * @return stdClass
     */
    public function readObject() {
        return parent::readObject();
    }

    /**
     * read mixed array
     * @return array
     */
    public function readMixedArray() {
        return parent::readMixedArray();
    }

    /**
     * read reference
     * @return stdClass
     */
    public function readReference() {
        return parent::readReference();
    }

    /**
     * read amf3 data
     * @return mixed
     */
    public function readAmf3Data() {
        return parent::readAmf3Data();
    }

    /**
     * read amf3 string
     * @return string
     */
    public function readAmf3String() {
        return parent::readAmf3String();
    }

    /**
     * read amf 3 array
     * @return array
     */
    public function readAmf3Array() {
        return parent::readAmf3Array();
    }

    /**
     * read amf 3 object
     * @return stdClass
     */
    public function readAmf3Object() {
        return parent::readAmf3Object();
    }

    /**
     * read byte array
     * @return Amfphp_Core_Amf_Types_ByteArray
     */
    public function readAmf3ByteArray() {
        return parent::readAmf3ByteArray();
    }

}

?>