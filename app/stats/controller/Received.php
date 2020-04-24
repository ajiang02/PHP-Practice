<?php


namespace app\stats\controller;


/**
 * Class Received 已收货具体状态类，继承抽象状态类
 */
class Received extends StatsAbstract
{
    //物流信息
    public function message()
    {
        echo "快递已签收，请确认收货<br/>";
    }
}