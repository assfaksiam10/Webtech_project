<?php
require_once "../models/usersModel.php";
session_start();

if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $userId=$_POST["userId"];
    $name=$_POST["name"];
    $email=$_POST["email"];
    $pass=$_POST["pass"];
    $role=$_POST["role"];
    $hasErr=false;
    $err="";

    if(empty($userId) || empty($name) || empty($email) || empty($pass))
    {
        $hasErr=true;
        $err="All fields are required";
    }
    else if(checkUserId($userId))
    {
        $hasErr=true;
        $err="User Id already exists";
    }

    if($hasErr)
    {
        header("Location: ../views/admin/manage".ucfirst($role).".php?msg=".$err);
    }
    else
    {
        if(registerUser($userId, $name, $email, $pass, $role))
        {
            header("Location: ../views/admin/manage".ucfirst($role).".php?msg=".ucfirst($role)." added");
        }
        else
        {
            header("Location: ../views/admin/manage".ucfirst($role).".php?msg="."Could not add user");
        }
    }
}


?>