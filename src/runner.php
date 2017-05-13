<?php

include_once "main/iTripSorter.php";
include_once "main/BoardingCard.php";
include_once "main/TripSorter.php";
include_once "transport/Transport.php";
include_once "transport/Bus.php";
include_once "transport/Train.php";
include_once "transport/Flight.php";

// Card 1
$desc1 = "Take train 78A from Madrid to Barcelona. Sit in seat 45B.";
$transport1 = new Train($desc1, "78A", "45B");
$card1 = new BoardingCard("Madrid", "Barcelona", $transport1);

// Card 2
$desc2 = "Take the airport bus from Barcelona to Gerona Airport. No seat assignment.";
$transport2 = new Bus($desc2, "Airport Bus", null);
$card2 = new BoardingCard("Barcelona", "Gerona Airport", $transport2);

// Card 3
$desc3 = "From Gerona Airport, take flight SK455 to Stockholm. Gate 45B, seat 3A.\n"
        . "Baggage drop at ticket counter 344.";
$transport3 = new Flight($desc3, "SK455", "3A", "45B");
$card3 = new BoardingCard("Gerona Airport", "Stockholm", $transport3);

// Card 4
$desc4 = "From Stockholm, take flight SK22 to New York JFK. Gate 22, seat 7B.\n"
        . "Baggage will we automatically transferred from your last leg.";
$transport4 = new Flight($desc4, "SK22", "7B", "22");
$card4 = new BoardingCard("Stockholm", "New York JFK", $transport4);

// Run
// $tripSorter = new TripSorter([$card1, $card2, $card3, $card4]);
$tripSorter = new TripSorter([$card4, $card2, $card1, $card3]);
$sortedCards = $tripSorter->sort();
$tripSorter->printResultConsole($sortedCards);