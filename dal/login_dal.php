<?php

class Login_Dal extends Dal
{
    public function __construct()
    {
        $this->db = parent::getInstance()->getConnection();
    }

    public function run()
    {
        $sth = $this->db->prepare("SELECT user_id, name, rank FROM user WHERE 
				name = :name AND password = :password");
        $sth->execute(array(
            ':name' => $_POST['username'],
            ':password' => Hash::create('sha256', $_POST['password'], HASH_PASSWORD_KEY)
        ));

        return $sth;
    }

}