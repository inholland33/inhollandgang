<?php


class historic_dal extends Dal
{
    public function __construct()
    {
        $this->db = parent::getInstance()->getConnection();
    }

    public function content()
    {
        return $this->db->selectOne('SELECT text FROM content WHERE page LIKE "historic"');
    }


}