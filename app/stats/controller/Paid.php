<?php


namespace app\stats\controller;


/**
 * Class Paid 已支付具体状态类，继承抽象状态类
 */
class Paid extends StatsAbstract
{
    //物流信息
    public function message()
    {
        echo "已支付，请耐心等待商家发货<br />";
    }
}