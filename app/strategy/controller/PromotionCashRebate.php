<?php
namespace app\strategy\controller;


/**
 * @title 打折收费子类
 * @package app\strategy\controller
 */
 class PromotionCashRebate extends PromotionAbstract
{
    //折扣率
    private $discount;


     /**
      * PromotionCashRebate constructor.
      * @param $discount desc:折扣率
      */
    public function __construct(float $discount)
    {
        $this->discount = $discount;
    }


     /**
      * @param  double $cash  desc:收费现金
      * @return double        desc:打折情况下收费现金
      */
    public function acceptCash(float $cash)
    {
        $cash = $cash * $this->discount;
        return $cash;
    }
}