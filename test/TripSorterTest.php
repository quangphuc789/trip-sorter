<?php

use PHPUnit\Framework\TestCase;

include "../src/runner.php";

class EquivalenceTest extends TestCase
{
    /**
     * @dataProvider providerSort
     */
    public function testSort($arg, $expected) {
        $tripSorter = new TripSorter($arg);
        $this->assertEquals($tripSorter->sort(), $expected);
    }

    public function providerSort() {
        // Test suite 0 - Default trips
        $desc_1 = "Take train 78A from Madrid to Barcelona. Sit in seat 45B.";
        $transport_1 = new Train($desc_1, "78A", "45B");
        $card_1 = new BoardingCard("Madrid", "Barcelona", $transport_1);

        $desc_2 = "Take the airport bus from Barcelona to Gerona Airport. No seat assignment.";
        $transport_2 = new Bus($desc_2, "Airport Bus", null);
        $card_2 = new BoardingCard("Barcelona", "Gerona Airport", $transport_2);

        $desc_3 = "From Gerona Airport, take flight SK455 to Stockholm. Gate 45B, seat 3A.\n"
                . "Baggage drop at ticket counter 344.";
        $transport_3 = new Flight($desc_3, "SK455", "3A", "45B");
        $card_3 = new BoardingCard("Gerona Airport", "Stockholm", $transport_3);

        $desc_4 = "From Stockholm, take flight SK22 to New York JFK. Gate 22, seat 7B.\n"
                . "Baggage will we automatically transferred from your last leg.";
        $transport_4 = new Flight($desc_4, "SK22", "7B", "22");
        $card_4 = new BoardingCard("Stockholm", "New York JFK", $transport_4);

        $expected_0 = [$card_1, $card_2, $card_3, $card_4];
        $arg_0_0 = [$card_4, $card_2, $card_3, $card_1];
        $arg_0_1 = [$card_2, $card_3, $card_4, $card_1];
        $arg_0_2 = [$card_1, $card_2, $card_4, $card_3];
        $arg_0_3 = [$card_3, $card_1, $card_4, $card_2];

        // Test suite 1 - Only 2 trips
        $desc_1 = "Take train ER22 from Paris to Munich. Sit in seat 11P.";
        $transport_1 = new Train($desc_1, "ER22", "11P");
        $card_1 = new BoardingCard("Paris", "Munich", $transport_1);

        $desc_2 = "Take flight SK455 from Munich to Athens. Gate 22, seat 3A.\n";
        $transport_2 = new Flight($desc_2, "SK455", "22", "3A");
        $card_2 = new BoardingCard("Munich", "Athens", $transport_2);

        $expected_1 = [$card_1, $card_2];
        $arg_1_0 = [$card_1, $card_2];
        $arg_1_1 = [$card_2, $card_1];
        $arg_1_2 = [$card_2, $card_2];

        // Test suite 2 - Complex trips
        $desc_1 = "";
        $transport_1 = new Bus($desc_1, "", null);
        $card_1 = new BoardingCard("Place 0", "Place 1", $transport_1);

        $desc_2 = "";
        $transport_2 = new Bus($desc_2, "", null);
        $card_2 = new BoardingCard("Place 1", "Place 2", $transport_2);

        $desc_3 = "";
        $transport_3 = new Bus($desc_3, "", null);
        $card_3 = new BoardingCard("Place 2", "Place 3", $transport_3);

        $desc_4 = "";
        $transport_4 = new Bus($desc_4, "", null);
        $card_4 = new BoardingCard("Place 3", "Place 4", $transport_4);

        $desc_5 = "";
        $transport_5 = new Bus($desc_5, "", null);
        $card_5 = new BoardingCard("Place 4", "Place 5", $transport_5);

        $desc_6 = "";
        $transport_6 = new Bus($desc_6, "", null);
        $card_6 = new BoardingCard("Place 5", "Place 6", $transport_6);

        $desc_7 = "";
        $transport_7 = new Bus($desc_7, "", null);
        $card_7 = new BoardingCard("Place 6", "Place 7", $transport_7);

        $desc_8 = "";
        $transport_8 = new Bus($desc_8, "", null);
        $card_8 = new BoardingCard("Place 7", "Place 8", $transport_8);

        $desc_9 = "";
        $transport_9 = new Bus($desc_9, "", null);
        $card_9 = new BoardingCard("Place 8", "Place 9", $transport_9);

        $desc_10 = "";
        $transport_10 = new Bus($desc_10, "", null);
        $card_10 = new BoardingCard("Place 9", "Place 10", $transport_10);

        $desc_11 = "";
        $transport_11 = new Bus($desc_11, "", null);
        $card_11 = new BoardingCard("Place 10", "Place 11", $transport_11);

        $expected_2 = [$card_1, $card_2, $card_3, $card_4, $card_5, $card_6, $card_7, $card_8, $card_9, $card_10, $card_11];
        $arg_2_0 = [$card_1, $card_2, $card_3, $card_4, $card_5, $card_6, $card_7, $card_8, $card_9, $card_10, $card_11];
        $arg_2_1 = [$card_6, $card_2, $card_4, $card_3, $card_5, $card_1, $card_8, $card_7, $card_11, $card_10, $card_9];
        $arg_2_2 = [$card_6, $card_10, $card_4, $card_3, $card_11, $card_1, $card_8, $card_7, $card_5, $card_2, $card_9];

        // Test suite 3 - Only 1 trip
        $desc_1 = "Take train ER22 from Paris to Munich. Sit in seat 11P.";
        $transport_1 = new Train($desc_1, "ER22", "11P");
        $card_1 = new BoardingCard("Paris", "Munich", $transport_1);

        $expected_3 = [$card_1];
        $arg_3_0 = [$card_1];

        return array(
            array($arg_0_0, $expected_0),
            array($arg_0_1, $expected_0),
            array($arg_0_2, $expected_0),
            array($arg_0_3, $expected_0),
            array($arg_1_0, $expected_1),
            array($arg_1_1, $expected_1),
            array($arg_1_2, null),
            array($arg_2_0, $expected_2),
            array($arg_2_1, $expected_2),
            array($arg_3_0, $expected_3),
        );
    }
}