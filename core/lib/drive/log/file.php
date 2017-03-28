<?php
/**
 * Created by PhpStorm.
 * User: Keil
 * Date: 2017/3/28
 * Time: 下午2:22
 */

namespace core\lib\drive\log;


use core\lib\conf;

class file
{

    public function __construct()
    {
        $conf = conf::get('OPTION', 'log');
        $this->path = $conf['PATH'];
    }

    public function log($message,$file="log")
    {

        if(!is_dir($this->path)){
            mkdir($this->path,0777,true);

        }
        $message =date('Y-m-d H:i:s').json_encode($message);
        file_put_contents($this->path.$file.'.log',$message.PHP_EOL,FILE_APPEND);
    }
}