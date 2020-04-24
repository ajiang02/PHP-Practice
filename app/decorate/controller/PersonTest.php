<?php

namespace app\decorate\controller;

use PHPUnit\Framework\TestCase;

class PersonTest extends TestCase
{
    public function test()
    {
        //实例化被装饰对象Person
        $person  = new Person('ajiang');

        //实例化具体装饰者
        $Hat     = new DecoratorHat();  //给穿上T恤
        $Reebook = new DecoratorReebok();  //给穿上鞋子

        //开始装饰
        $Hat->decorate($person);
        $Reebook->decorate($Hat);

        //显示最后的装扮
        $Reebook->show();
    }
}
