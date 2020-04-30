<?php

namespace app\index\controller;

use PHPUnit\Framework\TestCase;


class Test extends TestCase
{
    public function test()
    {
        $pRootOfTree = new TreeNode(7);
        $node1 = new TreeNode(1);
        $node2 = new TreeNode(13);
        $node3 = new TreeNode(11);
        $node4 = new TreeNode(10);
        $pRootOfTree->left   = $node1;
        $pRootOfTree->right   = $node2;
        $node2->left   = $node3;
        $node3->left   = $node4;

        $list = $this->Convert($pRootOfTree);
        print_r($list);
    }

    function Convert($pRootOfTree)
    {
        if ($pRootOfTree == NULL) return [];

        $list = new \SplDoublyLinkedList();

        $res = $this->recursive($pRootOfTree,$list);
        print_r($res);


    }

    function recursive($root, &$list)
    {

        $list->push($root);
        if ($root->left != NULL) $this->recursive($root->left, $list);
    }
}
