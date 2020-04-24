<?php


namespace app\builder\controller;


/**
 * Class BeefAndTomatoBuilder 番茄牛肉饭具体建造者，客户端直接调用，生成番茄牛肉饭
 */
class BeefAndTomatoBuilder extends BuilderAbstract
{
    /**
     * 输出产品
     */
    public function show()
    {
        //实例化番茄牛肉产品类
        $bt = new BeefAndTomatoRice();

        $meat        = $bt->meat();
        $vegetable   = $bt->vegetables();
        $staple_food = $bt->staple_food();
        $taste       = $bt->taste();

        return "番茄牛肉饭：" . $meat . " " . $vegetable . " " . $staple_food . " " . $taste . "</br>";
    }
}