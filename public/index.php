<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2019 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

// [ 应用入口文件 ]
namespace think;

/**
 * 引入自动加载器，实现类的自动加载功能（PSR4标准）
 * 加载 \vendor\autoload.php
 */
require __DIR__ . '/../vendor/autoload.php';


// 执行HTTP应用并响应
/**
 * new App()： 实例化 \vendor\topthink\framework\src\think\App()
 *
 * ->http： App 并不存在 http 属性，但 App 继承了 Container 类
 *         实际上是调用了 Container 类的魔术方法 __get()，它又调用 get()。
 *        （在 PHP 中，当访问到的变量不存在，就会触发__get() 魔术方法）
 *         最后得到 Http 类的一个实例
 */
$http = (new App())->http;

/**
 * 1、得到 think\Request 的实例对象，
 * 2、App 应用的初始化，其主要的操作有：加载环境变量、加载配置文件，加载语言包、监听 AppInit、initializers(应用初始化器数组）包含的类的初始化。
 * 3、加载全局中间件
 * 4、设置开启事件机制、监听HttpRun
 * 5、路由调度
 */
$response = $http->run();

$response->send();

$http->end($response);
