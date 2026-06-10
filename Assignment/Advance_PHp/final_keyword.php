<?php

// Question:
// Create a class marked as final and attempt to extend it to show the restriction.

// final class (cannot be inherited)
final class ParentClass
{
    public function show()
    {
        echo "This is Parent Class";
    }
}

// trying to extend final class (this will cause error)
// class ChildClass extends ParentClass
// {
//     public function display()
//     {
//         echo "This is Child Class";
//     }
// }

// creating object of final class
$obj = new ParentClass();
$obj->show();

?>