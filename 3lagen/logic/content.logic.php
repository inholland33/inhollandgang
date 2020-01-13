<?php
require '../DAL/content.dal.php';

class ContentLogic
{
    public $content;

    private $contentDal;

    function __construct()
    {
        $this->contentDal = new ContentDal();
        $this->content = new ContentModel();
    }

    function GetContentJazzPage()
    {
        $this->content = $this->contentDal->GetContent("jazz");
    }

    function GetContentDancePage(){
        $this->content = $this->contentDal->GetContent("dance");
    }

}