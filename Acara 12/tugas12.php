<?php
// Abstract class Person
abstract class Person {
    abstract public function greet();
}

// Class English
class English extends Person {
    public function greet() {
        echo "Hello\n";
    }
}

// Class German
class German extends Person {
    public function greet() {
        echo "Hallo\n";
    }
}

// Class French
class French extends Person {
    public function greet() {
        echo "Bonjour\n";
    }
}

// Contoh penggunaan polymorphism
$people = [
    new English(""),
    new German(""),
    new French("")
];

foreach ($people as $person) {
    $person->greet();
}
?>
