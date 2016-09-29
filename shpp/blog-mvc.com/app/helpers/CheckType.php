<?php
/**
 * Created by PhpStorm.
 * User: ret284
 * Date: 19.09.2016
 * Time: 1:37
 */

namespace app\helpers;


class CheckType
{
    /**
     * Check string for type
     * @param $str - input string
     * @return null - result this string or null
     */
    public static function checkStr($str)
    {
        if (is_string($str))
            return $str;
        return null;
    }

    /**
     * Check number for type
     * @param $num - input number
     * @return null - result this number or null
     */
    public static function checkNum($num)
    {
        if (is_numeric($num))
            return $num;
        return null;
    }

    /**
     * Check number for type
     * @param $obj - input object
     * @return null - result this object or null
     */
    public static function checkObj($obj)
    {
        if (is_object($obj))
            return $obj;
        return null;
    }

    /**
     * Check array for type
     * @param $arr - input array
     * @return null - result this array or null
     */
    public static function checkArr($arr)
    {
        if (is_array($arr))
            return $arr;
        return null;
    }
}