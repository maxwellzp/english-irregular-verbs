<?php

namespace Maxwellzp\EnglishIrregularVerbs\Tests\Unit\DataProvider;

use Maxwellzp\EnglishIrregularVerbs\DataProvider\CsvDataProvider;
use PHPUnit\Framework\TestCase;

class CsvDataProviderTest extends TestCase
{
    public function testFileDoesNotExistAndExceptionThrown(): void
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('File does not exist or is not readable');
        new CsvDataProvider('data.csv');
    }

    public function testFileExistAndNoException(): void
    {
        $filePath = __DIR__ . '/../../../data/irregular_verbs.csv';
        $provider = new CsvDataProvider($filePath);
        $this->assertInstanceOf(CsvDataProvider::class, $provider);
    }

    public function testGetAllReturnsNotEmptyArray(): void
    {
        $filePath = __DIR__ . '/../../../data/irregular_verbs.csv';
        $provider = new CsvDataProvider($filePath);
        $data = $provider->getAll();
        $this->assertIsArray($data);
        $this->assertNotEmpty($data);
    }
}