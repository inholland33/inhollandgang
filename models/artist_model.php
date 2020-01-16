<?php
/**
 * Created by PhpStorm.
 * User: sande
 * Date: 1/10/2020
 * Time: 8:24 PM
 */

class Artist_Model extends Model
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