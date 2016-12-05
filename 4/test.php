<?php

use PHPUnit\Framework\TestCase;
use Advent\Decrypter;

class TestDecrypter extends TestCase {

    public function test_first_example()
    {
        $name1 = 'aaaaa-bbb-z-y-x-123[abxyz]'; // Real
        $decrypter = new Decrypter($name1);
        $this->assertEquals('abxyz', $decrypter->getChecksum());
        $this->assertEquals('123', $decrypter->getSectorID());
        $this->assertEquals('aaaaabbbzyx', $decrypter->getLetters());

        $this->assertTrue($decrypter->validateChecksum());
    }

    public function test_second_example()
    {
        $name2 = 'a-b-c-d-e-f-g-h-987[abcde]'; // Real
        $decrypter = new Decrypter($name2);
        $this->assertTrue($decrypter->validateChecksum());
    }

    public function test_third_example()
    {
        $name3 = 'not-a-real-room-404[oarel]'; // Real
        $decrypter = new Decrypter($name3);
        $this->assertTrue($decrypter->validateChecksum());
    }

    public function test_fourth_example()
    {
        $name4 = 'totally-real-room-200[decoy]'; // Not real
        $decrypter = new Decrypter($name4);
        $this->assertFalse($decrypter->validateChecksum());
    }

}