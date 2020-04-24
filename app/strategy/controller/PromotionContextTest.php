<?php

namespace app\strategy\controller;

use PHPUnit\Framework\TestCase;

/**
 * @title   PromotionContext的测试类
 * @package app\strategy\controller
 */
class PromotionContextTest extends TestCase
{
    //test PromotionContext
    public function test()
    {
        //设置总共的商品金额
        $total = 781.2;

        /*
        //选择当前的商场促销方式
        $promotion = new PromotionContext('打八折');
        //返回打折后的金额
        return $promotion->getResult($total);
        */



        //选择当前的商场促销方式
        $promotion = new PromotionContext('满300减40');
        //返回打折后的金额
        return $promotion->getResult($total);


    }
}
