<?php 

require 'vendor/autoload.php';

use Advent\RepetitionCodeParser;

$codes = file('input.txt');
$parser = new RepetitionCodeParser($codes);
echo $parser->parse();