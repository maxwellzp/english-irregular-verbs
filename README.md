# CLI irregular verbs

PHP OOP wrapper for English irregular verbs

## Requirements
* PHP 8.0 or higher

## Installation
* Run the command below inside your PHP project
```bash
composer require maxwellzp/english-irregular-verbs
```


## Usage
```PHP
use Maxwellzp\EnglishIrregularVerbs\Factory\IrregularVerbFactory;

require_once 'vendor/autoload.php';

$factory = new IrregularVerbFactory();
$irregularVerbs = $factory->getAllVerbs();
```

## Running Tests

To run tests, run the following command

```bash
composer test
```


## License

[MIT](https://choosealicense.com/licenses/mit/)

