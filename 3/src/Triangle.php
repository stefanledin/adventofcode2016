<?php

namespace Advent;

class Triangle {

    public function __construct(string $measurements)
    {
        $this->measurements = $measurements;
    }

    public function isValid()
    {
        preg_match_all('/\d+/', $this->measurements, $sides);
        $sides = array_shift($sides);
        sort($sides);
        $totalLength = array_sum($sides);
        return ( ($totalLength - $sides[2]) > $sides[2] );
    }

}