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
<?php

require __DIR__ . '/vendor/autoload.php';

use Maxwellzp\EnglishIrregularVerbs\DataProvider\CsvDataProvider;
use Maxwellzp\EnglishIrregularVerbs\Repository\IrregularVerbRepository;

$dataProvider = new CsvDataProvider(__DIR__ . '/data/irregular_verbs.csv');
$repository = new IrregularVerbRepository($dataProvider);

$verbs = $repository->getRandomSet(5);

```

## Running Tests

To run tests, run the following command

```bash
composer test
```


## License

[MIT](https://choosealicense.com/licenses/mit/)

