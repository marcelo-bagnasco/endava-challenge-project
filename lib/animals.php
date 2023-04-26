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

class DynamicAnimal extends Animal
{
    protected string $resourcesPath;

    public function __construct($name, $type)
    {
        parent::__construct($name, $type);
        $this->resourcesPath = './resources/animals';
    }

    public function getSound(): string
    {
        $animalFile = $this->resourcesPath.'/'.strtolower($this->type).'.al';
        if( file_exists($animalFile) ) {
            return file_get_contents($animalFile);
        }
        throw new \Exception("I don't know which animal is a '" . $this->type . "'");
    }

    public function setNew($type,$sound)
    {
        if( $type && $sound ) {
            $animalFile = $this->resourcesPath.'/'.strtolower($type).'.al';
            file_put_contents($animalFile,'');
            file_put_contents($animalFile,$sound);
        }
    }

    public function setNewMulti($types,$sounds)
    {
        $typesArray = explode(',',$types);
        $soundsArray = explode(',',$sounds);
        foreach ( $typesArray as $key => $type ) {
            $sound = $soundsArray[$key];
            $this->setNew($type,$sound);
        }
    }
}