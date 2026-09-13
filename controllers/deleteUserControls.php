<?php
require_once "../models/usersModel.php";
session_start();

$userId=$_GET["userId"];
$role=$_GET["role"];

if(deleteUser($userId))
{
    header("Location: ../views/admin/manage".ucfirst($role).".php?msg=".ucfirst($role)." removed");
}
else
{
    header("Location: ../views/admin/manage".ucfirst($role).".php?msg="."Could not remove user");
}


?>