<?php
require 'DB.php';
require '../models/content.model.php';

class ContentDal extends DB
{
    private $contentModel;
    private $conn;
    function __construct()
    {
        $this->conn = $this->connect();
        $this->contentModel = new ContentModel();
    }

    function GetContent($page)
    {
        $content[] = "";
        $type[] = "";
        $counter = 0;
        $query = "SELECT text ,type FROM content WHERE page LIKE '".$page."'";
        $result = $this->conn->query($query);
        while($row = $result->fetch_assoc()){
            $content[$counter] = $row['text'];
            $type[$counter] = $row['type'];
            $counter ++;
        }
        if(empty($content)){
        header("Location: index.php?error=");
        exit();
        }else {
            foreach ($type as $key => $i) {
                switch ($i) {
                    case "title":
                        $this->contentModel->titel = $content[$key];
                        break;
                    case "onderTitle":
                        $this->contentModel->onderTitel = $content[$key];
                        break;
                    case "introTitle":
                        $this->contentModel->introTitle = $content[$key];
                        break;
                    case "intro":
                        $this->contentModel->intro = $content[$key];
                        break;
                    case "article1Title":
                        $this->contentModel->article1Title = $content[$key];
                        break;
                    case "article1":
                        $this->contentModel->article1 = $content[$key];
                        break;
                    case "article2Title":
                        $this->contentModel->article2Title = $content[$key];
                        break;
                    case "article2":
                        $this->contentModel->article2 = $content[$key];
                        break;
                    case "article3Title":
                        $this->contentModel->article3Title = $content[$key];
                        break;
                    case "article3":
                        $this->contentModel->article3 = $content[$key];
                        break;
                    case "article4Title":
                        $this->contentModel->article4Title = $content[$key];
                        break;
                    case "article4":
                        $this->contentModel->article4 = $content[$key];
                        break;
                    case "article5Title":
                        $this->contentModel->article5Title = $content[$key];
                        break;
                    case "article5":
                        $this->contentModel->article5 = $content[$key];
                        break;
                    case "article6Title":
                        $this->contentModel->article6Title = $content[$key];
                        break;
                    case "article6":
                        $this->contentModel->article6 = $content[$key];
                        break;
                    case "article7Title":
                        $this->contentModel->article7Title = $content[$key];
                        break;
                    case "article7":
                        $this->contentModel->article7 = $content[$key];
                        break;
                    case "article8Title":
                        $this->contentModel->article8Title = $content[$key];
                        break;
                    case "article8":
                        $this->contentModel->article8 = $content[$key];
                        break;
                    default:
                        break;
                }
            }
            return $this->contentModel;
        }
    }
    function SearchContent($page)
    {
        $search[] = "";
        $type[] = "";
        $counter = 0;
        $query = "SELECT text ,FROM content WHERE (`text` LIKE '%".$page."%') OR (`page` LIKE '%'".$page."'%')";
        $result = $this->conn->query($query);
        while($row = $result->fetch_assoc()){
            $search[$counter] = $row['text'];
            $type[$counter] = $row['type'];
            $counter ++;
        }
        if(empty($search)){
            header("Location: index.php?error=");
            exit();
        }else {
            foreach ($type as $key => $i) {
                switch ($i) {
                    case "title":
                        $this->contentModel->titel = $search[$key];
                        break;
                    case "onderTitle":
                        $this->contentModel->onderTitel = $search[$key];
                        break;
                    case "introTitle":
                        $this->contentModel->introTitle = $search[$key];
                        break;
                    case "intro":
                        $this->contentModel->intro = $search[$key];
                        break;
                    case "article1Title":
                        $this->contentModel->article1Title = $search[$key];
                        break;
                    case "article1":
                        $this->contentModel->article1 = $search[$key];
                        break;
                    case "article2Title":
                        $this->contentModel->article2Title = $search[$key];
                        break;
                    case "article2":
                        $this->contentModel->article2 = $search[$key];
                        break;
                    case "article3Title":
                        $this->contentModel->article3Title = $search[$key];
                        break;
                    case "article3":
                        $this->contentModel->article3 = $search[$key];
                        break;
                    case "article4Title":
                        $this->contentModel->article4Title = $search[$key];
                        break;
                    case "article4":
                        $this->contentModel->article4 = $search[$key];
                        break;
                    case "article5Title":
                        $this->contentModel->article5Title = $search[$key];
                        break;
                    case "article5":
                        $this->contentModel->article5 = $search[$key];
                        break;
                    case "article6Title":
                        $this->contentModel->article6Title = $search[$key];
                        break;
                    case "article6":
                        $this->contentModel->article6 = $search[$key];
                        break;
                    case "article7Title":
                        $this->contentModel->article7Title = $search[$key];
                        break;
                    case "article7":
                        $this->contentModel->article7 = $search[$key];
                        break;
                    case "article8Title":
                        $this->contentModel->article8Title = $search[$key];
                        break;
                    case "article8":
                        $this->contentModel->article8 = $search[$key];
                        break;
                    default:
                        break;
                }
            }
            return $this->contentModel;
        }
    }
    function OrderView($orders){
        $content[] = "";
        $type[] = "";
        $counter = 0;
        while($row = $orders){
            $content[$counter] = $row['text'];
            $type[$counter] = $row['type'];
            $counter ++;
        }

        foreach ($type as $key => $i){
            $this->contentModel->article1Title = $content[$key];

        }
        return $this->contentModel;
    }
}