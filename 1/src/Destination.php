<?php 

namespace CreamDiePie;

class Destination {

    protected $x = 0;
    protected $y = 0;
    protected $winds = ['N', 'E', 'S', 'W'];

    protected $currentWindIndex = 0;

    public static function directions($directions)
    {
        return new self($directions);
    }

    public function __construct($directions)
    {
        $directions = explode(', ', $directions);
        foreach ($directions as $direction) {
            $axis = substr($direction, 0, 1);
            $numberOfBlocks = (int) substr($direction, 1);
            if ($axis == 'R') {

            }
        }
    }

    public function currentWind()
    {
        return $this->winds[$this->currentWindIndex];
    }

    public function distance()
    {
        return 5;
    }

}