<?php


namespace app\abstractfactory\controller;

use think\Config;

use ReflectionClass;
use ReflectionException;

/**
 * Class AbstractFactoryTest 抽象工厂的测试
 * 此模式的优点是：工厂组装现有产品方便
 * 此模式的缺点是：如果增加抽象产品菜类->大白菜、生菜，那么需要更改的地方有以下：
 *                       添加新类：菜类(抽象产品)、大白菜(具体产品)、生菜(具体产品)
 *                       修改现有类：ProcurementAbstract(抽象工厂)、ProcurementA(具体工厂)、ProcurementB(具体工厂)
 * 优化方法一：使用简单工厂类Factory替换掉ProcurementAbstract(抽象工厂)、ProcurementA(具体工厂)、ProcurementB(具体工厂)
 *             =>使用switch/case，根据需求(类似采购方案A、B)来选择实例化具体产品
 * 优化方法二：使用反射机制(ReflectionClass)
 *
 */
class AbstractFactoryTest
{
    public function test()
    {
        // 采购人员$pa按照采购方案A(具体工厂类)去采购：牛肉和小米
        //优点：如果需要ProcurementB来采购，只需要更改这里为ProcurementB
        $pa = new ProcurementA();

        $riceA = $pa->create_rice()->buy();   //$pa的create_rice()返回的是小米具体产品的实例对象，然后对象再调用它的buy()
        $meatA = $pa->create_meat()->buy();   //$pa的create_meat()返回的是牛肉具体产品的实例对象，然后对象再调用它的buy()

        // 采购人员B采购：牛肉
        $riceB = $pa->create_meat()->buy();
    }
}

/*
//优化方法一
class AbstractFactoryTest
{
    public function test()
    {
        $procurement = 'B';
        switch ($procurement) {
            case 'A':
                // 采购人员按照采购方案A(具体工厂类)去采购：牛肉和小米
                //这里代替了ProcurementA具体工厂类的功能
                $meat = (new BeefMeat())->buy();
                $rice = (new MilletRice())->buy();
                break;
            case 'B':
                // 采购人员按照采购方案B(具体工厂类)去采购：猪肉和黑米
                $meat = (new PorkMeat())->buy();
                $rice = (new BlackRice())->buy();
                break;
        }
        echo $meat . $rice;
    }
}
*/
/*
//优化方法二
class AbstractFactoryTest
{
    public $namespace = '\app\abstractfactory\controller\\';

    public function test()
    {
        // 采购人员按照采购方案A(具体工厂类)去采购：牛肉和小米
        $procurement   = Config::get('procurementA');
        $meatClassName = $this->namespace . $procurement['meat'];
        $riceClassName = $this->namespace . $procurement['rice'];

        try {
            //$meatClassName传给ReflectionClass的构造函数
            $mclass = new ReflectionClass($meatClassName);
            $rclass = new ReflectionClass($riceClassName);

            //实例化类
            $meatObj = $mclass->newInstance();
            $riceObj = $rclass->newInstance();

        } catch (\ReflectionException $e) {
            return $e->getMessage();
        }
        echo $meatObj->buy() . "<br />" . $riceObj->buy();
    }
}*/
