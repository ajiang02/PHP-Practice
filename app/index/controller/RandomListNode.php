<?php


namespace app\index\controller;


class RandomListNode
{
    var $label;
    var $next = NULL;
    var $random = NULL;

    public function __construct($val){
        $this->label = $val;
    }

}
