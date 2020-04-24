<?php


namespace app\builder\controller;


/**
 * Class BeefAndTomatoRice 番茄牛肉饭具体产品类，供建造者生产产品。继承快餐抽象类
 */
class BeefAndTomatoRice extends FastFoodAbstract
{
    public function meat()
    {
        return "牛肉";
    }

    public function vegetables()
    {
        return "番茄";
    }

    public function staple_food()
    {
        return "拉面";
    }

    public function taste()
    {
        return "多糖,微辣";
    }
}