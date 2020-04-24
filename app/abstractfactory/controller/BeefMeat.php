<?php


namespace app\abstractfactory\controller;


/**
 * Class BeefMeat 牛肉具体产品类，继承肉抽象类
 */
class BeefMeat extends MeatAbstract
{
    public function buy()
    {
        return 'Ten catties of beef<br/>';
    }

}