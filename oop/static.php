<?php


class myClass
{
    public static $num1 = 50;
    public static $num2 = 100;
    public $num3 = 50;


    private static function calculate()
    {
        return self::$num1 + self::$num2;
    }

    public static function minus()
    {
        return self::calculate();
    }
}

class drived extends myClass
{

    // public static $num1 = 500;


    public static function multiply()
    {
        return self::$num1 * parent::$num2;
    }
}

// $mc = new myClass();
// echo myClass::calculate();

// echo drived::multiply();

echo myClass::minus();
