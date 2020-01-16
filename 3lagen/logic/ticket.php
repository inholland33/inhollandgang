<?php
require_once '../DAL/Ticket_DAL.php';

class Ticket extends Ticket_DAL
{
    function loadTickets($type, $day1, $day2, $day3, $day4)
    {

        $allTickets = array();
        $ticketsDay1 = array();
        $ticketsDay2 = array();
        $ticketsDay3 = array();
        $ticketsDay4 = array();

        $tickets = $this->getTicketsByType($type);
        foreach ($tickets as $row)
        {
            $datetime = new DateTime($row['date_time']);
            switch ($datetime->format('Y-m-d'))
            {
                case $day1->format('Y-m-d'):
                    array_push($ticketsDay1, $row);
                    break;
                case $day2->format('Y-m-d'):
                    array_push($ticketsDay2, $row);
                    break;
                case $day3->format('Y-m-d'):
                    array_push($ticketsDay3, $row);
                    break;
                case $day4->format('Y-m-d'):
                    array_push($ticketsDay4, $row);
                    break;
            }

        }
        array_push($allTickets, $ticketsDay1, $ticketsDay2, $ticketsDay3, $ticketsDay4);
        return $allTickets;
    }
    function addTicketToCart()
    {

    }
}