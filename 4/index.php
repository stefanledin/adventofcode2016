<?php require 'vendor/autoload.php';

use Advent\Decrypter;

$names = file('input.txt');

$sectorIdSum = 0;
foreach ($names as $name) {
    $decrypter = new Decrypter($name);
    if ($decrypter->validateChecksum()) {
        $sectorIdSum += (int) $decrypter->getSectorID();
        if (is_integer(strpos($decrypter->getRealName(), 'north'))) {
            echo $decrypter->getRealName() . "\n";
            echo $decrypter->getSectorID();
        }
    }
}
#echo $sectorIdSum;