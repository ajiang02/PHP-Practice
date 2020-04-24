<?php


namespace app\abstractfactory\controller;


/**
 * Class RiceAbstract 小米具体产品类，继承米抽象类
 */
class MilletRice extends RiceAbstract
{
    public function buy()
    {
        return "A bag of millet</br>";
    }
}