<?php


namespace app\abstractfactory\controller;


/**
 * Class ProcurementB 采购方案B具体工厂类，继承采购抽象工厂类
 */
class ProcurementB extends ProcurementAbstract
{
    /**
     * @return PorkMeat 采购方案B买了猪肉
     */
    public function create_meat()
    {
        return new PorkMeat();
    }


    /**
     * @return BlackRice 采购方案B买了黑米
     */
    public function create_rice()
    {
        return new BlackRice();
    }
}