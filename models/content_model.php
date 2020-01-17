<?php
/**
 * Created by PhpStorm.
 * User: sande
 * Date: 12/5/2019
 * Time: 7:28 PM
 */

class Content_Model extends Model
{
    private $id;
    private $page;
    private $type;
    private $text;

    public function __construct($id, $page, $type, $text)
    {
        parent::__construct();

        $this->id = $id;
        $this->page = $page;
        $this->type = $type;
        $this->text = $text;
    }

}