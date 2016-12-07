<?php

use PHPUnit\Framework\TestCase;
use Advent\TLSSupport;

class TestTLSSupport extends TestCase {

    public function test_finds_abba()
    {
        $ip = 'abba[mnop]qrst';
        $this->assertTrue((new TLSSupport($ip))->check());
    }

    public function test_finds_xyyx()
    {
        $ip = 'abcd[bddb]xyyx';
        $this->assertFalse((new TLSSupport($ip))->check());
    }

    public function test_dont_find_aaaa()
    {
        $ip = 'aaaa[qwer]tyui';
        $this->assertFalse((new TLSSupport($ip))->check());
    }

    public function test_finds_within_larger_string()
    {
        $ip = 'ioxxoj[asdfgh]zxcvbn';
        $this->assertTrue((new TLSSupport($ip))->check());
    }

}