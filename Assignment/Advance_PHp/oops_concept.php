<?php

// Question:
// Develop a mini project (Library Management System) that utilizes all OOP concepts
// like classes, inheritance, interfaces, magic methods, etc.

// ================= INTERFACE =================
interface LibraryActions
{
    public function addBook($title, $author);
    public function showBooks();
}

// ================= BASE CLASS =================
class Library
{
    // encapsulation (private property)
    private $libraryName;
    protected $books = [];

    // constructor (initialization)
    public function __construct($name)
    {
        $this->libraryName = $name;
    }

    // getter using magic method concept
    public function getLibraryName()
    {
        return $this->libraryName;
    }

    // destructor (cleanup message)
    public function __destruct()
    {
        echo "<br>Library system closed for " . $this->libraryName;
    }
}

// ================= CHILD CLASS =================
class BookManager extends Library implements LibraryActions
{
    // adding book (polymorphism via interface)
    public function addBook($title, $author)
    {
        $this->books[] = [
            "title" => $title,
            "author" => $author
        ];
    }

    // showing books
    public function showBooks()
    {
        echo "Library: " . $this->getLibraryName() . "<br>";
        echo "Book List:<br>";

        foreach ($this->books as $book) {
            echo "Title: " . $book['title'] . " | Author: " . $book['author'] . "<br>";
        }
    }

    // magic method (__get) for dynamic property access
    public function __get($name)
    {
        return "Property '$name' not found!";
    }

    // magic method (__set) for dynamic property assignment
    public function __set($name, $value)
    {
        $this->$name = $value;
    }
}

// ================= OBJECT CREATION =================
$lib = new BookManager("City Library");

// adding books
$lib->addBook("PHP Basics", "John Doe");
$lib->addBook("OOP in PHP", "Jane Smith");

// showing books
$lib->showBooks();

// using magic methods
echo "<br>";
echo $lib->unknownProperty; // triggers __get()

?>