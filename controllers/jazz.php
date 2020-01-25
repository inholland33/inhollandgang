<?php


class jazz extends Controller
{
    private $headTitel = null;
    private $headOndertitel = null;
    private $inleidingTitel = null;
    private $inleidingOndertitel = null;

    function __construct()
    {
        parent::__construct();
        $this->view->css = array('public/css/default.css');

    }

    public function getContent($type)
    {
        return $this->view->content = $this->dal->content($type);
    }

    public function index()
    {
        $this->view->title = 'Jazz';
        $this->view->render('jazz/index');
    }

    public function chopText()
    {
    }

}