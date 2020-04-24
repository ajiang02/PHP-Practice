<?php


namespace app\stats\controller;


/**
 * Class Delivery 已发货具体状态类，继承抽象状态类
 */
class Delivery extends StatsAbstract
{
    //物流信息
    public function message()
    {
        echo "商品正在快递的路上，请耐心等待<br />";
    }
}