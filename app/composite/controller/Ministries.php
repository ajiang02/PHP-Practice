<?php


namespace app\composite\controller;


class Ministries extends CentralSystem
{

    /**
     * @param CentralSystem $centralSystem  叶子节点，没有子节点
     */
    public function add(CentralSystem $centralSystem)
    {
        echo "叶子节点不能添加子节点";
    }


    /**
     * @param CentralSystem $centralSystem 叶子节点，没有子节点
     */
    public function remove(CentralSystem $centralSystem)
    {
        echo "叶子节点不能移除子节点";
    }


    /**
     * @param int $deep 字符'-'重复的次数
     */
    public function show($deep = 0)
    {
        echo str_repeat('-', $deep) . $this->name. "</br>";
    }
}