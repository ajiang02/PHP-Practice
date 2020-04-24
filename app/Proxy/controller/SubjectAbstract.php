<?php

namespace app\Proxy\controller;

/**
 * @title   Class SubjectAbstract 抽象类，真实对象与代理对象继承此类。
 * @package app\proxy\SubjectAbstract
 */
abstract class SubjectAbstract
{
    abstract public function action();
}