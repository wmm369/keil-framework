<?php
/**
 * Created by PhpStorm.
 * User: Keil
 * Date: 2017/3/28
 * Time: 上午10:22
 */

namespace app\ctrl;


class indexCtrl extends \core\imooc
{

    public function index()
    {
        $this->assign('world', 'world');
        $this->display('index.html');
    }
}