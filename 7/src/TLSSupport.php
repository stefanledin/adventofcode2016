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
        if (!$this->checkInsideBrackets()) {
            if (preg_match('/([a-z])(?!\1)([a-z])\2\1(?![a-z]*\])/', $this->ip)) {
                return true;
            }
        }
        return false;
    }

    protected function checkInsideBrackets()
    {
        return (bool) preg_match('/\[[a-z]*([a-z])(?!\1)([a-z])\2\1(?![a-z]*\[)/', $this->ip);
    }


}