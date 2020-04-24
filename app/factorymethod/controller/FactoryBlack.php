<?php

namespace app\factory\controller;

/**
 * Class FactoryBlack 具体工厂：只有一个方法，实例化具体产品（黑猫）
 * @package app\factory\controller
 */
class FactoryBlack extends Factory
{
    public function create()
    {
        return new CatBlack();
    }
}