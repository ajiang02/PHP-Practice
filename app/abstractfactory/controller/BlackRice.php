<?php


namespace app\abstractfactory\controller;


/**
 * Class RiceAbstract 黑米具体产品类，继承米抽象类
 */
class BlackRice extends RiceAbstract
{
    public function buy()
    {
        return "A bag of black rice</br>";
    }
}