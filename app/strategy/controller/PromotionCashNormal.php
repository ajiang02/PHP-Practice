<?php
namespace app\strategy\controller;

/**
 * @title 正常收费子类
 * @package app\strategy\controller
 */
 class PromotionCashNormal extends PromotionAbstract
{
     /**
      * @param float      $cash
      * @return float     desc:正常情况收费现金
      */
    public function acceptCash(float $cash)
    {
        return $cash;
    }
}