<?php

/**
 * @author  Timothy Quang Phuc Nguyen <quangphuc789@gmail.com>
 */
class Bus extends Transport {
    /**
     * Constructor of Bus
     * @param string $description Description of bus
     * @param string $name        Name of bus
     * @param string $seat        Seating of bus
     */
    public function __construct($description, $name = null, $seat = null) {
        $this->_description = $description;
        $this->_name = $name;
        $this->_seat = $seat;
    }

    /**
     * Get type of transport
     * @return string Type of transport
     */
    public function getType() {
        return 'bus';
    }
}