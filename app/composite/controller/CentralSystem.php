<?php


namespace app\composite\controller;

/**
 * Class CentralSystem  中央官制抽象类，其子类必须实现抽象方法
 */
abstract  class CentralSystem
{
    // 当前类名字
    protected $name;

    /**
     * CentralSystem constructor. 构造函数，初始化$name
     */
    public function __construct($name)
    {
        $this->name = $name;
    }


    /**
     * @return mixed 获得类名字
     */
    public function getName()
    {
        return $this->name;
    }

    // 添加子节点
    abstract public function add(CentralSystem $centralSystem);
    // 移除子节点
    abstract public function remove(CentralSystem $centralSystem);
    // 循环当前节点的子节点
    abstract public function show($deep);
}