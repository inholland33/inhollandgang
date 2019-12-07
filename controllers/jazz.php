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
    }

    public function getPropperties()
    {
        $text[0] = $this->headTitel;
        $text[1] = $this->headOndertitel;
        $text[2] = $this->inleidingTitel;
        $text[3] = $this->inleidingOndertitel;
        return $text;
    }

    public function index()
    {
        $this->view->title = 'Jazz';
        $this->view->content = $this->dal->content();
        $this->view->render('jazz/index');
    }

    public function chopText()
    {
    }

}