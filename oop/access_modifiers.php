<?php


class access
{
    private $num1;
    private $num2;

    public function multiply()
    {
        return $this->num1 * $this->num2;
    }
}

class drived extends access
{
    public function addition()
    {
        return $this->num1 + $this->num2;
    }
}


$ac = new access();
$ac->num1 = 50;
$ac->num2 = 100;
