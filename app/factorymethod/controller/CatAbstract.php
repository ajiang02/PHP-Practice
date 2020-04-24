<?php
namespace app\factory\controller;

/**
 * Class CatAbstract 猫的抽象类
 * @package app\factory\controller
 */
abstract class CatAbstract
{
    abstract public function voice();
    abstract public function color();
}