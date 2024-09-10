<?php
// Interface
interface Speakable {
    public function speak();
}

// Abstract class Animal
abstract class Animal {
    abstract public function sound();
}

// Dog class extends Animal and implements Speakable
class Dog extends Animal implements Speakable {
    public function sound() {
        echo "Bark\n";
    }
    
    public function speak() {
        echo "Dog says: Woof!\n";
    }
}

// Cat class extends Animal and implements Speakable
class Cat extends Animal implements Speakable {
    public function sound() {
        echo "Meow\n";
    }

    public function speak() {
        echo "Cat says: Meow!\n";
    }
}

// Cow class extends Animal and implements Speakable
class Cow extends Animal implements Speakable {
    public function sound() {
        echo "Moo\n";
    }

    public function speak() {
        echo "Cow says: Moo!\n";
    }
}

// Contoh penggunaan
$animals = [
    new Dog(),
    new Cat(),
    new Cow()
];

foreach ($animals as $animal) {
    $animal->sound();
    $animal->speak();
}
?>
