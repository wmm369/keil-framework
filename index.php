<?php
/**
 * Created by PhpStorm.
 * User: Keil
 * Date: 2017/3/27
 * Time: 下午3:46
 */

define('KEIL',realpath('./'));
define('CORE',KEIL.'/core');
define('APP',KEIL.'/app');
define('MODULE','\app');
define("DEBUG",true);

include "vendor/autoload.php";
if (DEBUG) {
    $whoops = new \Whoops\Run;
    $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
    $whoops->register();
    ini_set('display_error', 'On');
}else{
    ini_set('display_error', 'Off');
}
sssssa();
include CORE.'/common/function.php';
include CORE.'/imooc.php';
spl_autoload_register('\core\imooc::load');
\core\imooc::run();