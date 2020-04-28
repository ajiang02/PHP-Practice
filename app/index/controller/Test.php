<?php

namespace app\index\controller;

use PHPUnit\Framework\TestCase;


class Test extends TestCase
{


    public function test()
    {
      //$sequence = [4,8,6,12,16,14,10];
      $sequence = [4,6,7,5];
      $res = $this->VerifySquenceOfBST($sequence);
      $this->assertEquals(true,$res);
    }


    public function recur($sequence,$i,$j)
    {
        if($i >= $j) return true;
        $p = $i;
        while($sequence[$p] < $sequence[$j]) $p++;
        $m = $p;
        while($sequence[$p] > $sequence[$j]) $p++;
        return $p == $j && $this->recur($sequence, $i, $m - 1) && $this->recur($sequence, $m, $j - 1);

    }



}
