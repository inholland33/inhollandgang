<?php
require 'DB.php';
require '../content.model.php';

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
                    default:
                        break;
                }
            }
            return $this->contentModel;
        }
    }
}