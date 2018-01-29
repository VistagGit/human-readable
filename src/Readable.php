<?php
namespace Vistag\HumanReadable;

interface Readable
{
	public function setDelimiter($delimiter);
	public function raw();
	public function short();
	public function long();
}