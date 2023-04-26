<?php

class Dog extends Animal
{
    public function __construct($name)
    {
        parent::__construct($name, 'dog');
        $this->sound = 'woof';
    }
}

class Cat extends Animal
{
    public function __construct($name)
    {
        parent::__construct($name, 'cat');
        $this->sound = 'meow';
    }
}


class Cow extends Animal
{
    public function __construct($name)
    {
        parent::__construct($name, 'cow');
        $this->sound = 'moo';
    }
}

class Unicorn extends Animal
{
    public function __construct($name)
    {
        parent::__construct($name, 'unicorn');
    }

    public function speak(): string
    {
        return "Unicorns are not real";
    }
}