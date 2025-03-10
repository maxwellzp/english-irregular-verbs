<?php

use Maxwellzp\EnglishIrregularVerbs\Factory\IrregularVerbFactory;

require_once 'vendor/autoload.php';

$factory = new IrregularVerbFactory();

$irregularVerbs = $factory->getAll();
var_dump($irregularVerbs);

$v = $factory->getRandomOne();
var_dump($v);

