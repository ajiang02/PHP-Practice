<?php


namespace app\adapter\controller;


/**
 * Class ForeignCharger 外国充电器类（target目标类，需要适配器来配合这个类）
 */
class ForeignCharger
{

    //外国电压
    public function voltage()
    {
        return "外国电压110v<br/>";
    }


}