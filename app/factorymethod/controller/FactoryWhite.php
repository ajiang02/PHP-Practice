<?php

namespace app\factory\controller;

/**
 * Class FactoryWhite 具体工厂：只有一个方法，实例化具体产品（白猫）
 * @package app\factory\controller
 */
class FactoryWhite extends Factory
{
    public function create()
    {
        return new CatWhite();
    }
}