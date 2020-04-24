<?php
namespace app\strategy\controller;

/**
 * @title 现金收费抽象类
 * @package app\strategy\controller
 */
abstract class PromotionAbstract
{
    abstract public function acceptCash(float $cash);
}