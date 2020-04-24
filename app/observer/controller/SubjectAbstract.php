<?php


namespace app\observer\controller;

/**
 * Class SubjectAbstract (主题)被观察者的抽象类
 */
abstract class SubjectAbstract
{
    abstract function attach(ObserverAbstract $coa);
    abstract function detach(ObserverAbstract $coa);
    abstract function notify();
}