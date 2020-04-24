<?php

namespace app\Proxy\controller;

use GuzzleHttp\Handler\Proxy;

/**
 * @title   Class ProxySubject   desc:代理对象，继承SubjectAbstract抽象类
 * @package app\proxy\controller
 */
class ProxySubject extends SubjectAbstract
{
    /**
     * @var 绑定真实对象
     */
    private $proxy = null;

    /**
     * @description 在代理真实对象前后，添加代理对象自己的想法
     */
    public function action()
    {
        //本类方法
        $this->before();
        //若没有真实对象，则实例化
        if ($this->proxy == null) {
            $this->proxy = new RealSubject();
        }
        //调用真实对象方法
        $this->proxy->action();
        //本类方法
        $this->after();
    }


    public function after()
    {
        echo "<br>这是代理后的操作</br>";

    }

    public function before()
    {
        echo "<br>这是开始代理前的操作</br>";
    }

}