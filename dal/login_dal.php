<?php

class Login_Dal extends Dal
{
    public function __construct()
    {
        $this->db = parent::getInstance()->getConnection();
    }

    public function run()
    {
        $sth = $this->db->prepare("SELECT user_id, rank FROM user WHERE 
				name = :name AND password = :password");
        $sth->execute(array(
            ':name' => $_POST['username'],
            ':password' => Hash::create('sha256', $_POST['password'], HASH_PASSWORD_KEY)
        ));

        $data = $sth->fetch();

        $count = $sth->rowCount();
        if ($count > 0) {
            // login
            Session::init();
            Session::set('rank', $data['rank']);
            Session::set('loggedIn', true);
            Session::set('user_id', $data['user_id']);
            header('location: ../dashboard');
        } else {
            header('location: ../login');
        }

    }

}