<?php

declare(strict_types=1);

namespace Maxwellzp\EnglishIrregularVerbs\DataProvider;

use Maxwellzp\EnglishIrregularVerbs\Model\IrregularVerb;
use RuntimeException;

class CsvDataProvider
{
    public function __construct(
        private readonly string $filePath,
        private readonly string $delimiter = ','
    ) {
        if (!is_readable($this->filePath)) {
            throw new RuntimeException("CSV file does not exist or is not readable: {$this->filePath}");
        }
    }

    /**
     * @return string[][]
     */
    private function readFile(): array
    {
        $content = [];

        if (($handle = fopen($this->filePath, 'r')) !== false) {
            while (($data = fgetcsv($handle, 0, $this->delimiter)) !== false) {
                if (count($data) >= 3) {
                    $content[] = $data;
                }
            }
            fclose($handle);
        }

        return $content;
    }

    /**
     * @return IrregularVerb[]
     */
    public function getAll(): array
    {
        return array_map(
            fn(array $row): IrregularVerb => new IrregularVerb($row[0], $row[1], $row[2]),
            $this->readFile()
        );
    }
}
