<?php

namespace app\prototype\controller;

use app\Proxy\controller\RealSubject;
use PHPUnit\Framework\TestCase;

class ResumeTest extends TestCase
{
    public function copyResume()
    {
        $resumeA = new Resume('ajiang', 'F');
        $resumeA->setWork('2019-07-22', 'gipex');
//        halt($resumeA);

        $resumeB = clone $resumeA;
        $resumeB->setWork('2016-05-24', 'aCli');

        $resumeC = clone $resumeA;
        $resumeC->setWork('2014-04-09', 'Kalopo');

    }
}
