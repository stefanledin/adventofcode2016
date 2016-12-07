<?php
require 'vendor/autoload.php';

use Advent\TLSSupport;

$ipAddresses = file('input.txt');
$valid = 0;
foreach ($ipAddresses as $ip) {
    if ((new TLSSupport($ip))->check()) {
        $valid++;
    }
}
echo $valid;