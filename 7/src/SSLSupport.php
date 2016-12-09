<?php

namespace Advent;

class SSLSupport {
    protected $ip;
    protected $ABA;
    public function __construct($ip)
    {
        $this->ip = $ip;
    }

    public function check()
    {
        if ($this->containsABA()) {
            return $this->containsBAB();
        }
        return false;
    }

    protected function containsABA()
    {
        $ip = str_split($this->removeBrackets());
        for ($i=0; $i < count($ip); $i++) { 
            if (isset($ip[$i+2]) && ($ip[$i] == $ip[$i+2])) {
                if ($ip[$i] != $ip[$i+1]) {
                    $this->ABA[] = [
                        $ip[$i],
                        $ip[$i+1]
                    ];
                }
            }
        }
        return count($this->ABA);
    }

    /**
     * Hahahahahahah ha ha ha ha...
     */
    protected function containsBAB()
    {
        preg_match_all('/\[.+\]/', $this->ip, $brackets);
        $brackets = array_shift($brackets);
        foreach ($brackets as $bracket) {
            $bracket = str_split($bracket);
            for ($i=0; $i < count($bracket); $i++) { 
                foreach ($this->ABA as $aba) {
                    if ($bracket[$i] == $aba[1]) {
                        if (isset($bracket[$i+1]) && ($bracket[$i+1] == $aba[0])) {
                            if (isset($bracket[$i+2]) && ($bracket[$i+2] == $aba[1])) {
                                return true;
                            }
                        }
                    }
                }
            }
        }
        return false;
    }

    protected function removeBrackets()
    {
        return preg_replace('/\[.+\]/', '', $this->ip);
    }
}