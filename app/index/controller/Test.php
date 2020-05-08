<?php

namespace app\index\controller;

use PHPUnit\Framework\TestCase;


class Test extends TestCase
{
    public function test()
    {
        //$numbers = [1,2,3,2,4,2,5,2,3];
        //$numbers = [1,2,3,2,2,2,5,4,2];
        $numbers = [4, 2, 1, 4, 2];
        $res     = $this->MoreThanHalfNum_Solution($numbers);

        $this->assertEquals(0, $res);
    }


    function MoreThanHalfNum_Solution($numbers)
    {

        if (empty($numbers)) return;

        $length = count($numbers);

        $first = $numbers[0]; // 初始值
        $votes = 1;

        for ($i = 1; $i < $length; $i++) {

            $numbers[$i] == $first ?  $votes++ :  $votes--;


            if ($votes == 0) {

                    $first = $numbers[$i + 1];
                    $i     = $i + 1;
                    $votes = 1;

                    continue;

            }
        }

        $time = 0;
        foreach ($numbers as $k) {
            if ($k == $first) $time++;
        }

        return $time > ($length/2) ? $first : 0;




    }

    public function php_method($numbers)
    {
        $length = count($numbers);

        $count = array_count_values($numbers);

        foreach ($count as $k => $v) {
            if ($v > ($length/2)) return $k;

        }

        return 0;
    }

}
