<?php

class calculation
{
    // properties
    public $a = 500;
    public $b = 100;
    public $c;


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


$cal = new calculation();

$cal->a = 10;
$cal->b = 20;

echo $cal->multiply();
echo '<br>';
echo $cal->addition();


echo '<br>';
echo "new object";
echo '<br>';

$cal2 = new calculation();

$cal2->a = 500;
$cal2->b = 200;

echo $cal2->multiply();
echo '<br>';
echo $cal2->addition();
