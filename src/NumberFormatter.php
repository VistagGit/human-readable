<?php

namespace Vistag\HumanReadable;


class NumberFormatter implements Readable
{
	protected $delimiter;


    public function __construct($value)
    {
    	$this->value = $value;
    }

    public function setDelimiter($delimiter)
    {
        $this->delimiter = $delimiter;
    }

    public function raw()
    {
    	return (string) $this->value;
    }

    public function short()
    {
        $value = $this->value;

        if ($value < 1000) {
            return $this->raw();
        }

        if ($value < 10000) {
            $temp = floor($value/100);
            return $this->round($temp/10, 1) . 'k';
        }

        if ($value < 1000000) {
            return floor($value/1000) . 'k';
        }

        if ($value < 10000000) {
            $temp = floor($value/100000);
            return $this->round($temp/10, 1) . 'M';
        }

        return floor($value/1000000) . 'M';
    }

    public function long()
    {
        $value = $this->value;

        if ($value < 1000) {
            return $this->raw();
        }

        if ($value < 10000) {
            $temp = floor($value/10);
            return $this->round($temp/100, 2) . 'k';
        }

        if ($value < 1000000) {
            $temp = floor($value/10);
            return $this->round($temp/100, 2) . 'k';
        }

        if ($value < 10000000) {
            $temp = floor($value/10000);
            return $this->round($temp/100, 2) . 'M';
        }

        $temp = floor($value/100000);
        return $this->round($temp/10, 1) . 'M';
    }

    protected function round($value, $decimals)
    {
        $value = round($value, $decimals);

        return $this->delimiter !== '.' ? str_replace('.', ',', $value) : $value;
    }
}