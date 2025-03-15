<?php

declare(strict_types=1);

namespace Maxwellzp\EnglishIrregularVerbs\DataProvider;

use Maxwellzp\EnglishIrregularVerbs\Model\IrregularVerb;

class CsvDataProvider
{
    public function __construct(private readonly string $filePath)
    {
        if (!file_exists($this->filePath) || !is_readable($this->filePath)) {
            throw new \Exception("File does not exist or is not readable");
        }
    }

    /**
     * @return array
     */
    private function readFile(): array
    {
        $content = [];
        if (($open = fopen($this->filePath, "r")) !== false) {
            while (($data = fgetcsv($open, null, ",")) !== false) {
                $content[] = $data;
            }

            fclose($open);
        }
        return $content;
    }

    /**
     * @return IrregularVerb[]
     */
    public function getAll(): array
    {
        return array_map(
            function ($item) {

                return new IrregularVerb(
                    $item[0],
                    $item[1],
                    $item[2]
                );
            },
            self::readFile()
        );
    }
}
