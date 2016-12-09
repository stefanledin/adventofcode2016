<?php

use PHPUnit\Framework\TestCase;
use Advent\TLSSupport;
use Advent\SSLSupport;

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

    public function test_multiple_brackets()
    {
        $ip = 'abcd[acbddbef]xyyx[acbddbef]';
        $this->assertFalse((new TLSSupport($ip))->check());
    }

    public function test_part_2()
    {
        $this->assertTrue((new SSLSupport('aba[bab]xyz'))->check());
        $this->assertFalse((new SSLSupport('xyx[xyx]xyx'))->check());
        $this->assertTrue((new SSLSupport('aaa[kek]eke'))->check());
        $this->assertTrue((new SSLSupport('zazbz[bzb]cdb'))->check());
    }

}