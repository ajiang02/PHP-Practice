<?php

namespace app\singleton\controller;

use PHPUnit\Framework\TestCase;  // composer 安装 PHPUnit

/**
 * Class TestSingleton  利用 PHPUnit 来测试
 * 1.断言方法的用法：静态 vs. 非静态
 *       PHPUnit 的各个断言是在 PHPUnit\Framework\Assert 中实现的。 PHPUnit\Framework\TestCase 则继承于 PHPUnit\Framework\Assert。
 *
 *      各个断言方法均声明为 static，可以从任何上下文以类似于 PHPUnit\Framework\Assert::assertTrue() 的方式调用，
 *      或者也可以用类似于 $this->assertTrue() 或 self::assertTrue() 的方式在扩展自 PHPUnit\Framework\TestCase 的类内调用。
 *
 *      实际上，只要（手工）包含了 PHPUnit 中的 src/Framework/Assert/Functions.php 源码文件，
 *      甚至可以在任何上下文中（甚至包括扩展自 PHPUnit\Framework\TestCase 的类中）以诸如 assertTrue() 这样的方式来调用全局函数封装。
 *
 *      有个常见的疑问——究竟应该用 $this->assertTrue() 还是 self::assertTrue() 这样的形式来调用断言才是“正确的方式”？
 *      简而言之：没有正确方式。同时，也没有错误方式。这基本上是个人喜好问题。
 *
 *      对于大多数人而言，由于测试方法是在测试对象上调用，因此用 $this->assertTrue() 会“觉的更正确”。
 *      然而请记住断言方法是声明为 static 的，这使其可以（重）用于测试对象的作用域之外。
 *      最后，全局函数封装让开发者能再少打一些字（用 assertTrue() 代替 $this->assertTrue() 或者 self::assertTrue()）。
 */
class TestSingleton extends TestCase
{
    public function test()
    {
        // 调用两次 getInstance()
        $one = Singleton::getInstance();
        $two = Singleton::getInstance();

        // 断言这两个对象是相等的。结果是相等。
        $this->assertEquals($one, $two);
    }



}
