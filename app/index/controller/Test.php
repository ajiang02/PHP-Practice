<?php

namespace app\index\controller;

use PHPUnit\Framework\TestCase;


class Test extends TestCase
{
    public function test()
    {
        $str = 'bab';
        $this->Permutation($str);

    }


    function Permutation($str)
    {
        if (empty($str)) return $str;

        $arr   = str_split($str);  // 字符串转数组
        $res   = [];               // 存放最终结果的数组
        $print = '';               // 存放每次的排序


        $this->recursive($arr, $res, $print);
        print_r($res);
        $this->assertEquals(6, count($res));


    }


    public function recursive($arr, &$res, $print)
    {
        $length = count($arr);  // 数组长度

        // 如果递归走到最后一个字符
        if ($length == 1) {
            $res[] = $print . $arr[0];
            return;
        }

        for ($i = 0; $i < $length; $i++) {
            // 如果当前字符与首字符重复，则剪枝
            if ($i != 0 && $arr[$i] == $arr[0]) continue;

            $this->swap($arr[0], $arr[$i]);                                  // 与首字符交换位置
            $this->recursive(array_slice($arr, 1), $res, $print . $arr[0]);  //

        }

    }

    public function swap(&$left, &$right)
    {
        $tmp   = $left;
        $left  = $right;
        $right = $left;
    }


}
