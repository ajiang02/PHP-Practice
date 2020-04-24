<?php


namespace app\memento\controller;


/**
 * Class Zootopia  疯狂动物城，需要备份的游戏
 */
class Zootopia
{

    // 游戏分数
    private $score;


    /**
     * Zootopia constructor.
     * @param $score 分数
     */
    public function __construct($score)
    {
        $this->score = $score;
    }


    /**
     * @return mixed 返回游戏分数
     */
    public function getScore()
    {
        return $this->score;
    }


    /**
     * @param mixed $score 设置游戏分数
     */
    public function setScore($score)
    {
        $this->score = $score;
    }


    /**
     * @return GameMemento  保存游戏分数到备忘录
     */
    public function createMemento()
    {
        return new GameMemento($this->score);
    }


    /**
     * @param GameMemento $gameMemento 从备忘录中恢复游戏分数
     */
    public function restoreScore(GameMemento $gameMemento)
    {
        $this->score = $gameMemento->getBackup();
    }

}