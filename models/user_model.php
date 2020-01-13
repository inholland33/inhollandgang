<?php
/**
 * Created by PhpStorm.
 * User: sande
 * Date: 12/5/2019
 * Time: 7:28 PM
 */

class User_Model extends Model
{
    public $id;
    public $email;
    public $name;
    public $password;
    public $dateOfBirth;
    public $dateOfRegistration;
    public $rank;

    public function __construct($id, $email, $name, $password, $dateOfBirth, $dateOfRegistration, $rank)
    {
        parent::__construct();

        $this->id = $id;
        $this->email = $email;
        $this->name = $name;
        $this->password = $password;
        $this->dateOfBirth = $dateOfBirth;
        $this->dateOfRegistration = $dateOfRegistration;
        $this->rank = $rank;
    }

}