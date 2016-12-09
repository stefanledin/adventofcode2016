<?php require 'vendor/autoload.php';

use Advent\DoorLock;

$doorLock = new DoorLock;
echo $doorLock->generatePassword('cxdnnyjw');
