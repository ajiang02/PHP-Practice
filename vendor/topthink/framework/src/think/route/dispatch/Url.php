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

use think\exception\HttpException;
use think\helper\Str;
use think\Request;
use think\route\Rule;

/**
 * Url Dispatcher
 */
class Url extends Controller
{

    public function __construct(Request $request, Rule $rule, $dispatch, array $param = [], int $code = null)
    {
        $this->request = $request;
        $this->rule    = $rule;
        // 解析默认的URL规则
        $dispatch = $this->parseUrl($dispatch);

        parent::__construct($request, $rule, $dispatch, $this->param, $code);
    }

    /**
     * 解析URL地址
     * @access protected
     * @param  string $url URL
     * @return array
     */
    protected function parseUrl(string $url): array
    {
        /**
         * 获取URL分隔符，在 think\Route.php
         * $this->rule = think\route\Rule类，调用其 config()，得到 think\Route类的 $config[]
         */
        $depr = $this->rule->config('pathinfo_depr');
        
        /**
         * 获取路由绑定
         * $this->rule = think\route\Rule类，
         * 调用其 getRouter() 得到 think\Route路由对象
         * 再调用路由对象的 getDomainBind()
         */
        $bind = $this->rule->getRouter()->getDomainBind();

        if ($bind && preg_match('/^[a-z]/is', $bind)) {
            // 如果有模块/控制器绑定
            $bind = str_replace('/', $depr, $bind);

            // 如果有域名绑定
            $url = $bind . ('.' != substr($bind, -1) ? $depr : '') . ltrim($url, $depr);
        }

        // $path为[控制器，操作]这样组成的数组，如["demo", "hello"]
        $path = $this->rule->parseUrlPath($url);
        if (empty($path)) {
            return [null, null];
        }

        // 解析控制器：获取控制器名
        $controller = !empty($path) ? array_shift($path) : null;

        // 检查控制器是否合法
        if ($controller && !preg_match('/^[A-Za-z0-9][\w|\.]*$/', $controller)) {
            throw new HttpException(404, 'controller not exists:' . $controller);
        }

        // 解析操作
        $action = !empty($path) ? array_shift($path) : null;
        $var    = [];

        // 解析额外参数
        if ($path) {
            preg_replace_callback('/(\w+)\|([^\|]+)/', function ($match) use (&$var) {
                $var[$match[1]] = strip_tags($match[2]);
            }, implode('|', $path));
        }

        $panDomain = $this->request->panDomain();
        if ($panDomain && $key = array_search('*', $var)) {
            // 泛域名赋值
            $var[$key] = $panDomain;
        }

        // 设置当前请求的参数
        $this->param = $var;

        // 封装路由
        $route = [$controller, $action];

        // 如果路由被定义过
        if ($this->hasDefinedRoute($route)) {
            throw new HttpException(404, 'invalid request:' . str_replace('|', $depr, $url));
        }

        return $route;
    }

    /**
     * 检查URL是否已经定义过路由
     * @access protected
     * @param  array $route 路由信息
     * @return bool
     */
    protected function hasDefinedRoute(array $route): bool
    {
        [$controller, $action] = $route;

        // 检查地址是否被定义过路由
        $name = strtolower(Str::studly($controller) . '/' . $action);

        $host   = $this->request->host(true);
        $method = $this->request->method();

        if ($this->rule->getRouter()->getName($name, $host, $method)) {
            return true;
        }

        return false;
    }

}
