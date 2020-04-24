<?php


namespace app\memento\controller;


class MementoManage
{
    private $menento = [];

    /**
     * @param Memento $memento 存档备忘录
     */
    public function setMemento($memento)
    {
        array_push($this->menento, $memento);
        //$this->menento = $memento;
    }


    /**
     * @return mixed  取出最近一次备忘录
     */
    public function lastMemento()
    {
        return array_pop($this->menento);
    }


    /**
     * @param $index  取出第index备忘录
     * @return mixed
     */
    public function getMemento($index)
    {
        return $this->menento[$index-1];
    }


}