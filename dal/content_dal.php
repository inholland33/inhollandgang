<?php

class Content_Dal extends Dal
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

    public function asyncGetListings($table, $where, $params)
    {
        $result = $this->db->selectAll("SELECT * FROM $table WHERE $where", $params);
        echo json_encode($result);

    }

    public function asyncEdit($table, $data, $id)
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