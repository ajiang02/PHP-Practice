<?php


namespace app\stats\controller;


class StatsTest
{
    public function test()
    {
        // 实例化 网购类，构造函数初始化了未支付类
        $os = new OnlineShopping();
        $os->logistics();

        // 传入已支付类，$this->stats将保存当前状态
        $os->setStats(new Paid());
        $os->logistics();

        // 传入已发货类，$this->stats将保存当前状态
        $os->setStats(new Delivery());
        $os->logistics();

        // 传入已收货类，$this->stats将保存当前状态
        $os->setStats(new Received());
        $os->logistics();

    }
}