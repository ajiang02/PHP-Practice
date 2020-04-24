<?php


namespace app\singleton\controller;


/**
 * Class Singleton 单例模式
 *
 * 懒汉模式：Singleton 只有被引用时才实例，在多线程中可能会产生多个实例，不安全。
 * 饿汉模式：Singleton 一加载就产生实例。
 * synchronized：同一时间只允许一个线程持有某个对象锁（同步锁），确保getInstance方法线程安全，但是效率低下。（JAVA）
 * 双重校验锁：synchronized的改进，不锁住整个 getInstance，而是锁住 getInstance 的部分代码，当为null时才锁住去实例。(JAVA)
 *
 * 而 PHP-FPM 是单线程，压根不需要关注线程安全问题。
 */
class Singleton extends pthreads
{

    /**
     * @var null   private\static：一个类只有一个实例
     */
    private static $singleton = null;


    /**
     * Singleton constructor.  private：不允许外部实例化，类必须自行创建这个实例
     */
    private function __construct()
    {
    }


    /**
     * private：不允许外部通过克隆实例化类
     */
    private function __clone()
    {
    }


    /**
     * @return Singleton|null  类自行实例
     */
    static public function getInstance()
    {
        // 如果还未实例化，则 new
        if (is_null(self::$singleton)) {
            self::$singleton = new self();
        }
        return self::$singleton;
    }

}