<?php

namespace app\index\controller;

use PHPUnit\Framework\TestCase;


class Test extends TestCase
{
    public function test()
    {
        $input = [4, 5, 1, 6, 2, 7, 3, 8];

       // $res = $this->getLeastNumbers($input, 4);
        $res = $this->GetLeastNumbers_Solution($input, 4);
      $this->assertEquals([1,2,3,4],$res);
    }


    function getLeastNumbers($arr, $k) {
        if($k==0) return [];

        $queue=new \SplPriorityQueue();

        foreach($arr as $key=>$val){
            if($queue->count()<$k){
                $queue->insert($key,$val);
            }else if($val<$arr[$queue->top()]){
                $queue->extract();
                $queue->insert($key,$val);
            }
        }

        $ret=[];
        while(!$queue->isEmpty()){
            $ret[]=$arr[$queue->extract()];
        }

        return $ret;
    }




    public function GetLeastNumbers_Solution($input,$k)
    {
        if (count($input) < $k) return [];

        $queue = new \SplPriorityQueue();

        foreach ($input as $key => $val) {

            if ($queue->count() < $k) {               // 前k个直接插入
                $queue->insert($key,$val);            // 节点的键为$key，优先值为$val
            } elseif ($input[$queue->top()] > $val) { // 如果堆顶 > 元素值，则删去堆顶，再添加新节点
                $queue->extract();
                $queue->insert($key,$val);
            }
        }

        $res = [];
        while (!$queue->isEmpty()) {
            $res[] = $input[$queue->extract()];
        }

        return $res;
    }
  


}
