<?php


namespace app\templatemethod\controller;


/**
 * Class questionsA 具体模板，实现抽象模板的逻辑
 * @package app\TempalatMethod\controller
 */
class QuestionsA extends AbstractTemplate
{
    public $one;
    public $two;

    /**
     * 最终试卷显示
     */
    public function submit()
    {
        $this->questionOne();
        $this->questionTwo();
    }


    /**
     * 问题一
     */
    public function questionOne()
    {
        echo "Question one:'php是不是世界上最好的语言？'</br>";
        echo $this->answerOne($this->one);
    }


    /**
     * 问题二
     */
    public function questionTwo()
    {
        echo "Question two:'php常用的框架是什么？'</br>";
        echo $this->answerTwo($this->two);
    }


    /**
     * @param $one     考试（测试）时，填写答案
     * @return string
     */
    public function answerOne($one)
    {
        $this->one = $one . "</br>";
        return $this->one;
    }


    /**
     * @param $two    考试（测试）时，填写答案
     * @return string
     */
    public function answerTwo($two)
    {
        $this->two = $two . "</br>";
        return $this->two;
    }
}