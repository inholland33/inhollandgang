<?php

class Invoice_Dal extends Dal
{

    public function __construct()
    {
        $this->db = parent::getInstance()->getConnection();
    }

    public function create($data)
    {
        $result = $this->db->insert('ticket', $data[0], true);

        echo $result;
        foreach ($data[1]['artists'] as $artist) {
            $this->db->insert('ticket_artist', array(
                "artist_id" => $artist,
                'ticket_id' => $result
            ));
        }

    }

    public function getListings($sql, $params = array())
    {
        return $this->db->selectAll($sql, $params);

    }

    public function asyncGetListings($sql, $params = array())
    {
        $result = $this->db->selectAll($sql, $params);

        echo json_encode($result);
    }

    public function asyncReturnListings($sql, $params = array())
    {
        $result = $this->db->selectAll($sql, $params);

        return $result;
    }

    public function edit($table, $data, $changeArtist = true)
    {
        $where = "ticket_id = :ticket_id";
        $whereParams = array(":ticket_id" => $data[0]["ticket_id"]);

        $this->db->update($table, $data[0], $where, $whereParams);

        if ($changeArtist) {
            $this->db->delete('ticket_artist', $where, $whereParams, $limit = 999);

            foreach ($data[1]['artists'] as $artist) {
                $this->db->insert('ticket_artist', array(
                    "artist_id" => $artist,
                    'ticket_id' => $data[0]["ticket_id"]
                ));
            }
        }

    }

    public function asyncSwap($ticket1, $ticket2)
    {
        $table = "ticket";
        $where = "ticket_id = :ticket_id";
        $whereParams = array(":ticket_id" => $ticket1["ticket_id"]);

        $data = array("start_date_time" => $ticket2["start_date_time"],
            "end_date_time" => $ticket2["end_date_time"]);

        $this->db->update($table, $data, $where, $whereParams);
    }

    public function asyncDeleteListing($tables, $where, $params)
    {
        foreach ($tables as $table) {
            $this->db->delete($table, $where, $params, 999);
        }
    }

    function getEnum($table, $field)
    {
        $enum = $this->db->getEnum($table, $field);
        echo json_encode($enum);
    }
}
