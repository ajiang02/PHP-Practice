<?php

namespace app\Proxy\controller;

/**
 * @title   Class RealSubject   desc:真实对象，继承SubjectAbstract抽象类
 * @package app\proxy\controller
 */
class RealSubject extends SubjectAbstract
{
    public function action()
    {
        echo "<br>这是RealSubject的action</br>";
    }
}