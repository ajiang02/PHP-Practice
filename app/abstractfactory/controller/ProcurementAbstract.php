<?php


namespace app\abstractfactory\controller;


/**
 * Class ProcurementAbstract 采购方案的抽象工厂类
 */
abstract Class ProcurementAbstract
{
    abstract function create_meat();
    abstract function create_rice();
}