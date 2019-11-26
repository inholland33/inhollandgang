<?php

class Dashboard_Model extends Model
{

    public function __construct()
    {
        parent::__construct();
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