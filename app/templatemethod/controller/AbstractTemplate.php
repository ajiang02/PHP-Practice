<?php


namespace app\templatemethod\controller;

/**
 * Class AbstractTemplate  抽象模板，是顶级逻辑，更详细的细节在子类实现
 * @package app\TempalatMethod\controller
 */
abstract class AbstractTemplate
{
    abstract public function submit();
    abstract public function answerOne($one);
    abstract public function answerTwo($two);
}