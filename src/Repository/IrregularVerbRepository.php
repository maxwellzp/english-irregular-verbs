<?php

declare(strict_types=1);

namespace Maxwellzp\EnglishIrregularVerbs\Repository;

use Maxwellzp\EnglishIrregularVerbs\DataProvider\CsvDataProvider;
use Maxwellzp\EnglishIrregularVerbs\Model\IrregularVerb;
use RuntimeException;

class IrregularVerbRepository
{
    /**
     * @var IrregularVerb[]
     */
    private readonly array $verbs;

    public function __construct(CsvDataProvider $dataProvider)
    {
        $this->verbs = $dataProvider->getAll();
    }

    /**
     * @return IrregularVerb[]
     */
    public function getAll(): array
    {
        return $this->verbs;
    }

    public function getRandom(): IrregularVerb
    {
        return $this->verbs[array_rand($this->verbs)];
    }

    /**
     * @param int $count
     * @return IrregularVerb[]
     */
    public function getRandomSet(int $count): array
    {
        $total = count($this->verbs);
        if ($count < 2 || $count > $total) {
            throw new RuntimeException("Requested count must be between 2 and {$total}");
        }

        $randomKeys = array_rand($this->verbs, $count);
        $randomKeys = is_array($randomKeys) ? $randomKeys : [$randomKeys];

        return array_map(fn($key) => $this->verbs[$key], $randomKeys);
    }
}
