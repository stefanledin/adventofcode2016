<?php

namespace Advent;

use Illuminate\Support\Collection;

class Decrypter {

    protected $checksum;
    protected $letters;
    protected $sectorID;

    public function __construct($name)
    {
        // Extrahera checksum
        $this->extractChecksum($name);
        // Bokstäver
        $this->extractLetters($name);
        // Sektor ID
        $this->extractSectorID($name);
    }

    public function getChecksum()
    {
        return $this->checksum;
    }

    public function getSectorID()
    {
        return $this->sectorID;
    }

    public function getLetters()
    {
        return $this->letters;
    }

    protected function extractChecksum(string $name)
    {
        preg_match('/\[.+\]/', $name, $checksum);
        $checksum = array_shift($checksum);
        $checksum = substr($checksum, 1, -1);
        $this->checksum = $checksum;
    }

    protected function extractSectorID(string $name)
    {
        $name = explode('-', $name);
        $sectorIdAndChecksum = end($name);
        preg_match('/\d+/', $sectorIdAndChecksum, $sectorID);
        $this->sectorID = array_shift($sectorID);
    }

    protected function extractLetters(string $name)
    {
        $name = explode('-', $name);
        array_pop($name);
        $letters = implode('', $name);
        $this->letters = $letters;
    }

    public function validateChecksum()
    {
        // Ett rum är äkta om checksum är de fem 
        // vanligaste bokstäverna i namnet. 
        // Om antalet är lika så ska de ligga i alfabetisk ordning.
        #var_dump($this->letters);
        $countedLetters = array_count_values(str_split($this->letters));
        #var_dump($countedLetters);
        $countedLetters = $this->groupByLetterCount($countedLetters);
        krsort($countedLetters);
        #var_dump($countedLetters);
        $checksum = [];
        foreach ($countedLetters as $count => $letters) {
            if (count($letters) == 1) {
                $checksum[$count] = $letters[0];
            } else {
                sort($letters);
                for ($i=0; $i < count($letters); $i++) { 
                    $checksum[$count] = $letters[$i];
                }
            }
        }
        var_dump($checksum);
        krsort($checksum);
        #var_dump($checksum);
        $checksum = implode('', $checksum);
        if (strlen($checksum) > 5) {
            $checksum = substr($checksum, 0, 5);
        }
        #var_dump($checksum);
        return ($checksum == $this->checksum);
    }

    protected function groupByLetterCount(array $countedLetters)
    {
        $groups = [];
        foreach ($countedLetters as $letter => $count) {
            $groups[$count][] = $letter;
        }
        return $groups;
    }

}