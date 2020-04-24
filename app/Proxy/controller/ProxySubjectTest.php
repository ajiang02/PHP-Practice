<?php

namespace app\Proxy\controller;

use PHPUnit\Framework\TestCase;

class ProxySubjectTest extends TestCase
{
    public function test()
    {
        $proxy = new ProxySubject();

        $proxy->action();
    }
}
