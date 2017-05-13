<?php

/**
 * API Interface for TripSorter
 *
 * @author  Timothy Quang Phuc Nguyen <quangphuc789@gmail.com>
 */
interface iTripSorter {
    /**
     * Sort the boarding cards
     * @return array List of BoardingCards
     */
    public function sort();

    /**
     * Print the result in console friendly mode
     * @param  array $cards List of BoardingCard
     * @return null
     */
    public function printResultConsole($cards);
}