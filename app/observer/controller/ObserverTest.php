<?php


namespace app\observer\controller;


class ObserverTest
{
    public function test()
    {
        //玉秀风灵的主题
        $yxfl = new YXFLSubject();
        //观察者Ajiang订阅了玉秀风灵的番剧
        $ajiang = new YXFLObserver('ajiang');
        $yxfl->attach($ajiang);
        //观察者admin订阅了玉秀风灵的番剧
        $yxfl->attach(new YXFLObserver('admin'));
        //番剧给观察者发送通知
        $yxfl->notify();
        //观察者取消观察
        $yxfl->detach($ajiang);
        echo $ajiang->name . " cancel YXFL subscription</br>";
        $yxfl->notify();


        echo "--------------这是分割线-----------------------</br>";


        //美食博主的主题
        $fb = new FoodBloggersSubject();
        //观察者soul订阅了美食博主的栏目
        $fb->attach(new FoodBloggersObserver('soul'));
        //观察者lun订阅了美食博主的栏目
        $fb->attach(new FoodBloggersObserver('lun'));
        $fb->notify();
    }
}