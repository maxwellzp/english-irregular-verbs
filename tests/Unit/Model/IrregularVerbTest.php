<?php

namespace Maxwellzp\EnglishIrregularVerbs\Tests\Unit\Model;

use Maxwellzp\EnglishIrregularVerbs\Model\IrregularVerb;
use PHPUnit\Framework\TestCase;

class IrregularVerbTest extends TestCase
{
    public function testClassConstructorAndGetters(): void
    {
        $verb = new IrregularVerb('do', 'did', 'done');
        $this->assertSame('do', $verb->getBaseForm());
        $this->assertSame('did', $verb->getPastSimple());
        $this->assertSame('done', $verb->getPastParticiple());
    }
    public function testGettersReturnStringType(): void
    {
        $verb = new IrregularVerb('do', 'did', 'done');
        $this->assertIsString($verb->getBaseForm());
        $this->assertIsString($verb->getPastSimple());
        $this->assertIsString($verb->getPastParticiple());
    }
}
