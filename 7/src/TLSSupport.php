<?php

namespace Advent;

class TLSSupport {

    protected $ip;

    public function __construct($ip)
    {
        $this->ip = $ip;
    }

    public function check()
    {
        preg_match_all('/(?<!\[)(\S)(\S)\2\1(?!\])/', $this->ip, $matches);
        return $this->validateAbba($matches);
    }

    protected function validateAbba($matches)
    {
        if (count($matches)) {
            return ($matches[1] !== $matches[2]);
        }
        return false;
    }

}