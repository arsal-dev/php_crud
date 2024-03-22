<?php


class calculation
{
    // properties
    public $a;
    public $b;
    public $c;


    public function __construct($num1 = 0, $num2 = 0)
    {
        $this->a = $num1;
        $this->b = $num2;
    }

    // methods
    public function multiply()
    {
        return $this->c = $this->a * $this->b;
    }

    public function addition()
    {
        return $this->c = $this->a + $this->b;
    }
}


$cal = new calculation(100, 200);
$cal1 = new calculation(1300, 22300);
$cal2 = new calculation(23100, 20230);
$cal3 = new calculation(102230, 203240);
$cal4 = new calculation(123400, 202340);
$cal5 = new calculation(123400, 202340);

echo $cal2->multiply();
