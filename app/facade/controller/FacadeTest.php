<?php


namespace app\facade\controller;

/**
 * 调用外观类（DrinkFacade）写好的接口，接口具体的操作不用管，只需要知道接口的功能就好。
 *
 * 外观模式的适用场景：
 *   1:设计初期阶段，将两个层分离（model与logic、logic与controller）,降低耦合
 *   2:开发系统阶段，子系统演化越来越复杂，产生很多小类。此时Facade提供一个接口，减少他们的依赖
 *   3:维护系统阶段，新的开发需求需要依赖粗糙或复杂的旧系统功能。此时Facade提供一个清晰简单的接口，让新系统与Facade交互、Facade与遗留代码交互复杂的工作。
 */
class FacadeTest
{
    public function test()
    {
        $facade = new DrinkFacade();

        // 调用外观模式提供的接口
        $drink1 = $facade->apple_milk(); //能做出苹果牛奶饮料
        $drink2 = $facade->pear_milk();  //能做出香梨牛奶饮料

        return $drink1 .  "</br>" . $drink2;
    }
}