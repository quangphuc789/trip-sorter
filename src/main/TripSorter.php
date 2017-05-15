<?php

/**
 * Main class to sort the boarding cards
 *
 * @author  Timothy Quang Phuc Nguyen <quangphuc789@gmail.com>
 */
class TripSorter implements iTripSorter 
{
    /**
     * The list of the BoardingCard(s) to be sorted
     * 
     * @var array
     */
    private $_cards;

    /**
      * This is the constructor of a TripSorter
      *
      * @param array    $cards   List of BoardingCard(s)
      */
    public function __construct($cards = []) 
    {
        $this->_cards = $cards;
    }

    /**
     * Main sorting logic for the list of cards
     * 
     * @return mixed    
     *         1. array of sorted BoardingCards. 
     *         2. NULL if there is error(s)
     */
    public function sort() 
    {
        /**
         * Trivial cases: if there is 0 or 1 card only.
         */
        if (count($this->_cards) <= 1) {
            return $this->_cards;
        }

        /**
         * A hash map indexed by location names.
         * Each of the element has 2 information:
         *     1. startIndex: index of the card in $this->_cards where it is the Departure
         *     2. endIndex: index of the card in $this->_cards where it is the Destination
         *     
         * @var array
         */
        $locationHashMap = [];

        /**
         * Array of 2, contains departure and destination.
         * Each of them is an element from $locationHashMap.
         * Departure has endIndex is NULL.
         * Destination has startIndex is NULL.
         * 
         * @var array
         */
        $startAndEndLocations = [];

        /**
         * 1st Loop: Builds $locationHashMap and $startAndEndLocations at the same time.
         * 
         * Complexity: O(n)
         */
        foreach ($this->_cards as $key => $card) {
            $departure = $card->getFrom();
            $destination = $card->getTo();

            /** 
             * Build up the $startAndEndLocations
             * 
             * Logic: if a location is both a departure and a destination, ..
             * .. remove it from the array.
             */
            if (!isset($startAndEndLocations[$departure])) {
                // If $departure is never a departure location before
                $startAndEndLocations[$departure] = array(
                    'start' => true, 
                    'end' => false
                    );
            } else {
                if ($startAndEndLocations[$departure]['start']) {
                    // Reaches here means $departure is already a departure once
                    // And it is a departure again, which is invalid
                    return null;
                } else {
                    // If not, remove it from the $startAndEndLocations map
                    unset($startAndEndLocations[$departure]);
                }
            }

            if (!isset($startAndEndLocations[$destination])) {
                // If $destination is never a destination location before
                $startAndEndLocations[$destination] = array(
                    'start' => false,
                    'end' => true
                    );
            } else {
                if ($startAndEndLocations[$destination]['end']) {
                    // Reaches here means $destination is already a destination once
                    // And it is a destination again, which is invalid
                    return null;
                } else {
                    // If not, remove it from the $startAndEndLocations map
                    unset($startAndEndLocations[$destination]);
                }
            }

            /** Build the $locationHashMap
             * 
             * Logic: for each card, mark the indexes of the cards in ..
             * .. $this->_cards by which the location is a departure or a destination.
             */ 
            if (!isset($locationHashMap[$departure])) {
                $locationHashMap[$departure] = array(
                    'startIndex' => $key,
                    'endIndex' => null
                    );
            } else {
                $locationHashMap[$departure]['startIndex'] = $key;
            }

            if (!isset($locationHashMap[$destination])) {
                $locationHashMap[$destination] = array(
                    'startIndex' => null,
                    'endIndex' => $key
                    );
            } else {
                $locationHashMap[$destination]['endIndex'] = $key;
            }
        }

        /**
         * First location
         * 
         * @var string Name of location
         */
        $firstLocation = null;

        /**
         * Determine starting location
         *
         * Complexity: 1
         */
        foreach ($startAndEndLocations as $key => $end) {
            if ($end['start']) {
                $firstLocation = $key;
                break;
            }
        }

        /**
         * Final sorted list
         * 
         * @var array
         */
        $sortedCards = [];

        /**
         * Start location information, consists of departure and destination ..
         * .. indexes in $this->_cards
         * 
         * @var array
         */
        $startLocationInfo = $locationHashMap[$firstLocation];

        /**
         * 2nd Loop: connect the cards in order
         *
         * Complexity: O(n)
         */
        while ($startLocationInfo['startIndex'] !== null) {
            $card = $this->_cards[$startLocationInfo['startIndex']];
            $sortedCards[] = $card;

            $destination = $card->getTo();
            $startLocationInfo = $locationHashMap[$destination];
        }

        return $sortedCards;
    }

    /**
     * To print result in Console
     * 
     * @param  array $cards  List of BoardingCard
     * 
     * @return string
     */
    public function printResultConsole($cards, $unittest = false) 
    {
        /**
         * The final string to be used for unit testing
         * 
         * @var string
         */
        $combinedString = '';

        /**
         * If null is passed or there is no card
         */
        if ($cards === null || count($cards) === 0) {
            return;
        }

        /**
         * Print each card
         */
        foreach ($cards as $card) {
            $combinedString .= $card->getDescription() . "\n\n";
        }

        /**
         * Ending words
         */
        $combinedString .= "You have arrived at your final destination.\n";

        /**
         * Print to console
         */
        if (!$unittest) {
            echo $combinedString;
        }

        /**
         * Unit testing
         */
        return $combinedString;
    }
}