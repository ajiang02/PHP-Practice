<?php

namespace app\factory\controller;

/**
 * Class CatWhite
 * @package app\factory\controller
 */
class CatWhite extends CatAbstract
{
    public function color()
    {
        static $i = 0;
        return "白猫白不白" . $i++ . "</br>";
    }

    public function voice()
    {
        return "喵喵喵</br>";
    }

}