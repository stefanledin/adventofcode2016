<?php 

namespace CreamDiePie;

class Destination {

    protected $startX = 0;
    protected $startY = 0;
    protected $winds = ['N', 'E', 'S', 'W'];

    protected $currentWindIndex = 0;
    protected $endX = 0;
    protected $endY = 0;
    protected $visitedLocations = [];
    public $visitedTwice = null;

    public static function directions($directions)
    {
        return new self($directions);
    }

    public function __construct($directions = null)
    {
        $directions = explode(', ', $directions);
        foreach ($directions as $direction) {
            $this->move(
                substr($direction, 0, 1),
                (int) substr($direction, 1)
            );
        }
    }

    public function move($direction, $numberOfBlocks)
    {
        if ($direction == 'L') {
            $this->moveToLeft();
        }
        if ($direction == 'R') {
            $this->moveToRight();
        }
        for ($i=0; $i < $numberOfBlocks; $i++) { 
            switch ($this->currentWind()) {
                case 'N':
                    $this->endX += 1;
                    break;
                case 'S':
                    $this->endX -= 1;
                    break;
                case 'W':
                    $this->endY -= 1;
                    break;
                case 'E':
                    $this->endY += 1;
                    break;
            }
            $location = $this->endX . ', ' . $this->endY;
            if (($this->visitedTwice == null) && in_array($location, $this->visitedLocations)) {
                $this->visitedTwice = $location;
            }
            array_push($this->visitedLocations, $location);
        }
    }

    protected function moveToLeft()
    {
        if ($this->currentWindIndex == 0) {
            $this->currentWindIndex = 3;
        } else {
            $this->currentWindIndex -= 1;
        }
    }

    protected function moveToRight()
    {
        if ($this->currentWindIndex == 3) {
            $this->currentWindIndex = 0;
        } else {
            $this->currentWindIndex += 1;
        }
    }

    public function currentWind()
    {
        return $this->winds[$this->currentWindIndex];
    }

    public function distance($x = null, $y = null)
    {
        $x = (is_numeric($x)) ? $x : $this->endX;
        $y = (is_numeric($y)) ? $y : $this->endY;
        return abs(($this->startX - abs($x)) + ($this->startY - abs($y)));
    }

    public function alreadyVisited()
    {
        return array_count_values($this->visitedLocations);
    }

}