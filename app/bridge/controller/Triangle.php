<?php


namespace app\bridge\controller;

/**
 * Class Triangle  具体图形类——三角形
 * @package app\bridge\controller
 */
class Triangle extends Graphics
{

    /**
     * @return mixed|void  调用颜色实例的set()方法，输出颜色
     */
    public function display()
    {
        echo "这是一个" ;
        echo $this->color->set();
        echo "三角形</br>";
    }
}