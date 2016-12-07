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
        if ($this->checkInsideBrackets()) {
            preg_match_all('/(?<!\[)(\S)(\S)\2\1(?!\])/', $this->ip, $matches);
            return $this->validateAbba($matches);
        }
        return false;
    }

    protected function checkInsideBrackets()
    {
        preg_match_all('/(?<=\[)(\S+)?(\S)(\S)\3\2(?=(\S+)?\])/', $this->ip, $matches);
        if (count($matches[0])) {
            return false;
        }
        return true;
    }

    protected function validateAbba($matches)
    {
        if (count($matches)) {
            return ($matches[1] !== $matches[2]);
        }
        return false;
    }

}