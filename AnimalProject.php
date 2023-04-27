<?php
require 'lib/general.php';
require "lib/animal.php";
require "lib/animals.php";

use Lib\General;

if (isset($argv[1])) {
    switch ($argv[1]) {
        case '--help':
            $helpText = "\e[31mUsage:\e[0m\n";
            $helpText.= "´php AnimalProject.php [name] [animal_type]´\n\n";
            $helpText.= "\e[31mConfiguration:\e[0m\n";
            $helpText.= "\e[90mConfigure a new animal type with it's sound:\e[0m\n";
            $helpText.= "´php AnimalProject.php --config <animal_type> <sound>´\n";
            $helpText.= "\e[90mConfigure multiple animal types with their sounds:\e[0m\n";
            $helpText.= "´php AnimalProject.php --config <animal_type> <sound>´\n";

            General\General::dd($helpText);
            break;
        case '--config':
            if( isset($argv[2]) && isset($argv[3])) {
                $type = $argv[2];
                $sound = $argv[3];
                $animal = new DynamicAnimal('new',$type);
                $animal->setNew($type,$sound);
                General\General::dd("Animal '$type' configured with the sound '$sound'");
            }
            General\General::dd('Usage: ´php AnimalProject.php --config <animal_type> <sound>´');
            break;
        case '--config-multi':
            if( isset($argv[2]) && isset($argv[3])) {
                $typeMulti = $argv[2];
                $soundMulti = $argv[3];
                $animal = new DynamicAnimal('new',$typeMulti);
                $animal->setNewMulti($typeMulti,$soundMulti);
                General\General::dd("Animals configured");
            }
            General\General::dd('Usage: ´php AnimalProject.php --config-multi <animal_type1>,<animal_type2>,<animal_typeN> <sound1>,<sound2>,<soundN>´');
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
    $animal = new DynamicAnimal($name, $type);
}

try {
    echo $animal->speak()."\n";
} catch (Exception $e) {
    echo $e->getMessage()."\n";
    General\General::dd("Use php AnimalProject.php '--config' OR '--config-multi' to configure new animals.");
}
