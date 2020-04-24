<?php


namespace app\abstractfactory\controller;


/**
 * Class PorkMeat 猪肉具体产品类，继承肉抽象类
 */
class PorkMeat extends MeatAbstract
{
    public function buy()
    {
        return "Ten catties of pork</br>";
    }
}