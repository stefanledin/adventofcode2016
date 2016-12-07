<?php
require 'vendor/autoload.php';

$input = file_get_contents('input.txt');

$destination = CreamDiePie\Destination::directions($input);
echo var_dump($destination->visitedTwice);
#echo $destination->distance();