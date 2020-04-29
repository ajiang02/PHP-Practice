<?php

namespace app\index\controller;

use PHPUnit\Framework\TestCase;


class Test extends TestCase
{

    public function test()
    {
        $pHead = new RandomListNode(7);
        $node1 = new RandomListNode(13);
        $node2 = new RandomListNode(11);
        $node3 = new RandomListNode(10);
        $node4 = new RandomListNode(1);

        $pHead->next = $node1;
        $node1->next = $node2;
        $node2->next = $node3;
        $node3->next = $node4;

        $pHead->random = null;
        $node1->random = $pHead;
        $node2->random = $node4;
        $node3->random = $node2;
        $node4->random = $pHead;


        $this->MyClone($pHead);

    }

    function MyClone($pHead)
    {
        $p = $pHead;  // $p 是指针节点，遍历链表用的

        // 在每一个原节点的后面插入一个新的复制节点。
        while ($p != NULL) {
            $newNode = new RandomListNode($p->label);   // 实例一个新的复制节点
            $newNode->next = $p->next;   // 复制节点的下一个节点指向 $p 的下一个节点
            $p->next = $newNode;   // $p 的下一个节点指向复制节点
            $p = $newNode->next;   // 指针节点移到复制节点的下一个节点

        }

        $p = $pHead; // 重新指向链表头

        // 给每个复制节点的随机指针 $random 赋值
        while ($p != NULL) {
            $newNode = $p->next;  // 原节点的下一节点是它的复制节点
            // 如果原节点 X 有随机指针指向 Y，则 X 的复制节点 X` 的随机指针指向 Y 的复制节点 Y`。
            if ($p->random != NULL) $newNode->random = $p->random->next;
            $p = $newNode->next;  // 移到下一个原节点
        }


        $p = $pHead; // 重新指向链表头
        $cloneHead = $p->next;   // 复制节点链表的链表头
        $cloneNode = NULL;

        // 将链表拆分成：原节点链表、复制节点链表
        while ($p != NULL) {
            $cloneNode = $p->next;  // 移到复制节点
            $p->next = $cloneNode->next;  // 移到下一个原节点
            
        }

        return $cloneHead;
    }



}
