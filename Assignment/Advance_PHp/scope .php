<?php

// Question:
// Create a class with static properties and methods, and demonstrate their access using the scope resolution operator.

// Class with static property and method
class Counter
{
    // static property
    public static $count = 0;

    // static method to increase count
    public static function increment()
    {
        self::$count++;
    }

    // static method to display count
    public static function showCount()
    {
        echo "Count is: " . self::$count . "<br>";
    }
}

// accessing static property and methods using scope resolution operator (::)

// initial value
Counter::showCount();

// increasing count
Counter::increment();
Counter::increment();
Counter::increment();

// showing updated value
Counter::showCount();

?>