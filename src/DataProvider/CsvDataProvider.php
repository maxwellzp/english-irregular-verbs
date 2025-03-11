<?php

namespace Maxwellzp\EnglishIrregularVerbs\DataProvider;

use Maxwellzp\EnglishIrregularVerbs\Model\IrregularVerb;

class CsvDataProvider
{
    const FILE_PATH = __DIR__ . '/../../' . '/data/irregular_verbs.csv';

    /**
     * @return array
     */
    private static function readFile(): array
    {
        $content = [];
        if (($open = fopen(self::FILE_PATH, "r")) !== false) {
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
    public static function getAll(): array
    {
        return array_map(
            function ($item) {

                return new IrregularVerb(
                    $item[0],
                    $item[1],
                    $item[2]
                );

            }, self::readFile()
        );
    }
}