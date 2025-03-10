<?php

use Maxwellzp\EnglishIrregularVerbs\DataProvider\CsvDataProvider;
use Maxwellzp\EnglishIrregularVerbs\Factory\IrregularVerbFactory;

require_once 'vendor/autoload.php';

$csvDataProvider = new CsvDataProvider();
$factory = new IrregularVerbFactory($csvDataProvider);

$irregularVerbs = $factory->getAll();
var_dump($irregularVerbs);

$v = $factory->getRandomOne();
var_dump($v);

