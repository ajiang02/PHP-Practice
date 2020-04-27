<?php

namespace app\index\controller;

use app\bridge\controller\Triangle;
use PHPUnit\Framework\TestCase;


class Test extends TestCase
{

    public function test()
    {
        $root = $this->createTreeNode();
        $res = $this->PrintFromTopToBottom($root);
    }


    public function createTreeNode()
    {
        $root = new TreeNode('R');
        $node1 = new TreeNode('1');
        $node2 = new TreeNode('2');
        $node3 = new TreeNode('3');
        $node4 = new TreeNode('4');

        $root->left = $node1;
        $root->right = $node2;
        $node1->left = $node3;
        $node2->right = $node4;

        return $root;
    }

    function PrintFromTopToBottom($root)
    {
        if (empty($root)) return;
        $queueNode = new \SplQueue();
        $res       = [];
        $queueNode->enqueue($root);  // 先插入第一个节点

        $this->assertNotEmpty($queueNode);
        while (!$queueNode->isEmpty()) {
            $head = $queueNode->dequeue();
            if ($head->left != NULL) $queueNode->enqueue($head->left);
            if ($head->right != NULL) $queueNode->enqueue($head->right);

            array_push($res,$head->val);

        }
        return $res;
    }

}
