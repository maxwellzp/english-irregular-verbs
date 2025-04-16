<?php

declare(strict_types=1);

namespace Maxwellzp\EnglishIrregularVerbs\Tests\Unit\DataProvider;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use Maxwellzp\EnglishIrregularVerbs\DataProvider\CsvDataProvider;
use Maxwellzp\EnglishIrregularVerbs\Model\IrregularVerb;
use RuntimeException;

#[CoversClass(CsvDataProvider::class)]
class CsvDataProviderTest extends TestCase
{
    private string $testFile;

    protected function setUp(): void
    {
        $this->testFile = __DIR__ . '/../../fixtures/test_verbs.csv';

        file_put_contents($this->testFile, <<<CSV
go,went,gone
run,ran,run
CSV);
    }
    public function testGetAllReturnsCorrectObjects(): void
    {
        $provider = new CsvDataProvider($this->testFile);
        $verbs = $provider->getAll();

        $this->assertCount(2, $verbs);
        $this->assertInstanceOf(IrregularVerb::class, $verbs[0]);
        $this->assertEquals('go', $verbs[0]->getBaseForm());
        $this->assertEquals('ran', $verbs[1]->getPastSimple());
    }

    public function testThrowsExceptionWhenFileNotReadable(): void
    {
        $this->expectException(RuntimeException::class);
        new CsvDataProvider('/invalid/path.csv');
    }

    protected function tearDown(): void
    {
        @unlink($this->testFile);
    }
}
