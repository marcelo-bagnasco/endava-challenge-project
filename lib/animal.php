<?php

class Animal
{
    protected string $name;
    protected string $sound;
    protected string $type;
    protected string $resourcesPath;

    public function __construct($name, $type)
    {
        $this->name = $name;
        $this->type = $type;
        $this->resourcesPath = './resources/animals';
    }

    public function speak(): string
    {
        try {
            return $this->name . " says '" . $this->getSound() . "'";
        } catch (\Exception $e) {
            throw $e;
        }
    }

    private function getSound(): string
    {
        if (isset($this->sound)) {
            return $this->sound;
        } else {
            if( $sound = $this->getDynamicSound() ) {
                return $sound;
            }
            throw new \Exception("I don't know which animal is a '" . $this->type . "'");
        }
    }

    private function getDynamicSound(): bool|string
    {
        $animalFile = $this->resourcesPath.'/'.strtolower($this->type).'.al';
        if( file_exists($animalFile) ) {
            return file_get_contents($animalFile);
        }
        return false;
    }

    public function setNew($type,$sound)
    {
        $animalFile = $this->resourcesPath.'/'.strtolower($type).'.al';
        file_put_contents($animalFile,'');
        file_put_contents($animalFile,$sound);
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    public function setSound($sound)
    {
        $this->sound = $sound;
    }
}