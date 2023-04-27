# ANIMAL PROJECT

A command-line application that accepts a name and an animal type and responds with an appropriate message from that animal. The application uses object inheritance for its implementation and supports at least the following animals:

- Cat (output: <name> says "meow")
- Dog (output: <name> says "woof")
- Cow (output: <name> says "moo")
- Unicorn (output: Unicorns are not real)

## Requirements

- PHP 7.4+ 
- Composer

## Installation

1. Clone this repository or download the source code.
2. Open a terminal window and navigate to the directory where the code is saved.
3. Run `composer install` to install de required dependencies.

## Usage

To use the application, run the following command in your terminal:

```
php AnimalProject.php <name> <animal_type>
```

Replace `<name>` and `<animal_type>` with the desired values.

Example:
```
php AnimalProject.php "Mr Pickles" cat
```

Output:
```
Mr Pickles says "meow"
```

Note: <name> must be sent between quotes if it has more than one word.

If you try to use a different animal type, the application will try with a dynamic animal previously loaded with the configuration commands. If the dynamic animal was not configured, an error message will be displayed.  

## Configuration

You can configure new animal types and sounds using the following commands:

### Configure a new animal type
```
php AnimalProject.php --config <animal_type> <sound>
```

Example:
```
php AnimalProject.php --config bird tweet
```

### Configure multiple animal types
```
php AnimalProject.php --config-multi <animal_type1>,<animal_type2>,<animal_typeN> <sound1>,<sound2>,<soundN>
```

Example:
```
php AnimalProject.php --config-multi bird,frog,sparrow tweet,croar,chirp
```

## Help

To display the help message, run the following command:

```
php AnimalProject.php --help
```

## Testing

To run the tests, execute the following command in the terminal:

```
./vendor/bin/phpunit tests
```

This will run all the tests located in the `tests` directory. If you want to run a specific test case, for example, the AnimalTest case, you can use the following command:

```
./vendor/bin/phpunit tests/AnimalTest.php
```
