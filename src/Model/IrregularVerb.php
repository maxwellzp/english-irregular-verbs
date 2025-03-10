<?php

namespace Maxwellzp\EnglishIrregularVerbs\Model;

class IrregularVerb
{
    public function __construct(
        public string $baseForm,
        public string $pastSimple,
        public string $pastParticiple,
    )
    {
    }
}

