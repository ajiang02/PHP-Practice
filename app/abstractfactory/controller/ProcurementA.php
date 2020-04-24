<?php


namespace app\abstractfactory\controller;


/**
 * Class ProcurementA 采购方案A具体工厂类，继承采购抽象工厂类
 */
class ProcurementA extends ProcurementAbstract
{
    /**
     * @return BeefMeat 采购方案A买了牛肉
     */
    public function create_meat()
    {
        return new BeefMeat();
    }


    /**
     * @return MilletRice 采购方案A买了小米
     */
    public function create_rice()
    {
        return new MilletRice();
    }
}