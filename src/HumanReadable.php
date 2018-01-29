<?php

namespace Vistag\HumanReadable;


class HumanReadable
{
    protected $formatter;

    public function setFormatter(Readable $formatter, $delimiter)
    {
        $this->formatter = $formatter;
        $this->formatter->setDelimiter($delimiter);
    }

    public function raw()
    {
        return $this->formatter->raw();
    }

    public function short()
    {
        return $this->formatter->short();
    }

    public function long()
    {
        return $this->formatter->long();
    }
}