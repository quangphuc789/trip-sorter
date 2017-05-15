<?php

use PHPUnit\Framework\TestCase;

include_once "src/transport/Transport.php";
include_once "src/transport/Bus.php";

/**
 * Test suites for Bus
 * 
 * @author  Timothy Quang Phuc Nguyen <quangphuc789@gmail.com>
 */
class BusTest extends TestCase
{
    /**
     * @dataProvider providerObject
     */
    public function testObject($desc, $name, $seat) 
    {
        $bus = new Bus($desc, $name, $seat);
        $this->assertEquals($bus->getDescription(), $desc);
        $this->assertEquals($bus->getName(), $name);
        $this->assertEquals($bus->getSeat(), $seat);
        $this->assertEquals($bus->getType(), "bus");
    }

    public function providerObject() 
    {
        // Test suite 0
        $desc_0 = "Take the airport bus from Barcelona to Gerona Airport. No seat assignment.";
        $name_0 = "Airport Bus";
        $seat_0 = "44";

        // Test suite 1
        $desc_1 = "Take the airport bus from Barcelona to Gerona Airport. No seat assignment.";
        $name_1 = "Airport Bus";
        $seat_1 = null;

        // Test suite 2
        $desc_2 = "Take the airport bus from Barcelona to Gerona Airport. Seat 88.";
        $name_2 = null;
        $seat_2 = "88";

        // Test suite 3
        $desc_3 = "Take the airport bus from Barcelona to Gerona Airport. No seat assignment.";
        $name_3 = null;
        $seat_3 = null;

        return array(
            array($desc_0, $name_0, $seat_0),
            array($desc_1, $name_1, $seat_1),
            array($desc_2, $name_2, $seat_2),
            array($desc_3, $name_3, $seat_3),
        );
    }
}