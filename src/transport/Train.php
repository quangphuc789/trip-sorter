<?php

/**
 * Transportation mode: Train
 * Inherited from Transport
 * 
 * @author  Timothy Quang Phuc Nguyen <quangphuc789@gmail.com>
 */
class Train extends Transport 
{
    /**
     * Constructor of Train.
     * 
     * @param string $description Description of train
     * @param string $name        Name of train
     * @param string $seat        Seating
     */
    public function __construct($description, $name, $seat) 
    {
        $this->_description = $description;
        $this->_name = $name;
        $this->_seat = $seat;
    }

    /**
     * Get the type of transport. Overrides parent's function.
     * 
     * @return string Type of transport
     */
    public function getType() 
    {
        return 'train';
    }
}