<?php
require 'vendor/autoload.php';

use Advent\TLSSupport;
use Advent\SSLSupport;

$ipAddresses = file('input.txt');
$valid = 0;
$part2 = 0;
foreach ($ipAddresses as $ip) {
    if ((new TLSSupport($ip))->check()) {
        $valid++;
    }
    if ((new SSLSupport($ip))->check()) {
        $part2++;
    }
}
echo $valid . "\n";
echo $part2;