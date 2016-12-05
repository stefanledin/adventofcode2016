<?php 
require 'vendor/autoload.php';

use Advent\Triangle;
use Advent\TriangleCollection;

$triangles = file('input.txt');
$valid = 0;
foreach ($triangles as $triangleMeasurements) {
    $triangle = new Triangle($triangleMeasurements);
    if ($triangle->isValid()) {
        $valid++;
    }
}
#echo $valid . '/' . count($triangles);

$collection = new TriangleCollection($triangles);
$collection->create();