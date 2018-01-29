<?php

namespace Vistag\HumanReadable;

class SecondsFormatter implements Readable
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
            return $this->raw() . 's';
        }

        if ($value < 60000) {
            return floor($value/60) . 'm';
        }

        return floor($value/3600) . 'h';
    }

    public function long()
    {
        $value = $this->value;

        if ($value < 60) {
            return $this->raw() . 's';
        }

        if ($value < 3600) {
            $temp = floor($value/60) . 'm';

            $reminder = $value % 60;
            if ($reminder > 0) {
                $temp .= ' ' . $reminder . 's';
            }
            return $temp;
        }

        if ($value < 36000) {
            $temp = floor($value/3600) . 'h';

            $reminder = $value % 3600;
            $minutes = floor($reminder/60);

            if ($minutes > 0) {
                $temp .= ' ' . $minutes . 'm';
            }

            return $temp;
        }

        if ($value < 360000) {
            $temp = floor($value/360);
            return $this->round($temp/10, 1) . 'h';
        }

        return floor($value/3600) . 'h';
    }

    protected function round($value, $decimals)
    {
        $value = round($value, $decimals);

        return $this->delimiter !== '.' ? str_replace('.', ',', $value) : $value;
    }
}