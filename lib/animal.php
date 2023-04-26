<?php

class Animal
{
    protected string $name;
    protected string $sound;
    protected string $type;

    public function __construct($name, $type)
    {
        $this->name = $name;
        $this->type = $type;
    }

    public function speak(): string
    {
        try {
            return $this->name . " says '" . $this->getSound() . "'";
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function getSound(): string
    {
        if (isset($this->sound)) {
            return $this->sound;
        } else {
            throw new \Exception("I don't know which animal is a '" . $this->type . "'");
        }
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