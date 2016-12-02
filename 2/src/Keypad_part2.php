<?php

namespace Advent;

class Keypad_part2 extends Keypad {

    protected $currentPosition = '0, 2';
    protected $coordinates = [
        '0, 0' => null,
        '1, 0' => null,
        '2, 0' => 1,
        '3, 0' => null,
        '4, 0' => null,

        '0, 1' => null,
        '1, 1' => 2,
        '2, 1' => 3,
        '3, 1' => 4,
        '4, 1' => null,

        '0, 2' => 5,
        '1, 2' => 6,
        '2, 2' => 7,
        '3, 2' => 8,
        '4, 2' => 9,

        '0, 3' => null,
        '1, 3' => 'A',
        '2, 3' => 'B',
        '3, 3' => 'C',
        '4, 3' => null,

        '0, 4' => null,
        '1, 4' => null,
        '2, 4' => 'D',
        '3, 4' => null,
        '4, 4' => null,
    ];

    public function move($instructions)
    {
        $instructions = str_split($instructions);
        foreach ($instructions as $instruction) {
            $coordinates = explode(', ', $this->currentPosition);
            $x = (int) $coordinates[0];
            $y = (int) $coordinates[1];

            if ($instruction == 'U') {
                $y -= 1;
            }
            if ($instruction == 'D') {
                $y += 1;
            }
            if ($instruction == 'L') {
                $x -= 1;
            }
            if ($instruction == 'R') {
                $x += 1;
            }

            $coordinates = $x . ', ' . $y;

            if (isset($this->coordinates[$coordinates])) {
                $this->currentPosition = $coordinates;
            }

        }
        $this->pressKey($coordinates);
        
        return $this;
    }

}