<?php
namespace app\decorate\controller;


class DecoratorReebok extends Decorator
{
    /**
     * @description 先运行本类的语句，再运行父类的方法。相当于给父类方法加上装饰。
     * @return string|void
     */
    public function show()
    {
        echo " 锐步运动鞋 ";
        parent::show();
    }
}