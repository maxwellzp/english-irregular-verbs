<?php

namespace Maxwellzp\EnglishIrregularVerbs\Model;

class IrregularVerb
{
    public function __construct(
        private string $baseForm,
        private string $pastSimple,
        private string $pastParticiple,
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

