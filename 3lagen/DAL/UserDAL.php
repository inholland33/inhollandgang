<?php
//require_once 'db.php';

class UserDAL extends DB
{
    protected function getUser($username)
    {
        $user ='';
        $sql = "SELECT name FROM user WHERE name = :username";
        $stmt = $this->dbconnenct()->prepare($sql);
        $stmt->execute(['username' => $username]);
        while ($row = $stmt->fetch()){
            $user = $row['user'];
        }
        return $user;
    }
    protected function addUser($name, $email, $password, $dateOfBirth, $rank)
    {
        $sql = "INSERT INTO user (name, email, password, date_of_birth, rank) VALUES (:name, :email, :password, :dateofbirth, :rank)";
        $stmt = $this->dbconnenct()->prepare($sql);
        $stmt->execute(['name' => $name, 'email'=> $email, 'password' =>$password,'dateofbirth'=> $dateOfBirth, 'rank'=>$rank]);
        return;
    }

}