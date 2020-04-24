<?php


namespace app\composite\controller;


use think\Exception;

class Province extends CentralSystem
{

    // 存放其子节点
    protected $office = [];


    /**
     * @param CentralSystem $centralSystem  添加子节点，将子节点放在数组
     * @throws Exception
     */
    public function add(CentralSystem $centralSystem)
    {
        // 获取新节点的名字
        $office_name = $centralSystem->getName();

        if (in_array($office_name, $this->office)) {
            throw new Exception($office_name . '节点已经存在');
        } else {
            $this->office[$office_name] = $centralSystem;
        }
    }


    /**
     * @param CentralSystem $centralSystem 移除子节点，将子节点从数组中移除
     * @throws Exception
     */
    public function remove(CentralSystem $centralSystem)
    {
        // 获取新节点的名字
        $office_name = $centralSystem->getName();

        if (in_array($office_name, $this->office)) {
            unset($this->office[$office_name]);
        } else {
            throw new Exception($office_name . '节点不存在');
        }
    }


    /**
     * @param int $deep 重复字符'-'的次数
     */
    public function show($deep = 0)
    {
        echo str_repeat('-', $deep) . $this->name;

        echo "</br>";

        // 循环子节点的 节点数组$office
        foreach ($this->office as $item) {
            $item->show($deep + 4);
        }
    }
}