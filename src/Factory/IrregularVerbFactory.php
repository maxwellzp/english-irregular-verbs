<?php

declare(strict_types=1);

namespace Maxwellzp\EnglishIrregularVerbs\Factory;

use Maxwellzp\EnglishIrregularVerbs\DataProvider\CsvDataProvider;
use Maxwellzp\EnglishIrregularVerbs\Model\IrregularVerb;

class IrregularVerbFactory
{
    private array $verbs = [];
    private readonly CsvDataProvider $csvDataProvider;

    public function __construct()
    {
        $this->csvDataProvider = new CsvDataProvider(__DIR__ . '/../../' . '/data/irregular_verbs.csv');
        $this->verbs = $this->csvDataProvider->getAll();
    }

    /**
     * @return array
     */
    public function getAllVerbs(): array
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

    /**
     * @param int $num
     * @return array
     * @throws \Exception
     */
    public function getRandomSet(int $num): array
    {
        if ($num < 2 || $num > count($this->verbs)) {
            throw new \Exception(
                sprintf("The value of \$num variable must be between %d and %d", 2, count($this->verbs))
            );
        }
        return array_map(
            function ($id) {
                return $this->verbs[$id];
            },
            array_rand($this->verbs, $num)
        );
    }
}
