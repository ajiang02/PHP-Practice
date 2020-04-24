<?php


namespace app\builder\controller;

/**
 * Class FastFoodAbstract 快餐的抽象类，定义了子类必须实现的函数
 */
abstract class FastFoodAbstract
{
    //必须品：肉类
    abstract public function meat();

    //必须品：菜类
    abstract public function vegetables();

    //必须品：主食
    abstract public function staple_food();

    // 口味
    abstract public function taste();

}