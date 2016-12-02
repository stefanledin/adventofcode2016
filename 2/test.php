<?php

use PHPUnit\Framework\TestCase;
use Advent\Keypad;
use Advent\Keypad_part2;

class KeypadTest extends TestCase {

    public function test_get_number_from_coordinates()
    {
        $keypad = new Keypad;
        $this->assertEquals(5, $keypad->fingerPosition('1, 1'));
    }

    public function test_move_up_from_five_on_keypad()
    {
        $keypad = new Keypad;
        $keypad->move('U');
        $this->assertEquals(2, $keypad->fingerPosition());
        $this->assertEquals(2, $keypad->getCode());
    }

    public function test_cant_move_outside_keypad()
    {
        $keypad = new Keypad;
        $keypad->move('UUU');
        $this->assertEquals(2, $keypad->fingerPosition());
    }

    public function test_move_in_multiple_directions()
    {
        $keypad = new Keypad;
        $keypad->move('UDDDL');
        $this->assertEquals(7, $keypad->fingerPosition());
        $this->assertEquals(7, $keypad->getCode());
    }

    public function test_example()
    {
        $keypad = new Keypad;
        $instructions = array(
            'ULL',
            'RRDDD',
            'LURDL',
            'UUUUD'
        );
        foreach ($instructions as $instruction) {
            $keypad->move($instruction);
        }
        $this->assertEquals(1985, $keypad->getCode());
    }

    public function test_part2_example()
    {
        $keypad = new Keypad_part2;
        $instructions = array(
            'ULL',
            'RRDDD',
            'LURDL',
            'UUUUD'
        );
        foreach ($instructions as $instruction) {
            $keypad->move($instruction);
        }
        $this->assertEquals('5DB3', $keypad->getCode());
    }

}