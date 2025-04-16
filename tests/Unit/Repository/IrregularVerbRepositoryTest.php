<?php

declare(strict_types=1);

namespace Maxwellzp\EnglishIrregularVerbs\Tests\Unit\Repository;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use Maxwellzp\EnglishIrregularVerbs\DataProvider\CsvDataProvider;
use Maxwellzp\EnglishIrregularVerbs\Repository\IrregularVerbRepository;
use Maxwellzp\EnglishIrregularVerbs\Model\IrregularVerb;
use RuntimeException;

#[CoversClass(IrregularVerbRepository::class)]
class IrregularVerbRepositoryTest extends TestCase
{
    private IrregularVerbRepository $repository;

    protected function setUp(): void
    {
        $file = __DIR__ . '/../../fixtures/test_verbs.csv';
        file_put_contents($file, <<<CSV
swim,swam,swum
begin,began,begun
CSV);
        $provider = new CsvDataProvider($file);
        $this->repository = new IrregularVerbRepository($provider);
    }

    public function testGetAllReturnsAllVerbs(): void
    {
        $verbs = $this->repository->getAll();
        $this->assertCount(2, $verbs);
        $this->assertInstanceOf(IrregularVerb::class, $verbs[0]);
    }

    public function testGetRandomReturnsSingleVerb(): void
    {
        $verb = $this->repository->getRandom();
        $this->assertInstanceOf(IrregularVerb::class, $verb);
    }

    public function testGetRandomSetReturnsCorrectCount(): void
    {
        $set = $this->repository->getRandomSet(2);
        $this->assertCount(2, $set);
        $this->assertContainsOnlyInstancesOf(IrregularVerb::class, $set);
    }

    public function testGetRandomSetThrowsWhenInvalid(): void
    {
        $this->expectException(RuntimeException::class);
        $this->repository->getRandomSet(100);
    }
}
