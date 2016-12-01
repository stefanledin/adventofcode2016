<?php
require 'vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use CreamDiePie\Destination;

class Test extends TestCase {

    public function test_examples()
    {
        $directions = 'R2, L3';
        $blocks_away = 5;

        $destination = Destination::directions($directions);

        $this->assertEquals(5, $destination->distance());
    }

    public function test_change_current_wind()
    {
        $directions = 'R2, L3';
        $destination = new Destination($directions);

        $this->assertEquals('N', $destination->currentWind());
    }

}