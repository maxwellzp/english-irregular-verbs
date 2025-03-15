<?php

declare(strict_types=1);

namespace Maxwellzp\EnglishIrregularVerbs\Model;

class IrregularVerb
{
    public function __construct(
        private readonly string $baseForm,
        private readonly string $pastSimple,
        private readonly string $pastParticiple,
    ) {
    }

    public function getBaseForm(): string
    {
        return $this->baseForm;
    }

    public function getPastSimple(): string
    {
        return $this->pastSimple;
    }

    public function getPastParticiple(): string
    {
        return $this->pastParticiple;
    }
}
