<?php


namespace app\composite\controller;

/**
 * Class CompositeTest  组合模式测试----唐朝三省六部制
 * 结果：
 * 唐太宗
 * ----门下省
 * ----尚书省
 * --------吏部
 * --------户部
 * --------礼部
 * --------兵部
 * --------刑部
 * --------工部
 * ----中书省
 */
class CompositeTest
{

    public function test()
    {
        // 唐太宗相当于根节点root
        $emperor = new Emperor('唐太宗');
        // 唐太宗下的三个子节点：门下省、尚书省、中书省
        $emperor->add(new Province('门下省'));
        $emperor->add(new Province('中书省'));
        $shangshu = new Province('尚书省');     // 这里单独赋值是因为“尚书省”要另外添加子节点
        $emperor->add($shangshu);

        // 尚书省添加六部
        $shangshu->add(new Ministries('吏部'));
        $shangshu->add(new Ministries('户部'));
        $shangshu->add(new Ministries('礼部'));
        $shangshu->add(new Ministries('兵部'));
        $shangshu->add(new Ministries('刑部'));
        $shangshu->add(new Ministries('工部'));

        // 循环唐太宗的子节点数组，其子节点又有自己的子节点。
        $emperor->show();

    }
}