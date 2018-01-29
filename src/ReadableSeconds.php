<?php

namespace Vistag\HumanReadable;


class ReadableSeconds extends HumanReadable
{
    public function __construct($input, $delimiter = '.')
    {
        $this->formatter = new SecondsFormatter($input);
        $this->formatter->setDelimiter($delimiter);
    }
}