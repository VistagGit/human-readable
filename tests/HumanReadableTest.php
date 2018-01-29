<?php
namespace Vistag\HumanReadable\Tests;

use PHPUnit\Framework\TestCase;
use Vistag\HumanReadable\ReadableNumber;
use Vistag\HumanReadable\ReadableSeconds;


final class HumanReadableTest extends TestCase
{
    /**
     * @dataProvider secondsProvider
     */
     public function testSeconds($input, $short, $long)
     {
         $time = new ReadableSeconds($input);
         $this->assertEquals($input, $time->raw());
         $this->assertEquals($short, $time->short());
         $this->assertEquals($long, $time->long());
     }

    /**
     * @dataProvider secondsProvider
     */
    public function testSecondsComma($input, $short, $long)
    {
        $time = new ReadableSeconds($input, ',');
        $this->assertEquals($input, $time->raw());
        $this->assertEquals(str_replace('.', ',', $short), $time->short());
        $this->assertEquals(str_replace('.', ',', $long), $time->long());
    }

    /**
     * @dataProvider numbersProvider
     */
    public function testNumbers($input, $short, $long)
    {
        $number = new ReadableNumber($input);
        $this->assertEquals($input, $number->raw());
        $this->assertEquals($short, $number->short());
        $this->assertEquals($long, $number->long());
    }

    /**
     * @dataProvider numbersProvider
     */
    public function testNumbersComma($input, $short, $long)
    {
        $number = new ReadableNumber($input, ',');
        $this->assertEquals($input, $number->raw());
        $this->assertEquals(str_replace('.', ',', $short), $number->short());
        $this->assertEquals(str_replace('.', ',', $long), $number->long());
    }

    public function secondsProvider()
    {
        return $this->addDataKeys([
            [11, '11s', '11s'],
            [55, '55s', '55s'],
            [99, '99s', '1m 39s'],
            [110, '110s', '1m 50s'],
            [550, '550s', '9m 10s'],
            [990, '990s', '16m 30s'],
            [1010, '16m', '16m 50s'],
            [1111, '18m', '18m 31s'],
            [1515, '25m', '25m 15s'],
            [3333, '55m', '55m 33s'],
            [9090, '151m', '2h 31m'],
            [10100, '168m', '2h 48m'],
            [11000, '183m', '3h 3m'],
            [22000, '366m', '6h 6m'],
            [29940, '499m', '8h 19m'],
            [30000, '500m', '8h 20m'],
            [44000, '733m', '12.2h'],
            [50500, '841m', '14h'],
            [59940, '999m', '16.6h'],
            [99500, '27h', '27.6h'],
            [155500, '43h', '43.1h'],
            [999900, '277h', '277h'],
            [1999900, '555h', '555h'],
            [5999900, '1666h', '1666h'],
        ]);
    }

    public function numbersProvider()
    {
        return $this->addDataKeys([
            [11, '11', '11'],
            [55, '55', '55'],
            [99, '99', '99'],
            [110, '110', '110'],
            [550, '550', '550'],
            [990, '990', '990'],
            [1010, '1k', '1.01k'],
            [1111, '1.1k', '1.11k'],
            [1191, '1.1k', '1.19k'],
            [1515, '1.5k', '1.51k'],
            [3333, '3.3k', '3.33k'],
            [9090, '9k', '9.09k'],
            [10100, '10k', '10.1k'],
            [11000, '11k', '11k'],
            [50550, '50k', '50.55k'],
            [99500, '99k', '99.5k'],
            [155550, '155k', '155.55k'],
            [999900, '999k', '999.9k'],
            [1999900, '1.9M', '1.99M'],
            [5999900, '5.9M', '5.99M'],
            [9999900, '9.9M', '9.99M'],
            [19999900, '19M', '19.9M'],
            [199550000, '199M', '199.5M'],
            [199999900, '199M', '199.9M'],
        ]);
    }

    public function addDataKeys($data)
    {
        $response = [];

        foreach ($data as $record) {
            $response[(string) $record[0]] = $record;
        }

        return $response;
    }
}