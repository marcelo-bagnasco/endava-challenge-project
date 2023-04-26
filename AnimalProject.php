<?php
require 'lib/general.php';
require "lib/animal.php";
require "lib/animals.php";

use Lib\General;

if (isset($argv[1])) {
    switch ($argv[1]) {
        case '--help':
            General\General::dd('Usage: ´php AnimalProject.php <name> <animal_type>´');
            break;
        case '--config':
            if( isset($argv[2]) && isset($argv[3])) {
                $type = $argv[2];
                $sound = $argv[3];
                $animal = new Animal('new',$type);
                $animal->setNew($type,$sound);
                General\General::dd("Animal '$type' configured with the sound '$sound'");
            }
            General\General::dd('Usage: ´php AnimalProject.php --config <animal_type> <sound>´');
            break;
    }
}

if ($argc < 3) {
    General\General::dd("Invalid usage. Use ´php AnimalProject.php --help´");
}

$name = ($argv[1] ?? false);
$type = ($argv[2] ?? false);

$className = ucfirst(strtolower($type));

if (class_exists($className)) {
    $animal = new $className($name);
} else {
    $animal = new Animal($name, $type);
}

try {
    echo $animal->speak()."\n";
} catch (Exception $e) {
    General\General::dd($e->getMessage());
}
