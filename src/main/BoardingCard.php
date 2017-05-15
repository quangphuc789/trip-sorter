<?php

/**
 * The actual boarding card for each trip
 *
 * @author  Timothy Quang Phuc Nguyen <quangphuc789@gmail.com>
 */
class BoardingCard 
{
    /**
     * Departure location
     * 
     * @var string
     */
    private $_from;

    /**
     * Destination location
     * 
     * @var string
     */
    private $_to;

    /**
     * Transport type for the trip
     * 
     * @var Transport
     */
    private $_transport;

     /**
      * Constructor of a BoardingCard
      * 
      * @param string       $from   Departure location
      * @param string       $to     Destination
      * @param Transport    $to     Transport object
      */
    public function __construct($from, $to, $transport) 
    {
        $this->_from = $from;
        $this->_to = $to;
        $this->_transport = $transport;
    }

    /**
      * Accessor to get Departure location
      * 
      * @return string  Departure Location
      */
    public function getFrom() 
    {
        return $this->_from;
    }

    /**
      * Accessor to get Destination location
      * 
      * @return string  Destination
      */
    public function getTo() 
    {
        return $this->_to;
    }

    /**
      * Accessor to get Description
      * 
      * @return string  Description
      */
    public function getDescription() 
    {
        return $this->_transport->getDescription();
    }
}