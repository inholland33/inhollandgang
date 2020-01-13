<?php

class Note extends Controller
{

    public function __construct()
    {
        parent::__construct();
        Auth::handleLogin();
        $this->view->css = array('public/css/cms.css');
    }

    public function index()
    {
        $this->view->noteList = $this->dal->noteList();
        $this->view->render('note/index');
    }

    public function create()
    {
        $data = array(
            'title' => $_POST['title'],
            'content' => $_POST['content']
        );
        $this->dal->create($data);
        header('location: ' . URL . 'note');
    }

    public function edit($id)
    {
//        $this->view->note = $this->dal->noteSingleList($id);

        if (empty($this->view->note)) {
            die('This is an invalid note!');
        }

        $this->view->render('note/edit');
    }

    public function editSave($noteid)
    {
        $data = array(
            'noteid' => $noteid,
            'title' => $_POST['title'],
            'content' => $_POST['content']
        );

        // @TODO: Do your error checking!

        $this->dal->editSave($data);
        header('location: ' . URL . 'note');
    }

    public function delete($id)
    {
        $this->dal->delete($id);
        header('location: ' . URL . 'note');
    }
}