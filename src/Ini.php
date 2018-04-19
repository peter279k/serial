<?php

namespace duncan3dc\Serial;

use duncan3dc\Serial\Exceptions\IniException;
use function count;
use function is_array;
use function parse_ini_string;

class Ini extends AbstractSerial
{

    /**
     * Convert an array to a ini serialized string.
     *
     * {@inheritDoc}
     */
    public static function encode($array)
    {
        $array = static::asArray($array);

        if (is_array($array) && count($array) < 1) {
            return "";
        }

        try {
            $string = self::serialize($array);
        } catch (\Exception $e) {
            throw new IniException("Serialize Error: " . $e->getMessage());
        }

        return $string;
    }


    /**
     * Convert a ini serialized string to an array.
     *
     * {@inheritDoc}
     */
    public static function decode($string)
    {
        if (!$string) {
            return new ArrayObject;
        }

        try {
            $array =  parse_ini_string($string, true, \INI_SCANNER_TYPED);
        } catch (\Exception $e) {
            throw new IniException("Serialize Error: " . $e->getMessage());
        }

        if (!is_array($array)) {
            $array = [];
        }

        return ArrayObject::make($array);
    }
}
