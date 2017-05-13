<?php

/**
 * Main class to sort the boarding cards
 *
 * @author  Timothy Quang Phuc Nguyen <quangphuc789@gmail.com>
 */
class TripSorter implements iTripSorter {
    /**
     * The list of the cards to be sorted
     * @var array
     */
    private $_cards;

    /**
      * This is the construction of a TripSorter
      *
      * @param array    $cards   List of BoardingCard
      *
      * @return TripSorter object
      */
    public function __construct($cards = []) {
        $this->_cards = $cards;
    }

    /**
     * This is to sort the list of cards
     * 
     * @return mixed    array of sorted BoardingCards. NULL if there is error(s)
     */
    public function sort() {
        if (count($this->_cards) <= 1) {
            return $this->_cards;
        }

        $links = [];
        $ends = [];

        // 1st Loop: build up the ending point list & hash map of links
        // Complexity: O(n)
        foreach ($this->_cards as $key => $card) {
            $from = $card->getFrom();
            $to = $card->getTo();

            // Build the $ends hash map
            if (!isset($ends[$from])) {
                $ends[$from] = array(
                    'start' => true, 
                    'end' => false
                    );
            } else {
                if ($ends[$from]['start']) {
                    // If this location is started somewhere else
                    return null;
                } else {
                    // If not, remove it from the $ends map
                    unset($ends[$from]);
                }
            }

            if (!isset($ends[$to])) {
                $ends[$to] = array(
                    'start' => false,
                    'end' => true
                    );
            } else {
                if ($ends[$to]['end']) {
                    // If this location is ended somewhere else
                    return null;
                } else {
                    // If not, remove it from the $ends map
                    unset($ends[$to]);
                }
            }

            // Build the links hash map
            if (!isset($links[$from])) {
                $links[$from] = array(
                    'startIndex' => $key,
                    'endIndex' => null
                    );
            } else {
                $links[$from]['startIndex'] = $key;
            }

            if (!isset($links[$to])) {
                $links[$to] = array(
                    'startIndex' => null,
                    'endIndex' => $key
                    );
            } else {
                $links[$to]['endIndex'] = $key;
            }
        }

        // Small loop: Determine starting location
        // Complexity: 1
        $startingPoint = null;
        foreach ($ends as $key => $end) {
            if ($end['start']) {
                $startingPoint = $key;
                break;
            }
        }

        // Link the cards
        $sortedCards = [];

        // 2nd Loop: connect the cards in order
        // Complexity: O(n)
        $startLink = $links[$startingPoint];
        while ($startLink['startIndex'] !== null) {
            $card = $this->_cards[$startLink['startIndex']];
            $sortedCards[] = $card;

            $to = $card->getTo();
            $startLink = $links[$to];
        }

        return $sortedCards;
    }

    /**
     * To print result in console mode
     * 
     * @param  array    $cards  List of BoardingCard
     *
     * @return null
     */
    public function printResultConsole($cards) {
        if ($cards === null || count($cards) === 0) {
            return;
        }

        foreach ($cards as $card) {
            echo $card->getDescription();
            echo "\n\n";
        }

        echo "You have arrived at your final destination.\n";
    }
}