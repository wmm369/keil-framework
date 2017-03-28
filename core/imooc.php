<?php
/**
 * Created by PhpStorm.
 * User: Keil
 * Date: 2017/3/27
 * Time: 下午3:50
 */

namespace core;


class imooc
{

    public static $classMap = [];
    public $assign;

    static public function run()
    {
        \core\lib\log::init();
        \core\lib\log::log($_SERVER);
        $route = new \core\lib\route();
        $ctrlClass = $route->ctrl;
        $action = $route->action;
        $ctrlFile=APP.'/ctrl/'.$ctrlClass.'Ctrl.php';
        $cltrlClass = MODULE.'\ctrl\\'.$ctrlClass.'Ctrl';
        if(is_file($ctrlFile)){
            include APP.'/ctrl/'.$ctrlClass.'Ctrl.php';
            $ctrl = new $cltrlClass;
            $ctrl->$action();
        }else{
            throw new \Exception('找不到控制器'.$ctrlFile);
        }

    }

    static public function load($class)
    {
        //自动加载类库
        //new \core\route();
        //$class = '\core\route'

        $class = str_replace('\\', '/', $class);
        if (isset(self::$classMap[$class])) {

            return true;
        } else {
            $file = KEIL . '/' . $class . '.php';
            if (is_file($file)) {
                require_once  KEIL . '/' . $class . '.php';
                self::$classMap[$class] = $file;
            } else {
                return false;
            }
        }
    }

    public function assign($data,$value){
        $this->assign[$data]= $value;
    }
    public function display($file){
        $file =APP.'/view/'.$file;
        if(is_file($file)){
            extract($this->assign);
            include $file;

        }else{
            throw new \Exception("模版不存在");
        }

    }

}