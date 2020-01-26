<?php
/**
 * Created by PhpStorm.
 * User: sande
 * Date: 1/10/2020
 * Time: 8:34 PM
 */

class Order_Model extends Model
{
    private $id;
    private $userId;
    private $totalPrice;
    private $dateTime;

    public function __construct($id, $userId, $totalPrice, $dateTime)
    {
        parent::__construct();

        $this->id = $id;
        $this->userId = $userId;
        $this->totalPrice = $totalPrice;
        $this->dateTime = $dateTime;

    }
}