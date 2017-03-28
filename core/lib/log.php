<?php
/**
 * Created by PhpStorm.
 * User: Keil
 * Date: 2017/3/28
 * Time: 下午12:25
 */

namespace core\lib;

use core\lib\conf;
class log
{
    static public $class;

    /**
     * @throws \Exception
     */
    static public function init(){

        $drive =\core\lib\conf::get('DRIVE','log');
        $class ='\core\lib\drive\log\\'.$drive;
        self::$class = new $class;
    }


    static public function log($name,$file="log"){
        self::$class->log($name,$file);
    }
}