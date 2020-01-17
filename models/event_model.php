<?php
/**
 * Created by PhpStorm.
 * User: sande
 * Date: 12/5/2019
 * Time: 7:28 PM
 */

class Event_Model extends Model
{
    private $id;
    private $name;

    public function __construct($id, $name)
    {
        parent::__construct();

        $this->id = $id;
        $this->name = $name;
    }
}