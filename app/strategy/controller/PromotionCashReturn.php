<?php
namespace app\strategy\controller;


/**
 * @title 返利收费子类
 * @package app\strategy\controller
 */
 class PromotionCashReturn extends PromotionAbstract
{
    //满多少
    private $condition;

    //减多少
    private $return;

     /**
      * PromotionCashReturn constructor.
      * @param $condition  desc:满多少
      * @param $return     desc:减多少
      */
    public function __construct(float $condition, float $return)
    {
        $this->condition = $condition;
        $this->return    = $return;
    }


     /**
      * @param  double $cash       desc:收费现金
      * @return double|float|int   desc:返利情况下收费现金
      */
    public function acceptCash(float $cash)
    {
        if ($cash >= $this->condition) {
            //例如满300减40，满600减80
            //floo()取整数
            $cash = $cash - floor($cash/$this->condition)*$this->return;
        }
        return $cash;
    }
}