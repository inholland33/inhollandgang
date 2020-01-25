<?php
//require_once 'db.php';

class User_DAL extends DB
{
    protected function addUser($name, $email, $password, $dateOfBirth, rank)
    {
        $sql = "INSERT INTO user (user, email, password, date_of_birth, rank) VALUES (:username, :email, :password)";
        $stmt = $this->dbconnenct()->prepare($sql);
        $stmt->execute(['name' => $name, 'email'=> $email, 'password' =>$password,'dateofbirth'=> $dateOfBirth]);
        return;
    }
}