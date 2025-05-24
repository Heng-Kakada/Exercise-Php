<?php

class Person
{
    public string $name;
    public function hello(): void
    {
        echo "Hello by $this->name";
    }
}

$p1 = new Person();
$p1->name = "John";
$p1->hello();


