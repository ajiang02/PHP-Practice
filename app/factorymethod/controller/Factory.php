<?php

namespace app\factory\controller;

/**
 * Class Factory 抽象工厂:规定子类实例化具体产品（猫）
 * @package app\factory\controller
 */
abstract class Factory
{
    abstract public function create();
}