<?php

namespace app\factory\controller;

/**
 * Class CatBlack 具体产品：黑猫
 * @package app\factory\controller
 */
class CatBlack extends CatAbstract
{
    public function color()
    {
        return "黑猫黑不黑";
    }

    public function voice()
    {
        return "喵喵喵";
    }

}