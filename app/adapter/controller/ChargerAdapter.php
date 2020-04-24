<?php


namespace app\adapter\controller;


/**
 * Class ChargerAdapter 电源适配器类（adapter适配器，对国内电压[原有类] 进行改造）
 */
class ChargerAdapter
{

    //国内充电器实例化对象
    public $domestic_charger;


    /**
     * ChargerAdapter constructor. 实例化国内充电器类
     */
    public function __construct(DomesticCharger $dc)
    {
        $this->domestic_charger = $dc;
    }


    /**
     * 对国内的电压进行降压，降到110v，那么外国的充电器便可以使用国内的电压
     */
    public function charge()
    {
        //国内电压220v
        $v = $this->domestic_charger->voltage();
        echo $v;

        //降压
        echo "电源适配器正在降低电压中......<br/>";

        //外国充电器可以适用国内电压了
        $v = "已对国内电压降压适配,外国充电器可安全充电啦<br/>";
        echo $v;
    }
}