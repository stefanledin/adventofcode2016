<?php

namespace Advent;

class Keypad {

    protected $instructions = [
        'U' => 'up',
        'D' => 'down',
        'L' => 'left',
        'R' => 'right'
    ];
    protected $coordinates = [
        '0, 0' => 1,
        '1, 0' => 2,
        '2, 0' => 3,
        '0, 1' => 4,
        '1, 1' => 5,
        '2, 1' => 6,
        '0, 2' => 7,
        '1, 2' => 8,
        '2, 2' => 9,
    ];
    protected $currentPosition = '1, 1';
    protected $code = [];

    public function __construct()
    {
        
    }

    public function move($instructions)
    {
        $instructions = str_split($instructions);
        foreach ($instructions as $instruction) {
            $coordinates = explode(', ', $this->currentPosition);
            $x = (int) $coordinates[0];
            $y = (int) $coordinates[1];

            if ($instruction == 'U') {
                if ($y > 0) {
                    $y -= 1;
                }
            }
            if ($instruction == 'D') {
                if ($y < 2) {
                    $y += 1;
                }
            }
            if ($instruction == 'L') {
                if ($x > 0) {
                    $x -= 1;
                }
            }
            if ($instruction == 'R') {
                if ($x < 2) {
                    $x += 1;
                }
            }

            $coordinates = $x . ', ' . $y;

            $this->currentPosition = $coordinates;

        }
        $this->pressKey($coordinates);
        
        return $this;
    }

    public function pressKey($coordinates)
    {
        $this->code[] = $this->fingerPosition();
    }

    public function fingerPosition()
    {
        return $this->coordinates[$this->currentPosition];
    }

    public function getCode()
    {
        return implode('', $this->code);
    }

}