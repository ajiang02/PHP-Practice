<?php


namespace app\stats\controller;


/**
 * Class Unpaid 未支付具体状态类，继承抽象状态类
 */
class Unpaid extends StatsAbstract
{
    public static $uppaid = null;

    public function __construct()
    {

    }

    //物流信息
    public function message()
    {
        echo "你的订单未支付，将在30分站后取消订单，请尽快付款<br />";
    }
}