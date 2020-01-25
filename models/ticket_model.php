<?php
/**
 * Created by PhpStorm.
 * User: sande
 * Date: 1/10/2020
 * Time: 8:24 PM
 */

class Ticket_Model extends Model
{
    private $id;
    private $event;
    private $name;
    private $type;
    private $price;
    private $stock;
    private $dateTime;

    public function __construct($id, $event, $name, $dateTime, $type, $price, $stock)
    {
        parent::__construct();

        $this->id = $id;
        $this->event = $event;
        $this->name = $name;
        $this->dateTime = $dateTime;
        $this->type = $type;
        $this->price = $price;
        $this->stock = $stock;

    }

}