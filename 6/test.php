<?php 

require 'vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use Advent\RepetitionCodeParser;

class TestRepetitionCodeParser extends TestCase {

    protected $repetitionCode;

    public function test_example()
    {
        $repetitionCode = [
            'eedadn',
            'drvtee',
            'eandsr',
            'raavrd',
            'atevrs',
            'tsrnev',
            'sdttsa',
            'rasrtv',
            'nssdts',
            'ntnada',
            'svetve',
            'tesnvt',
            'vntsnd',
            'vrdear',
            'dvrsen',
            'enarar',
        ];
        $repetitionCodeParser = new RepetitionCodeParser($repetitionCode);
        $this->assertEquals('easter', $repetitionCodeParser->parse());
    }

    public function test_part2_example()
    {
        $repetitionCode = [
            'eedadn',
            'drvtee',
            'eandsr',
            'raavrd',
            'atevrs',
            'tsrnev',
            'sdttsa',
            'rasrtv',
            'nssdts',
            'ntnada',
            'svetve',
            'tesnvt',
            'vntsnd',
            'vrdear',
            'dvrsen',
            'enarar',
        ];
        $repetitionCodeParser = new RepetitionCodeParser($repetitionCode);
        $this->assertEquals('advent', $repetitionCodeParser->parse());
    }

}