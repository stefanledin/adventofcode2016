<?php

use PHPUnit\Framework\TestCase;

use Advent\Triangle;
use Advent\TriangleCollection;

class TriangleTest extends TestCase {

    public function test_example()
    {
        $measurements = '5 10 25';
        $triangle = new Triangle($measurements);
        $this->assertFalse($triangle->isValid());
    }

    public function test_triangle_sides_is_ordered_by_length()
    {
        $measurements = '25 5 10';
        $triangle = new Triangle($measurements);
        $this->assertFalse($triangle->isValid());
    }

    public function test_real_value()
    {
        $triangle = new Triangle('  810  679   10');
        $this->assertFalse($triangle->isValid());
    }

    public function test_part2_example()
    {
        $example = [
            '101 301 501',
            '102 302 502',
            '103 303 503',
            '201 401 601',
            '202 402 602',
            '203 403 603'
        ];
        $collection = new TriangleCollection($example);
        $collection->create();
    }

}