<?php

namespace app\strategy\controller;

/**
 * @title   上下文：维护具体算法的引用
 * @package app\strategy\controller
 */
class PromotionContext
{
    //商品促销的具体算法对象
    private $promotion;


    /**
     * Context constructor.
     * @param $type  desc:客户端选择促销模式
     */
    public function __construct(string $type)
    {
        //如果switch在客户端，则__construct传的参是具体的子类(实例化)
        //$this->promotion = $promtion;

        //将本来在PromotionTest(类似客户端)的判断(这种判断是简单工厂模式)放在这里，提高PromotionTest的简洁性
        //未来如果有新的促销方式，比如积分兑换代金券，即可构造一个算法，继承PromotionAbstract抽象类，并在这里添加一个分支条件
        switch ($type) {
            case '正常收费' :
                $this->promotion = new PromotionCashNormal();
                break;
            case '打八折' :
                $this->promotion = new PromotionCashRebate(0.8);
                break;
            case '满300减40' :
                $this->promotion = new PromotionCashReturn(300, 40);
                break;
        }
    }


    /**
     * @param  $cash       desc:收费现金
     * @return float|int   desc:最终收费现金
     */
    public function getResult(float $cash)
    {
        return $this->promotion->acceptCash($cash);
    }

}