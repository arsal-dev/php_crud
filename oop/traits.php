<?php

trait addtition
{
    function add($a, $b)
    {
        return $a + $b;
    }
}

trait subtraction
{
    function add($a, $b)
    {
        return $a - $b;
    }
}



class A
{
    use addtition, subtraction;

    public function something()
    {
        return $this->add(5564, 787);
    }
}

class B
{
    use addtition;
}

class C
{
    use addtition;
}


$classA = new A;
$classA->add(50, 60);
