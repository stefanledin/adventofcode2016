<?php
require 'vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use CreamDiePie\Destination;

class Test extends TestCase {

    public function test_change_current_wind()
    {
        $destination = new Destination();
        
        $destination->move('L', 1);
        $this->assertEquals('W', $destination->currentWind());
        
        $destination->move('L', 1);
        $this->assertEquals('S', $destination->currentWind());
        
        $destination->move('R', 1);
        $this->assertEquals('W', $destination->currentWind());
        
        $destination->move('R', 1);
        $this->assertEquals('N', $destination->currentWind());
    }

    public function test_examples()
    {
        $this->assertEquals(5, (Destination::directions('R2, L3'))->distance());
        $this->assertEquals(2, (Destination::directions('R2, R2, R2'))->distance());
        $this->assertEquals(12, (Destination::directions('R5, L5, R5, R3'))->distance());
    }

    public function test_beginning_of_real_input()
    {
        $input = 'R2, L5, L4, L5, R4';
        $destination = new Destination;
        
        $destination->move('R', 2);
        $this->assertEquals('E', $destination->currentWind());

        $destination->move('L', 5);
        $this->assertEquals('N', $destination->currentWind());

        $destination->move('L', 4);
        $this->assertEquals('W', $destination->currentWind());

        $destination->move('L', 5);
        $this->assertEquals('S', $destination->currentWind());

        $destination->move('R', 4);
        $this->assertEquals('W', $destination->currentWind());
    }

    public function test_visited_locations()
    {
        $destinations = Destination::directions('R8, R4, R4, R8');
        $visitedTwice = explode(', ', $destinations->visitedTwice);
        $this->assertEquals(4, $destinations->distance($visitedTwice[0], $visitedTwice[1]));
    }

}