<?php

namespace Maxwellzp\EnglishIrregularVerbs\Factory;

use Maxwellzp\EnglishIrregularVerbs\DataProvider\CsvDataProvider;
use Maxwellzp\EnglishIrregularVerbs\Model\IrregularVerb;

class IrregularVerbFactory
{
    private array $verbs = [];
    public function __construct(
        private readonly CsvDataProvider $csvDataProvider,
    )
    {
        $this->verbs = $this->csvDataProvider->getAll();
    }

    public function getAll(): array {
        return $this->verbs;
    }

    public function getRandomOne(): IrregularVerb {
        return $this->verbs[array_rand($this->verbs)];
    }
}