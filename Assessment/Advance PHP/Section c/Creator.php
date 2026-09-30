

<?php

class Creator
{
    public $name;
    public $bio;
    public $category;

    public function __construct($name, $bio, $category)
    {
        $this->name = $name;
        $this->bio = $bio;
        $this->category = $category;
    }

    public function render()
    {
        echo "<h2>" . htmlspecialchars($this->name) . "</h2>";
        echo "<p><b>Category:</b> " . htmlspecialchars($this->category) . "</p>";
        echo "<p><b>Bio:</b> " . htmlspecialchars($this->bio) . "</p>";
    }
}

?>