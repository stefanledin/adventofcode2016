<?php 

use PHPUnit\Framework\TestCase;
use Advent\DoorLock;

class TestDoorLock extends TestCase {

    public function test_example()
    {
        $id = 'abc';
        $password = '18f47a30';
        $doorLock = new DoorLock;
        $this->assertEquals($password, $doorLock->generatePassword($id));
    }

    public function test_part_2()
    {
        $id = 'abc';
        $password = '05ace8e3';
        $doorLock = new DoorLock;
        $this->assertEquals($password, $doorLock->generatePassword($id));
    }

}