<?php

class Dashboard_Dal extends Dal
{

    public function __construct()
    {
        $this->db = parent::getInstance()->getConnection();
    }

    public function xhrInsert()
    {
        $text = $_POST['text'];

        $this->db->insert('content', array('text' => $text));

        $data = array('text' => $text, 'id' => $this->db->lastInsertId());
        echo json_encode($data);
        exit;
    }

    public function xhrGetListings()
    {
        $result = $this->db->selectAll("SELECT * FROM content");
        echo json_encode($result);
    }

    public function xhrDeleteListing()
    {
        $id = (int)$_POST['id'];
        $this->db->delete('content', "content_id = '$id'");
    }
}