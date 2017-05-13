<?php

/**
 * @author  Timothy Quang Phuc Nguyen <quangphuc789@gmail.com>
 */
class Flight extends Transport {
    /**
     * Constructor of Flight
     * @param string $description Description of flight
     * @param string $name        Name of flight
     * @param string $seat        Seating of flight
     * @param string $gate        Gate of flight
     */
    public function __construct($description, $name, $seat, $gate) {
        $this->_description = $description;
        $this->_name = $name;
        $this->_seat = $seat;
        $this->_gate = $gate;
    }

    /**
     * Accessor to get gate
     * @return string Gate of flight
     */
    public function getGate() {
        return $this->_gate;
    }

    /**
     * Get type of transport
     * @return string Type of transport
     */
    public function getType() {
        return 'flight';
    }
}