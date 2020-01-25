<?php
require_once '../DAL/db.php';
include '../DAL/UserDAL.php';
include '../logic/Users.php';
$users = new Users();
if (isset($_POST['register']))
{
    $username = $_POST['username'];
    $email = $_POST['email'];
    $dateOfBirth = $_POST['dateOfBirth'];
    $password = $_POST['password'];
    $passwordRepeat = $_POST['password-repeat'];
    $rank = $_POST['rank'];

    if (empty($username) || empty($email) || empty($password) || empty($passwordRepeat) || empty($dateOfBirth) || empty($rank))
    {
        header("Location: ../interface/register.php?error=emptyfields&username=".$username."&email=".$email);
        exit();
    }
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        header("Location: ../interface/register.php?error=invalidemail&username=".$username);
        exit();
    }
    elseif ($password != $passwordRepeat)
    {
        header("Location: ../interface/register.php?error=passwordnotequal&username=".$username."&email=".$email);
        exit();
    }
    else
    {
        if (!$users->usernameCheck($username)){
            header("Location: ../view/register.php?error=usernameunavaileble&email=".$email);
            exit();
        }
        else{
            $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
            $users->register($username, $email, $hashedPwd, $dateOfBirth, $rank);
            header("Location: ../interface/register.php?signup=success");
            exit();
        }
    }
}
else{
    header("Location: ../interface/ticketpage.php");
    exit();
}