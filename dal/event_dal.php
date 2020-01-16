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

    public function asyncGetListings($sql, $params = array())
    {
        $result = $this->db->selectAll($sql, $params);
        echo json_encode($result);

    }

    public function asyncEdit($table, $id, $data)
    {
        $where = "content_id = :id";
        $whereParams = array("id" => $id);

        $row = $this->db->update($table, $data, $where, $whereParams);
        echo json_encode($row);
    }

    public function asyncDeleteListing($tables, $where, $params)
    {
        $this->db->delete($tables, $where, $params);
    }
}