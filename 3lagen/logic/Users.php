<?php


class User extends UserDAL
{
    protected function getUser($username)
    {
        $sql = "SELECT user, password FROM user WHERE user = :username";
        $stmt = $this->dbconnenct()->prepare($sql);
        $stmt->execute(['username' => $username]);
        while ($row = $stmt->fetch()){
            $user = $row['user'];
        }
        return $user;
    }
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