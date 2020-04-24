<?php

namespace app\factory\controller;

use PHPUnit\Framework\TestCase;

/**
 * Class FactoryTest 工厂模式测试
 * @package app\factory\controller
 */
class FactoryTest extends TestCase
{
    public function test()
    {
        //实例化白猫
        //工厂模式优点：集中封装对象的创建，实例化多个对象后，如需更改，只需要更改实例化的一处地方
        //例如：此时要更改成黑猫，只需 $factoryWhite = new FactoryBlack();
        $factoryWhite = new FactoryWhite();
        $catA = $factoryWhite->create();
        $catB = $factoryWhite->create();
        $catC = $factoryWhite->create();

        echo "color:</br>";
        echo $catA->color();
        echo $catB->color();
        echo $catC->color();

        echo "voice:</br>";
        echo $catA->voice();
        echo $catB->voice();
        echo $catC->voice();

    }
}
