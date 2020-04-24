<?php


namespace app\prototype\controller;


class WorkExperience
{
    private $date;
    private $company;

    public function __construct($date, $company)
    {
        $this->date = $date;
        $this->company = $company;
    }

    public function getDate()
    {
        return  $this->date;
    }

    public function __set($date, $company)
    {
        $this->date = $date;
        $this->company = $company;
    }

    /*public function __clone()
    {
        return clone $this;
    }*/
}