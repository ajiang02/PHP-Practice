<?php


namespace app\builder\controller;


/**
 * Class Director 指挥者类，给客户端构建一个使用Builder接口的对象
 */
class Director
{
    public $b;

    public function __construct(BuilderAbstract $builderAbstract)
    {
        $this->b = $builderAbstract;
    }


    public function create()
    {
        return $this->b->show();
    }
}