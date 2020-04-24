<?php


namespace app\stats\controller;


/**
 * Class OnlineShopping 网购类(Context环境类)
 * 在setStats()中传给具体的 State 类，这样State类才能改变它。
 */
class OnlineShopping
{
    /**
     * @var $stats  保存当前的状态。
     */
    private $stats;


    /**
     * OnlineShopping constructor.初始化状态是未支付状态（也可以不写）
     */
    public function __construct()
    {
        $this->stats = new Unpaid();
    }


    /**
     * @param $stats 传入具体状态类后，将改变 $this->stats当前保存的状态
     */
    public function setStats($stats)
    {
        $this->stats = $stats;
    }


    /**
     * 物流信息，调用具体状态类的message()方法，输出物流信息
     */
    public function logistics()
    {
        $this->stats->message();
    }
}