<?php


namespace app\facade\controller;

/**
 * Class DrinkFacade  外观模式：需要了解子系统（Apple Pear Milk）的方法或属性，组合成接口，提供给用户，用户不需要关心具体类的操作
 */
class DrinkFacade
{
    public $apple;
    public $pear;
    public $milk;

    /**
     * DrinkFacade constructor. 构造器实例化三个具体类
     */
    public function __construct()
    {
        $this->apple = new Apple();
        $this->pear  = new Pear();
        $this->milk  = new Milk();
    }


    /**
     * 苹果牛奶饮品
     */
    public function apple_milk()
    {
        // Apple类的buy方法
        return $this->apple->buy() . ' and ' . $this->milk->buy();
    }


    /**
     * 梨牛奶饮品
     */
    public function pear_milk()
    {
        // Pear类的buy方法
        return $this->pear->buy() . ' and ' . $this->milk->buy();
    }
}