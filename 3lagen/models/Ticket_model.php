<?php


class TicketModel
{
    public $ticketId;
    public $ticketName;
    public $ticketAmount;
    public $ticketPrice;

    function __construct($ticketId, $ticketName, $ticketAmount, $ticketPrice)
    {
        $this->ticketId = $ticketId;
        $this->ticketName = $ticketName;
        $this->ticketAmount = $ticketAmount;
        $this->ticketPrice = $ticketPrice;
    }

}