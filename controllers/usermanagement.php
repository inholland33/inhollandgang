<?php

class UserManagement extends Controller
{

    function __construct()
    {
        parent::__construct();

    }

    public function index()
    {
        $password = Hash::create('sha256', 'test', HASH_PASSWORD_KEY);
        echo $password;
    }
}