<?php

$need_role = "admin";

include "../includes/auth_check.php";
include "../config/db.php";

require_once "../Model/ManageStudentModel.php";

$role = "admin";

$message = "";

// Create Model object
$model = new ManageStudentModel($conn);


// =========================
// ADD STUDENT
// =========================

if (isset($_POST["submit"])) {

    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    if ($model->addStudent($username, $email, $password)) {

        $message = "<p class='success'>Student added.</p>";

    } else {

        $message = "<p class='error'>Could not add (email may exist).</p>";
    }
}


// =========================
// REMOVE STUDENT
// =========================

if (isset($_GET["remove"])) {

    $id = $_GET["remove"];

    if ($model->removeStudent($id)) {

        $message = "<p class='success'>Student removed.</p>";

    } else {

        $message = "<p class='error'>Could not remove student.</p>";
    }
}


// =========================
// GET EXISTING STUDENTS
// =========================

$students = $model->getAllStudents();