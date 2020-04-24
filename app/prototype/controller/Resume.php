<?php


namespace app\prototype\controller;


class Resume
{
    private $name;
    private $sex;
    private $workExperience;

    public function __construct($name, $sex)
    {
        $this->name = $name;
        $this->sex = $sex;

    }

    public function setWork($date, $company)
    {
        $this->workExperience = new WorkExperience($date, $company);
    }


    public function __clone()
    {
        return $this;
    }
}