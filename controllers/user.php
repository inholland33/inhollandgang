<?php

class User extends Controller
{

    public function __construct()
    {
        parent::__construct();
        Auth::handleLogin();

        $this->view->css = array('public/css/cms.css');
        $this->view->js = array('public/js/cms.js');
        $this->view->user = $_SESSION['user']->name;

    }

    public function index()
    {
        $this->view->title = 'User Management';
        $this->view->userList = $this->dal->userList();
        $this->view->render('user/index', true);
    }

    public function create()
    {
        $data = array();
        $data['name'] = $_POST['username'];
        $data['password'] = $_POST['password'];
        $data['rank'] = $_POST['rank'];

        $this->dal->create($data);
        header('location: ' . URL . 'user');
    }

    public function edit($userid)
    {
        $this->view->title = 'User: Edit';
        $this->view->user = $this->dal->userSingleList($userid);
        $this->view->render('user/edit', true);
    }

    public function editSave($userid)
    {
        $data = array();
        $data['user_id'] = $userid;
        $data['name'] = $_POST['username'];
        $data['password'] = $_POST['password'];
        $data['rank'] = $_POST['rank'];

        // @TODO: Do your error checking!

        $this->dal->editSave($data);
        header('location: ' . URL . 'user');
    }

    public function delete($userid)
    {
        $this->dal->delete($userid);
        header('location: ' . URL . 'user');
    }
}