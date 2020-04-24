<?php


namespace app\builder\controller;

/**
 * Class ShreddedChickenInRice 手撕鸡饭具体产品类，供建造者生产产品。继承快餐抽象类
 */
class ShreddedChickenInRice extends FastFoodAbstract
{
    public function meat()
    {
        return "手撕鸡肉";
    }

    public function vegetables()
    {
        return "生菜";
    }

    public function staple_food()
    {
        return "米饭";
    }


    public function taste()
    {
        return "少盐,变态辣";
    }

}