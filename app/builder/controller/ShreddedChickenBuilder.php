<?php


namespace app\builder\controller;


/**
 * Class ShreddedChickenBuilder 手撕鸡饭具体建造者，客户端直接调用，生成手撕鸡饭
 */
class ShreddedChickenBuilder extends BuilderAbstract
{
    /**
     * 输出产品
     */
    public function show()
    {
        //实例化手撕鸡饭产品类
        $sc = new ShreddedChickenInRice();

        $meat        = $sc->meat();
        $vegetable   = $sc->vegetables();
        $staple_food = $sc->staple_food();
        $taste       = $sc->taste();

        return "手撕鸡饭：" . $meat . " " . $vegetable . " " . $staple_food . " " . $taste . "</br>";
    }
}