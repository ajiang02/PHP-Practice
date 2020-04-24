<?php


namespace app\adapter\controller;


/**
 * Class DomesticCharger 国内充电器类（adaptee原有类，适配器要对此类进行兼容）
 */
class DomesticCharger
{

    //国内电压
    public function voltage()
    {
        return "国内电压220v<br/>";
    }


}