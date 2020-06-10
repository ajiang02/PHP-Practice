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

        $pRoot = new TreeNode(1);
        $node1 = new TreeNode(2);
        $node2 = new TreeNode(3);

        $pRoot->right = $node1;
        $node1->right = $node2;


        $res = $this->IsBalanced_Solution($pRoot);
        $this->assertEquals(false, $res);
    }


    function IsBalanced_Solution($pRoot)
    {

        return $this->recursive($pRoot) != -1;

    }

    function recursive($pRoot)
    {
        if ($pRoot == NULL) return 0;
        $left = $this->recursive($pRoot->left);
        if ($left == -1) return -1;

        $right = $this->recursive($pRoot->right);
        if ($right == -1) return -1;

        return abs($left - $right) < 2 ? max($left, $right) + 1 : -1;
    }
}
