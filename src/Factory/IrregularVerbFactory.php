<?php

namespace Maxwellzp\EnglishIrregularVerbs\Factory;

use Maxwellzp\EnglishIrregularVerbs\DataProvider\CsvDataProvider;
use Maxwellzp\EnglishIrregularVerbs\Model\IrregularVerb;

class IrregularVerbFactory
{
    private array $verbs = [];
    private readonly CsvDataProvider $csvDataProvider;

    public function __construct()
    {
        $this->csvDataProvider = new CsvDataProvider();
        $this->verbs = $this->csvDataProvider->getAll();
    }

    /**
     * @return array
     */
    public function getAll(): array
    {
        return $this->verbs;
    }

    /**
     * @return IrregularVerb
     */
    public function getRandomOne(): IrregularVerb
    {
        return $this->verbs[array_rand($this->verbs)];
    }
}