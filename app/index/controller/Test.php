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


        $str = "abcXYZdef";
        $res   = $this->LeftRotateString($str, 3);
        print_r($res);
        //$this->assertEquals(2, count($res));
    }


    function LeftRotateString($str, $n)
    {
        $sub = substr($str,0,$n);
        $truncated_str = substr($str,$n);
        return $truncated_str.$sub;
    }
}
