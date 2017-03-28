<?php
/**
 * Created by PhpStorm.
 * User: Keil
 * Date: 2017/3/27
 * Time: 下午4:00
 */

namespace core\lib;


class route
{
    public $ctrl; //控制器
    public $action;//方法
    public function __construct()
    {
        if (isset($_SERVER['REQUEST_URI'])&&$_SERVER['REQUEST_URI'] != "/") {
            $path =$_SERVER['REQUEST_URI'];
            $patharr = explode('/',trim($path,'/'));
            if(isset($patharr[0])){
                $this->ctrl =$patharr[0];
            }
            unset($patharr[0]);

            if(isset($patharr[1])){
                $this->action =$patharr[0];
            }else{
                $this->action='index';
            }
            unset($patharr[1]);
            $count =count($patharr);
            $i = 2;
            while($i<$count){
                if(isset($patharr[$i+1]))
                {
                    $_GET[$patharr[$i]]=$patharr[$i+1];

                }
                $i = $i+2;
            }
        }else{
            $this->ctrl='index';
            $this->action= 'index';
        }

    }

}