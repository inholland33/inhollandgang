<?php

class Login extends Controller
{

    function __construct()
    {
        parent::__construct();
        $this->view->css = array('public/css/default.css');
    }

    function index()
    {
        //echo Hash::create('sha256', 'jonathan', HASH_PASSWORD_KEY);
        $this->view->title = 'Login';
        $this->view->render('login/index');
    }

    function run()
    {
        $result = $this->dal->run();
        $data = $result->fetch();
        $count = $result->rowCount();

        if ($count > 0) {
            $this->loadModel("user");
            $user = (object)["id" => $data['user_id'], "name" => $data['name'], "rank" => $data['rank']];
            // Create sessions
            Session::init();
            Session::set('user', $user);
            Session::set('loggedIn', true);
            if ($_SESSION['user']->rank != 'customer') {
                header('location: ' . URL . 'dashboard');

            } else header('location: ' . URL);

        } else {
            header('location: ../login');
        }

    }


}