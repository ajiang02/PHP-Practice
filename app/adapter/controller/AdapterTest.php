<?php


namespace app\adapter\controller;


class AdapterTest
{
    public function test()
    {
        $charger = new ChargerAdapter(new DomesticCharger());

        $charger->charge();

    }
}