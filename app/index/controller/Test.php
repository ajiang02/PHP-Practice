<?php

namespace app\index\controller;

use PHPUnit\Framework\TestCase;


class Test extends TestCase
{
    public function test()
    {


        //$data = [364, 637, 341, 406, 747, 995, 234, 971, 571, 219, 993, 407, 416, 366, 315, 301, 601, 650, 418, 355, 460, 505, 360, 965, 516, 648, 727, 667, 465, 849, 455, 181, 486, 149, 588, 233, 144, 174, 557, 67, 746, 550, 474, 162, 268, 142, 463, 221, 882, 576, 604, 739, 288, 569, 256, 936, 275, 401, 497, 82, 935, 983, 583, 523, 697, 478, 147, 795, 380, 973, 958, 115, 773, 870, 259, 655, 446, 863, 735, 784, 3, 671, 433, 630, 425, 930, 64, 266, 235, 187, 284, 665, 874, 80, 45, 848, 38, 811, 267, 575];
        $data = [8, 5, 7, 2];
        //$data = [8,7,6,5,4,3,2,1];
        $res = $this->InversePairs($data);
        echo $res;
    }

    function InversePairs(&$data)
    {

        if (count($data) < 2) return 0;

        $res = $this->comparator($data, 0, count($data) - 1);
        // $this->assertEquals(7, $res);
        return $res;

    }

    function comparator(&$data, $left, $right)
    {

        if ($left == $right) return 0;

        $mid = floor($left + ($right - $left) / 2);

        $leftPairs  = $this->comparator($data, $left, $mid);
        $rightPairs = $this->comparator($data, $mid + 1, $right);
        $crossPairs = $this->merge($data, $left, $mid, $right);

        return $leftPairs + $rightPairs + $crossPairs;
    }

    function merge(&$data, $left, $mid, $right)
    {
        $p1 = $left;
        $p2 = $mid + 1;

        $count = 0;
        $help  = [];
        while ($p1 <= $mid && $p2 <= $right) {
            if ($data[$p1] <= $data[$p2]) {
                $help[] = $data[$p1++];
            } else {
                // 计算逆序个数
                $count = $count + $mid - $p1 + 1;

                $help[] = $data[$p2++];
            }

        }

        while ($p1 <= $mid) {
            $help[] = $data[$p1++];
        }

        while ($p2 <= $right) {
            $help[] = $data[$p2++];
        }

        for ($i = 0, $len = count($help); $i < $len; $i++) {
            $data[$left + $i] = $help[$i];
        }
        return $count;
    }


}
