<?php

class User extends Controller
{

    public function __construct()
    {
        parent::__construct();
        Auth::handleLogin();

    }

    public function index()
    {
        $this->view->title = 'User';
        $this->view->userList = $this->model->userList();
        $this->view->render('user/index');
    }

    public function create()
    {
        $data = array();
        $data['name'] = $_POST['username'];
        $data['password'] = $_POST['password'];
        $data['rank'] = $_POST['rank'];

        $this->model->create($data);
        header('location: ' . URL . 'user');
    }

    public function edit($userid)
    {
        $this->view->title = 'User: Edit';
        $this->view->user = $this->model->userSingleList($userid);
        $this->view->render('user/edit');
    }

    public function editSave($userid)
    {
        $data = array();
        $data['user_id'] = $userid;
        $data['name'] = $_POST['username'];
        $data['password'] = $_POST['password'];
        $data['rank'] = $_POST['rank'];

        // @TODO: Do your error checking!

        $this->model->editSave($data);
        header('location: ' . URL . 'user');
    }

    public function delete($userid)
    {
        $this->model->delete($userid);
        header('location: ' . URL . 'user');
    }
}