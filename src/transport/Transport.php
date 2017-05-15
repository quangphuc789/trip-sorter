<?php

/**
 * Abstract class of all modes of transport
 * New transport type to be inherited from this class
 *
 * @author  Timothy Quang Phuc Nguyen <quangphuc789@gmail.com>
 */
abstract class Transport 
{
    /**
     * Name of the transport
     * @var string
     */
    protected $_name;

    /**
     * Seating of transport
     * @var string
     */
    protected $_seat;

    /**
     * Description of transport
     * @var string
     */
    protected $_description;

    /**
     * Get type of transport.
     * 
     * @return string   Type of transport
     */
    abstract public function getType();

    /**
     * Accessor to get name of transport.
     * 
     * @return string Name of transport
     */
    public function getName() 
    {
        return $this->_name;
    }

    /**
     * Accessor to get seat of transport.
     * 
     * @return string Seat of transport
     */
    public function getSeat() 
    {
        return $this->_seat;
    }

    /**
     * Accessor to get description of transport.
     * 
     * @return string Description of transport
     */
    public function getDescription() 
    {
        return $this->_description;
    }
}