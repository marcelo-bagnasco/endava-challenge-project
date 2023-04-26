<?php
require 'lib/general.php';
require "lib/animal.php";
require "lib/animals.php";

use Lib\General;

if (isset($argv[1]) && $argv[1] == '--help') {
    General\General::dd('Usage: ´php AnimalProject.php <name> <animal_type>´');
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
    echo $animal->speak();
} catch (Exception $e) {
    General\General::dd($e->getMessage());
}
