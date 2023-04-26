<?php
require 'lib/general.php';
require "lib/animal.php";
require "lib/animals.php";

use PHPUnit\Framework\TestCase;

class AnimalTest extends TestCase
{

    public function testConstruct()
    {
        $animal = new Animal('Marcelo','dog');
        $this->assertSame('Marcelo',$animal->getName());
        $this->assertSame('dog', $animal->getType());
    }

    public function testSpeak()
    {
        $animal = new Animal('Marcelo','dog');
        $animal->setSound('wow');
        $this->assertSame('Marcelo says wow',$animal->speak());
    }

    public function testDog()
    {
        $dog = new Dog('Marcelo');
        $this->assertSame('Marcelo says woof',$dog->speak());
    }

    public function testCat()
    {
        $cat = new Cat('Marcelo');
        $this->assertSame('Marcelo says meow',$cat->speak());
    }

    public function testCow()
    {
        $cow = new Cow('Marcelo');
        $this->assertSame('Marcelo says moo',$cow->speak());
    }

    public function testUnicorn()
    {
        $u = new Unicorn('Marcelo');
        $this->assertSame('Unicorns are not real',$u->speak());
    }

}
