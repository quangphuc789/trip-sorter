<?php

use PHPUnit\Framework\TestCase;

include_once "src/transport/Transport.php";
include_once "src/transport/Train.php";

/**
 * Test suites for Train
 * 
 * @author  Timothy Quang Phuc Nguyen <quangphuc789@gmail.com>
 */
class TrainTest extends TestCase
{
    /**
     * @dataProvider providerObject
     */
    public function testObject($desc, $name, $seat) 
    {
        $train = new Train($desc, $name, $seat);
        $this->assertEquals($train->getDescription(), $desc);
        $this->assertEquals($train->getName(), $name);
        $this->assertEquals($train->getSeat(), $seat);
        $this->assertEquals($train->getType(), "train");
    }

    public function providerObject() 
    {
        // Test suite 0
        $desc_0 = "AAA";
        $name_0 = "Sample Train";
        $seat_0 = "44";

        // Test suite 1
        $desc_1 = "BBB";
        $name_1 = "Sample Train 2";
        $seat_1 = null;

        // Test suite 2
        $desc_2 = "CCC";
        $name_2 = null;
        $seat_2 = "88";

        // Test suite 3
        $desc_3 = "DDD";
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