<?php


namespace app\index\controller;


class TreeNode
{
    var $val;
    var $left = NULL;
    var $right = NULL;

    public function __construct($val){
        $this->val = $val;
    }

}