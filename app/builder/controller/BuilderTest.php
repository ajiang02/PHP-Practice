<?php


namespace app\builder\controller;


class BuilderTest
{
    public function test()
    {
        //我要手撕鸡饭
        $sc       = new ShreddedChickenBuilder();  //实例化建造者
        $director = new Director($sc);             //将建造者对象赋值给指挥者，让指挥者去调用
        echo $director->create();                  //指挥者的create()是调用了建造者的show()

        //我要番茄牛肉饭
        $fqnr = new BeefAndTomatoBuilder();
        $director = new Director($fqnr);
        echo $director->create();
    }
}