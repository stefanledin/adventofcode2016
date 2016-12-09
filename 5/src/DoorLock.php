<?php

namespace Advent;

class DoorLock {

    protected $doorID;

    public function generatePassword($doorID)
    {
        $this->doorID = $doorID;
        $i = 0;
        return $this->createHash();
    }

    /*protected function createHash($i = 0)
    {
        $password = [];
        while (count($password) < 8) {
            $hash = md5($this->doorID . $i);
            if (substr($hash, 0, 5) === '00000') {
                $password[] = substr($hash, 5, 1);
            }
            $i++;
        }
        return implode('', $password);
    }*/

    protected function createHash($i = 0)
    {
        $password = [];
        while (count($password) < 8) {
            $hash = md5($this->doorID . $i);
            if (substr($hash, 0, 5) === '00000') {
                $position = substr($hash, 5, 1);
                $character = substr($hash, 6, 1);
                #if (is_integer($position)) {
                    if (($position >= 0) && (hexdec($position) < 8)) {
                        #var_dump($position . ' : ' . $character);
                        if (!isset($password[$position])) {
                            $password[$position] = $character;
                        }
                    }
                #}
            }
            $i++;
        }
        #var_dump($password);
        ksort($password);
        #var_dump($password);
        return implode('', $password);
    }

}