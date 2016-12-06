<?php

namespace Advent;

class RepetitionCodeParser {

    protected $repetitionCode;

    public function __construct(array $repetitionCode)
    {
        $this->repetitionCode = $repetitionCode;
    }

    public function parse()
    {
        $lettersToCount = [];
        $parsedCode = [];
        foreach ($this->repetitionCode as $index => $code) {
            $code = str_split($code);
            for ($i=0; $i < count($code); $i++) { 
                $lettersToCount[$i][] = $code[$i];
            }
        }
        for ($i=0; $i < count($lettersToCount); $i++) { 
            $lettersToCount[$i] = array_count_values($lettersToCount[$i]);
            arsort($lettersToCount[$i]);
            end($lettersToCount[$i]);
            $parsedCode[] = key($lettersToCount[$i]);
        }
        return implode('', $parsedCode);
    }

}