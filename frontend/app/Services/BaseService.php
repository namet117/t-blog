<?php
/**
 * Created by PhpStorm.
 * User: namet
 * Date: 2018/5/12
 * Time: 23:19
 */

namespace App\Services;


abstract class BaseService
{
    protected static $_instance = null;

    private static function _instance()
    {
        if (!self::$_instance) {
            self::$_instance = new static();
        }

        return self::$_instance;
    }

    public static function __callStatic($name, $arguments)
    {
        return call_user_func_array([self::_instance(), $name], $arguments);
    }

    public function __call($name, $arguments)
    {
        return call_user_func_array([self::_instance(), $name], $arguments);
    }
}