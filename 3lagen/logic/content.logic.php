<?php
require '../DAL/content.dal.php';
$input = $_REQUEST['Search'];
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
    function GetContentFoodPage(){
        $this->content = $this->contentDal->GetContent("food");
    }
    function GetContentSearchPage(){
        global $input;
        $this->content = $this->contentDal->SearchContent("food");
    }
    function GetOrderSummary(){
        $this->content = $this->contentDal->OrderView($orders);
    }
}