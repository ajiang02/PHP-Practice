<?php

namespace app\templatemethod\controller;


class QuestionsATest
{
    public function test()
    {
        $q = new QuestionsA();

        // 问题一的答案
        $q->answerOne("各有千秋");

        // 问题二的答案
        $q->answerTwo('tp5 yii larvel');

        // 试卷显示
        $q->submit();

        // 复制一份试卷，缺点是:$q答案还在
        $q1 = clone $q;
        $q1->answerOne("c语言是语言之父");
        $q1->submit();

        // 新的一份试卷，可以
        $q2 = new QuestionsA();
        $q2->answerTwo("原生框架算不算");
        $q2->submit();

    }
}
