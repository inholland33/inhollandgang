<?php
require_once 'db.php';

class Ticket_DAL extends db
{
    function getTicketsByType($type)
    {

        $sql = "SELECT ticket_id, event, venue, date_time, price, stock, img FROM ticket WHERE type= :type";
        $stmt = $this->dbconnenct()->prepare($sql);
        $stmt->execute(['type'=>$type]);
        $data = array();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
        {
            $data[] = $row;
        }
        return $data;

    }
    function getTicketsByTypeAndDate($type, $day)
    {

        $sql = "SELECT ticket_id, event, venue, date_time, price, stock, img FROM ticket WHERE type= :type AND date_time LIKE '%:day%'";
        $stmt = $this->dbconnenct()->prepare($sql);
        $stmt->execute(['type'=>$type, 'day'=>$day]);
        $data = array();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
        {
            $data[] = $row;
        }
        return $data;

    }
    function insertTicketOrder()
    {
        $sql = 'INSERT INTO ticket_order (ticket) VALUES ()';
    }
}