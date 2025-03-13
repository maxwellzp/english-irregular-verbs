<?php

namespace Maxwellzp\EnglishIrregularVerbs\Tests\Unit\Factory;

use Maxwellzp\EnglishIrregularVerbs\Factory\IrregularVerbFactory;
use Maxwellzp\EnglishIrregularVerbs\Model\IrregularVerb;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class IrregularVerbFactoryTest extends TestCase
{
    public function testGetAllVerbsReturnNotEmptyArray(): void
    {
        $factory = new IrregularVerbFactory();
        $verbs = $factory->getAllVerbs();
        $this->assertIsArray($verbs);
        $this->assertNotEmpty($verbs);
    }

    public function testRandomOneVerbReturnsOneVerbAndItIsNotNull(): void
    {
        $factory = new IrregularVerbFactory();
        $verb = $factory->getRandomOne();
        $this->assertInstanceOf(IrregularVerb::class, $verb);
    }

    #[DataProvider('sizeSetProvider')]
    public function testGetRandomSetReturnsArrayElements(int $num): void
    {
        $factory = new IrregularVerbFactory();
        $verbs = $factory->getRandomSet($num);
        $this->assertIsArray($verbs);
        $this->assertNotEmpty($verbs);
        $this->assertContainsOnlyInstancesOf(IrregularVerb::class, $verbs);
        $this->assertSame($num, count($verbs));
    }

    public function testGetRandomSetButItThrowsException(): void
    {
        $factory = new IrregularVerbFactory();

        $this->expectException(\Exception::class);
        $factory->getRandomSet(100000);
    }

    public static function sizeSetProvider(): \Generator
    {
        yield [2];
        yield [10];
        yield [50];
        yield [100];
        yield [189];
    }
}