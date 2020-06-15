<?php

namespace app\index\controller;

use PHPUnit\Framework\TestCase;


class Test extends TestCase
{

    /**
     * 输入数据
     */
    public function test()
    {
        /*$pRoot = new TreeNode(3);
        $node1 = new TreeNode(9);
        $node2 = new TreeNode(2);
        $node3 = new TreeNode(1);
        $node4 = new TreeNode(7);

        $pRoot->left  = $node1;
        $pRoot->right = $node2;
        $node2->left  = $node3;
        $node2->right = $node4;*/


        $res = $this->FindContinuousSequence(100);
        print_r($res);
        //$this->assertEquals(2, count($res));
    }


    function FindContinuousSequence($target)
    {
        $left = $right = 1;                 // 滑动窗口的左右边界初始化为 1
        $sum  = 0;                          // 滑动窗口内的所有元素总值
        $end  = ceil($target / 2);   // 窗口的右边界最大到 target 值的一半
        $res  = [];                         // 存放所有满足条件的序列

        while ($right <= $end) {
            // 如果窗口内总值小于目标值，则计入总值，并右边界右移
            if ($sum < $target) {
                $sum = $sum + $right;
                $right++;
            } elseif ($sum > $target) {
                // 如果窗口总值大于目标值，则从总值中减去，并左边界右移
                $sum = $sum - $left;
                $left++;
            } else {
                // 如果窗口总值等于目标值，则放入结果数组，继续移动
                $tmp = [];  // 存放每一次的连续序列
                for ($i = $left; $i < $right; $i++) {
                    $tmp[] = $i;
                }
                $res[] = $tmp;
                $sum   = $sum - $left;
                $left++;
            }
        }
        return $res;
    }
}
