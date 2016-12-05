<?php

namespace Advent;

use Advent\Triangle;

class TriangleCollection {
    
    public function __construct(array $measurements)
    {
        $this->measurements = $measurements;
        $this->groupByThree();
        $this->orderMeasurements();
    }

    protected function groupByThree()
    {
        $groups = [];
        $rowNumber = 0;
        for ($i=0; $i < count($this->measurements); $i++) { 
            preg_match_all('/\d+/', $this->measurements[$i], $measurements);
            $groups[$rowNumber][] = array_shift($measurements);
            if (count($groups[$rowNumber]) == 3) {
                $rowNumber++;
            }
        }
        $this->measurements = $groups;
    }

    public function orderMeasurements()
    {
        for ($i=0; $i < count($this->measurements); $i++) { 
            $row1 = array(
                $this->measurements[$i][0][0],
                $this->measurements[$i][1][0],
                $this->measurements[$i][2][0]
            );
            $row2 = array(
                $this->measurements[$i][0][1],
                $this->measurements[$i][1][1],
                $this->measurements[$i][2][1]
            );
            $row3 = array(
                $this->measurements[$i][0][2],
                $this->measurements[$i][1][2],
                $this->measurements[$i][2][2]
            );
            $this->measurements[$i] = array($row1, $row2, $row3);
        }
    }

    public function create()
    {
        $valid = 0;
        foreach ($this->measurements as $measurements) {
            for ($i=0; $i < count($measurements); $i++) { 
                $instructions = implode(' ', $measurements[$i]);
                $triangle = new Triangle($instructions);
                if ($triangle->isValid()) {
                    $valid++;
                }
            }
        }
        echo $valid;
    }

}