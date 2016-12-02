<?php require 'vendor/autoload.php';

use Advent\Keypad;
use Advent\Keypad_part2;

$instructions = file('input.txt');

$keypad = new Keypad;
foreach ($instructions as $instruction) {
    $keypad->move($instruction);
}
#echo $keypad->getCode();

$keypad_2 = new Keypad_part2;
foreach ($instructions as $instruction) {
    $keypad_2->move($instruction);
}
echo $keypad_2->getCode();
