<?php

use Lib\General\General;

class Animal
{
    protected $name;
    protected $sound;
    protected $type;

    public function __construct($name,$type)
    {
        $this->name = $name;
        $this->type = $type;
    }

    public function speak()
    {
        try {
            $str = $this->name . " says " . $this->getSound();
            General::dd($str);
        } catch (\Exception $e) {
            throw $e;
        }
    }

    private function getSound()
    {
        if ($this->sound) {
            return $this->sound;
        } else {
            throw new \Exception("I don't know which animal is a " . $this->type);
        }
    }
}