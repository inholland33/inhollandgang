<?php
/**
 * Created by PhpStorm.
 * User: sande
 * Date: 1/11/2020
 * Time: 1:33 PM
 */

class ticket_order_model extends Model
{
    private $id;
    private $ticket;
    private $amount;
    private $numberOfAdults;
    private $numberOfChildren;

    public function __construct($id, $ticket, $amount, $numberOfAdults, $numberOfChildren)
    {
        parent::__construct();

        $this->id = $id;
        $this->ticket = $ticket;
        $this->amount = $amount;
        $this->numberOfAdults = $numberOfAdults;
        $this->numberOfChildren = $numberOfChildren;
    }

}