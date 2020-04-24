<?php


namespace app\bridge\controller;

/**
 * Class Graphics  抽象图形类
 * @package app\bridge\controller
 */
abstract class Graphics
{
    /**
     * @var Color 存放具体颜色类的实例
     */
    public $color;


    /**
     * Graphics constructor.
     * @param Color $color 颜色实例
     */
    public function __construct(Color $color)
    {
        $this->color = $color;
    }


    /**
     * @return mixed
     */
    abstract public function display();



}