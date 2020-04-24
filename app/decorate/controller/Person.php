<?php
namespace app\decorate\controller;

/**
 * @title 人是具体类ConcreteComponent（被装饰的对象）
 * @package app\strategy\controller
 * @description 如果被装饰的对象不只有人的话,比如有猫、狗的话,那么需要一个抽象类,人狗猫等具体对象继承抽象类Component。
 *              被装饰者抽象类与装饰者抽象类都是继承Component抽象类
 *              此时只有一个被装饰对象(person),故没有抽象类Component
 */
class Person
{
    //人物名字
    private $name;


    /**
     * Person constructor.
     * @param string $name
     */
    public function __construct(string $name=null)
    {
        $this->name = $name;
    }


    /**
     * @return string  desc:返回人物的装扮
     */
    public function show()
    {
        echo $this->name . '的装扮';
        return true;
    }
}