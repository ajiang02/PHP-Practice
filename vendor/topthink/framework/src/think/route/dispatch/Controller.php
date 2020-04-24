<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2019 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
declare (strict_types = 1);

namespace think\route\dispatch;

use ReflectionClass;
use ReflectionException;
use ReflectionMethod;
use think\App;
use think\exception\ClassNotFoundException;
use think\exception\HttpException;
use think\helper\Str;
use think\route\Dispatch;

/**
 * Controller Dispatcher
 */
class Controller extends Dispatch
{
    /**
     * 控制器名
     * @var string
     */
    protected $controller;

    /**
     * 操作名
     * @var string
     */
    protected $actionName;

    public function init(App $app)
    {
        // 父类的init调用了doRouteAfter方法
        // 主要有：添加中间件、绑定模型数据、记录当前请求的路由规则、记录路由变量、数据自动验证
        parent::init($app);

        //
        $result = $this->dispatch;

        if (is_string($result)) {
            $result = explode('/', $result);
        }

        // 获取控制器名:如果$result[0]为空，则使用默认控制器
        $controller = strip_tags($result[0] ?: $this->rule->config('default_controller'));

        /**
         * 如果控制器名称中有点号，也就是多级控制器解析
         * 比如，控制器类的文件位置为 app/index/controller/user/Blog.php
         * 访问地址可以使用： http://serverName/index.php/user.blog/index
         */
        if (strpos($controller, '.')) {
            $pos              = strrpos($controller, '.');
            $this->controller = substr($controller, 0, $pos) . '.' . Str::studly(substr($controller, $pos + 1));
        } else {
            // Str::studly：下划线转驼峰(首字母大写)
            $this->controller = Str::studly($controller);
        }

        // 获取操作名
        $this->actionName = strip_tags($result[1] ?: $this->rule->config('default_action'));

        // 设置当前请求的控制器、操作
        $this->request
            ->setController($this->controller)
            ->setAction($this->actionName);
    }

    public function exec()
    {
        try {
            // 实例化控制器
            $instance = $this->controller($this->controller);
        } catch (ClassNotFoundException $e) {
            throw new HttpException(404, 'controller not exists:' . $e->getClass());
        }

        // 注册控制器中间件
        $this->registerControllerMiddleware($instance);

        return $this->app->middleware->pipeline('controller')
            ->send($this->request)
            ->then(function () use ($instance) {
                // 获取当前操作名
                $suffix = $this->rule->config('action_suffix');
                $action = $this->actionName . $suffix;

                if (is_callable([$instance, $action])) {
                    $vars = $this->request->param();
                    try {
                        $reflect = new ReflectionMethod($instance, $action);
                        // 严格获取当前操作方法名
                        $actionName = $reflect->getName();
                        if ($suffix) {
                            $actionName = substr($actionName, 0, -strlen($suffix));
                        }

                        $this->request->setAction($actionName);
                    } catch (ReflectionException $e) {
                        $reflect = new ReflectionMethod($instance, '__call');
                        $vars    = [$action, $vars];
                        $this->request->setAction($action);
                    }
                } else {
                    // 操作不存在
                    throw new HttpException(404, 'method not exists:' . get_class($instance) . '->' . $action . '()');
                }

                $data = $this->app->invokeReflectMethod($instance, $reflect, $vars);

                return $this->autoResponse($data);
            });
    }

    /**
     * 使用反射机制注册控制器中间件
     * @access public
     * @param object $controller 控制器实例
     * @return void
     */
    protected function registerControllerMiddleware($controller): void
    {
        // 获取反射类对象
        $class = new ReflectionClass($controller);

        // 检查控制器类是否有middleware属性
        if ($class->hasProperty('middleware')) {
            // 提取middleware变量
            $reflectionProperty = $class->getProperty('middleware');

            // 设置可见性为公有
            $reflectionProperty->setAccessible(true);

            // 获取middleware属性的值
            $middlewares = $reflectionProperty->getValue($controller);

            // 解析控制器中间件配置
            foreach ($middlewares as $key => $val) {
                // 如果不是 int
                if (!is_int($key)) {
                    /**
                     * $this->request->action(true) 获取当前操作名并转为小写
                     * array_map( function(){'转为小写'}, $val['only'] )
                     * 如果有设置only属性  &&  当前操作不是否在$val['only']里面，则跳过（说明该操作不需要执行该中间件）
                     */
                    if (isset($val['only']) && !in_array($this->request->action(true), array_map(function ($item) {
                        return strtolower($item);
                        }, is_string($val['only']) ? explode(",", $val['only']) : $val['only']))) {
                        continue;
                    }
                    // 如果有设置except属性  &&  当前操作在$val['except']里面，说明当前操作不需要该中间件，跳过
                    elseif (isset($val['except']) && in_array($this->request->action(true), array_map(function ($item) {
                        return strtolower($item);
                    }, is_string($val['except']) ? explode(',', $val['except']) : $val['except']))) {
                        continue;
                    }
                    // 保存中间件名称或者类
                    else {
                        $val = $key;
                    }
                }

                if (is_string($val) && strpos($val, ':')) {
                    $val = explode(':', $val, 2);
                }

                // 注册控制器中间件，跟前面注册路由中间件一样原理，只是，中间件的type为controller
                $this->app->middleware->controller($val);
            }
        }
    }

    /**
     * 实例化访问控制器
     * @access public
     * @param string $name 资源地址
     * @return object
     * @throws ClassNotFoundException
     */
    public function controller(string $name)
    {
        // 是否使用控制器后缀
        $suffix = $this->rule->config('controller_suffix') ? 'Controller' : '';

        // 访问控制器层名称
        $controllerLayer = $this->rule->config('controller_layer') ?: 'controller';

        // 空控制器名称
        $emptyController = $this->rule->config('empty_controller') ?: 'Error';

        // 获取控制器完整的类名
        $class = $this->app->parseClass($controllerLayer, $name . $suffix);

        // 如果类存在
        if (class_exists($class)) {
            // 通过容器获取实例（非单例模式）
            return $this->app->make($class, [], true);
        }
        // 不存在时，如果有空控制器的类存在
        elseif ($emptyController && class_exists($emptyClass = $this->app->parseClass($controllerLayer, $emptyController . $suffix))) {
            // 通过容器获取实例，实例化空控制器
            return $this->app->make($emptyClass, [], true);
        }
        // 如果找不到控制器的类，且连控控制器也没有，抛出错误
        throw new ClassNotFoundException('class not exists:' . $class, $class);
    }
}
