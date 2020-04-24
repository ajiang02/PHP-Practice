<?php


namespace app\observer\controller;


/**
 * Class YXFLSubject  玉秀风灵具体主题类，被观察者。继承抽象类。
 */
class YXFLSubject extends SubjectAbstract
{
    /**
     * @var array 存放观察者的对象
     */
    private $observer;


    /**
     * YXFLSubject constructor. $observer定义成数组
     */
    public function __construct()
    {
        $this->observer = array();
    }


    /**
     * @title 将观察者对象push进数组
     * @param ObserverAbstract $coa    desc:观察者对象
     * @return int
     */
    public function attach(ObserverAbstract $coa)
    {
        return array_push($this->observer, $coa);
    }


    /**
     * @title 将观察者对象从数组删除
     * @param ObserverAbstract $coa   desc:观察者对象
     * @return bool
     */
    public function detach(ObserverAbstract $coa)
    {
        //array_search()返回搜索元素的位置，in_array()返回bool，array_key_exists()返回bool
        $index = array_search($coa, $this->observer);
        if ($index === false) {
            return false;
        }
        unset($this->observer[$index]);
        return true;
    }


    /**
     * @title  通知当前主题的所有观察者
     * @return bool
     */
    public function notify()
    {
        if (!is_array($this->observer)) {
            return false;
        }
        foreach ($this->observer as $k) {
            $k->update();
        }
        return true;
    }

}