<?php

use PHPUnit\Framework\TestCase;

include_once "src/transport/Transport.php";
include_once "src/transport/Flight.php";

/**
 * Test suites for Flight
 * 
 * @author  Timothy Quang Phuc Nguyen <quangphuc789@gmail.com>
 */
class FlightTest extends TestCase
{
    /**
     * @dataProvider providerObject
     */
    public function testObject($desc, $name, $seat, $gate) 
    {
        $flight = new Flight($desc, $name, $seat, $gate);
        $this->assertEquals($flight->getDescription(), $desc);
        $this->assertEquals($flight->getName(), $name);
        $this->assertEquals($flight->getSeat(), $seat);
        $this->assertEquals($flight->getGate(), $gate);
        $this->assertEquals($flight->getType(), "flight");
    }

    public function providerObject() 
    {
        // Test suite 0
        $desc_0 = "From Gerona Airport, take flight SK455 to Stockholm. Gate 45B, seat 3A.\n"
                    . "Baggage drop at ticket counter 344.";
        $name_0 = "SK455";
        $seat_0 = "44";
        $gate_0 = "";

        // Test suite 1
        $desc_1 = "From Gerona Airport, take flight RRR to Stockholm. Gate 45B, seat 3A.\n"
                    . "Baggage drop at ticket counter 344.";
        $name_1 = "RRR";
        $seat_1 = null;
        $gate_1 = null;

        // Test suite 2
        $desc_2 = "From Gerona Airport, take flight noname to Stockholm. Gate 45B, seat 3A.\n"
                    . "Baggage drop at ticket counter 344.";
        $name_2 = null;
        $seat_2 = "88";
        $gate_2 = "2";

        // Test suite 3
        $desc_3 = "From Gerona Airport, take flight SK455 to Stockholm. Gate 45B, seat 3A.\n"
                    . "Baggage drop at ticket counter 344.";
        $name_3 = null;
        $seat_3 = null;
        $gate_3 = "44";

        return array(
            array($desc_0, $name_0, $seat_0, $gate_0),
            array($desc_1, $name_1, $seat_1, $gate_1),
            array($desc_2, $name_2, $seat_2, $gate_2),
            array($desc_3, $name_3, $seat_3, $gate_3),
        );
    }
}