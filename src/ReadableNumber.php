<?php

namespace Vistag\HumanReadable;


class ReadableNumber extends HumanReadable
{
    public function __construct($input, $delimiter = '.')
    {
        $this->formatter = new NumberFormatter($input);
        $this->formatter->setDelimiter($delimiter);
    }
}
