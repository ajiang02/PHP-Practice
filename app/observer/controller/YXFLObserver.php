<?php


namespace app\observer\controller;


/**
 * Class YXFLObserver  玉秀风灵的具体观察者（我一直在看着你 看着你 目不转睛）
 */
class YXFLObserver extends ObserverAbstract
{
    /**
     * @var 观察者的名字，将会push进YXFLSubject的数组
     */
    private $name;


    /**
     * YXFLObserver constructor.
     * @param String $name 观察者的名字
     */
    public function __construct(String $name)
    {
        $this->name = $name;
    }


    /**
     * 更新通知
     */
    public function update()
    {
        echo 'Dear ' . $this->name . '! Your YXFL subscription is up to date' . "</br>";
    }

    public function __get($name)
    {
        return $this->name;
    }
}