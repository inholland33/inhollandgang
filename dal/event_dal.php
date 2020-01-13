<?php

class Event_Dal extends Dal
{

    public function __construct()
    {
        $this->db = parent::getInstance()->getConnection();
    }

    public function asyncInsert()
    {
        $text = $_POST['text'];

        $this->db->insert('content', array('text' => $text));

        $data = array('text' => $text, 'id' => $this->db->lastInsertId());
        echo json_encode($data);
        exit;
    }

    public function asyncGetListings($tables, $where, $params)
    {

        $result = $this->db->selectAll("SELECT T.ticket_id, T.name AS ticketName, T.type, T.price, T.stock, T.start_date_time, T.end_date_time, A.name AS artistName 
          FROM $tables[0] AS T 
          JOIN $tables[1] AS TA ON T.ticket_id = TA.ticket_id  
          JOIN $tables[2] AS A ON TA.artist_id = A.artist_id
          WHERE $where ORDER BY T.ticket_id", $params);
        echo json_encode($result);

    }

    public function asyncEdit($table, $id, $data)
    {
        $where = "content_id = :id";
        $whereParams = array("id" => $id);

        $row = $this->db->update($table, $data, $where, $whereParams);
        echo json_encode($row);
    }

    public function asyncDeleteListing()
    {
        $id = (int)$_POST['id'];
        $this->db->delete('content', "content_id = '$id'");
    }
}