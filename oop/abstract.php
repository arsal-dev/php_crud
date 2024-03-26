<?php


abstract class myClass
{
    public $num1 = 50;
    public $num2 = 100;

    abstract public function calculate();

    public function multiply()
    {
        return $this->num1 * $this->num2;
    }
}


class drived extends myClass
{
    public function calculate()
    {
        return $this->num1 + $this->num2;
    }
}

$mc = new drived();
echo $mc->multiply();
