<?php
/**
 * Created by PhpStorm.
 * User: Keil
 * Date: 2017/3/28
 * Time: 上午10:51
 */

namespace core\lib;


class model extends \PDO
{
 public  function  __construct(){
     $dsn ='mysql:host=127.0.0.1;dbname=wechats';
     $username='root';
     $password ='';

     try{
         parent::__construct($dsn,$username,$password);
     }catch (\PDOException $e){
         p($e->getMessage());
     }
 }
}