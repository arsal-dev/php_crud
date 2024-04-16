<?php

interface a
{
    function hello();
}

interface b
{
    function bye();
}

class c implements a, b
{
    protected $a;
    protected $b;

    public function __construct($a, $b)
    {
        $this->a = $a;
        $this->b = $b;
    }


    public function hello()
    {
        return "hello $this->a";
    }

    public function bye()
    {
        return "bye! $this->b";
    }
}

$classC = new c('ali', 'ahmed');


echo $classC->bye();
