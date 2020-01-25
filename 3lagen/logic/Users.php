<?php


class Users extends UserDAL
{

    public function register($username, $email, $password, $dateOfBirth, $rank)
    {
        $this->addUser($username, $email, $password, $dateOfBirth, $rank);
        header("location: ../view/index.php");
    }
    public function usernameCheck($username)
    {
        if (empty($this->getUser($username)))
        {
            return true;
        }
        else {
            return false;
        }
    }
//    public function emailCheck($email)
//    {
//        if (empty($this->getUserByEmail($email)))
//        {
//            return false;
//        }
//        else {
//            return true;
//        }
//    }
}