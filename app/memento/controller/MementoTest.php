<?php


namespace app\memento\controller;


class MementoTest
{
    public function test()
    {
        // 游戏刚开始，分数为0
        $zootopia = new Zootopia(0);

        // 游戏进行的很激烈，98分
        $zootopia->setScore(98);

        // 将游戏分数保存在备忘录
        $manage = new MementoManage();
        $memento = $zootopia->createMemento();
        $manage->setMemento( $memento);

        // 游戏失手了，分数降为60
        $zootopia->setScore(60);

        //我要回到98分！！！
        $last = $manage->lastMemento();
        $zootopia->restoreScore($last);
        echo $zootopia->getScore();
    }


}