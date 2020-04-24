<?php
namespace app\decorate\controller;

/**
 * @title 服饰类是抽象类Decorator
 * @package app\strategy\controller
 * @description 如果具体装饰者只有一个的话，那么不需要有装饰者抽象类。
 *              此时有多个具体装饰者，所以需要装饰者抽象类。
 *              此时只有Person一个被装饰对象，所以直接继承Person即可。
 */
class Decorator extends Person
{
    //Person对象
    protected $person;


    /**
     * @param $person desc:注意这里的参数不写Person $person,是因为传入的是一个已经实例化的对象，而非依赖注入的新对象
     * @description 不用构造函数初始化是因为父类已经存在构造函数了。
     */
    public function decorate($person)
    {
        $this->person = $person;
    }


    /**
     * @description 重写父类的show()
     * @return string|void
     */
    public function show()
    {
        if ($this->person != null) {
          $this->person->show();
        }
    }
}




