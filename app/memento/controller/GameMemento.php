<?php


namespace app\memento\controller;


/**
 * Class GameMemento 游戏备忘录，供Zootopia类调用保存、恢复游戏的分数
 */
class GameMemento
{

    // 保存游戏分数
    private $backup;


    /**
     * GameMemento constructor.  保存游戏分数
     */
    public function __construct($backup)
    {
        $this->backup = $backup;
    }


    /**
     * @return mixed 获取保存的分数
     */
    public function getBackup()
    {
        return $this->backup;
    }

}