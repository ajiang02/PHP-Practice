<?php


namespace app\stats\controller;


/**
 * Class StatsAbstract 抽象状态类，规定子类必须实现message方法
 */
abstract class StatsAbstract
{
    /**
     * 抽象方法，物流信息
     */
    abstract public function message();
}