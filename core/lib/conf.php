<?php
/**
 * Created by PhpStorm.
 * User: Keil
 * Date: 2017/3/28
 * Time: 上午11:44
 */

namespace core\lib;


class conf
{

    static public $conf = [];

    /**
     * 获取单个配置
     * @param $name 配置项
     * @param $file 配置文件
     * @return mixed 返回配置信息
     * @throws \Exception
     */
    static public function get($name, $file)
    {
        if (isset(self::$conf[$file])) {
            return self::$conf[$file][$name];
        } else {
            $path = KEIL . '/core/config/' . $file . '.php';
            if (is_file($path)) {
                $config = include $path;
                if (isset($config[$name])) {
                    self::$conf[$file] = $config;
                    return $config[$name];
                } else {
                    throw new \Exception('没有这个配置项:' . $name);
                }
            } else {
                throw new \Exception("找不到配置文件" . $file);
            }
        }
    }

    /**
     * 获取全部配置
     * @param $file 配置文锦啊
     * @return mixed 返回配置
     * @throws \Exception
     */
    static public function all($file)
    {
        if (isset(self::$conf[$file])) {
            return self::$conf[$file];
        } else {
            $path = IMOOC . '/core/config/' . $file . '.php';
            if (is_file($path)) {

                $config = include $path;
                if (isset($config)) {
                    self::$conf[$file] = $config;
                    return $config;
                } else {
                    throw new \Exception('没有这个配置项:' . $file);
                }
            } else {
                throw new \Exception("找不到配置文件" . $file);
            }
        }

    }
}