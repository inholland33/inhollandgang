<?php

class User_Model extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function userList()
    {
        return $this->db->selectAll('SELECT user_id, name, rank FROM user');

        /*$sth = $this->db->prepare('SELECT userid, login, role FROM user');
        $sth->execute();
        return $sth->fetchAll();*/
    }

    public function userSingleList($userid)
    {
        return $this->db->selectOne('SELECT user_id, name, rank FROM user WHERE user_id = :user_id', array(':user_id' => $userid));

        /*$sth = $this->db->prepare('SELECT userid, login, role FROM user WHERE userid = :userid');
        $sth->execute(array(':userid' => $userid));
        $sth->fetch();*/
    }

    public function create($data)
    {
        $this->db->insert('user', array(
            'name' => $data['name'],
            'password' => Hash::create('sha256', $data['password'], HASH_PASSWORD_KEY),
            'rank' => $data['rank']
        ));
    }

    public function editSave($data)
    {
        $postData = array(
            'name' => $data['name'],
            'password' => Hash::create('sha256', $data['password'], HASH_PASSWORD_KEY),
            'rank' => $data['rank']
        );

        $this->db->update('user', $postData, "`user_id` = {$data['user_id']}");
    }

    public function delete($userid)
    {
        $sth = $this->db->prepare('SELECT rank FROM user WHERE user_id = :user_id');
        $sth->execute(array(':user_id' => $userid));
        $data = $sth->fetch();
        if ($data['rank'] == 'owner') {
            return false;
        }


        $this->db->delete('user', "user_id = $userid");

        /*$sth = $this->db->prepare('DELETE FROM user WHERE userid = :userid');
        $sth->execute(array(
            ':userid' => $userid
        ));*/
    }
}