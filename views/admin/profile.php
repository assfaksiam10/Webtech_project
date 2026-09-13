<?php
session_start();
if(isset($_SESSION["userId"]) && isset($_SESSION["role"]))
{
    if($_SESSION["role"]=="admin")
    {

    }
    else
    {
        header("Location: ../login.php");
    }
}

else
{
    header("Location: ../login.php");
}

require_once "../../models/usersModel.php";

$user=getUserById($_SESSION["userId"]);
?>


<!doctype html>
<html>

<head>
    <title>Profile</title>
    <link rel="stylesheet" href="../css/style.css">
    <script src="js/adminDashboardJs.js" defer></script>
</head>

<body>
    <div class="layout">

        <div class="sidebar">
            <h3 class="roleTitle roleAdmin">Admin</h3>
            <a href="adminDashboard.php">Dashboard</a>
            <a href="manageAdmin.php">Add / Remove Admin</a>
            <a href="manageFaculty.php">Add / Remove Faculty</a>
            <a href="manageStudent.php">Add / Remove Student</a>
            <a href="profile.php">Profile</a>
            <a href="changePassword.php">Change Password</a>
            <button id="logoutBtn" class="logoutBtn">Logout</button>
        </div>

        <div class="main">
            <div class="panel">
                <h2>Profile</h2>
                <table>
                    <tr><th>User Id</th><td><?php echo $user["userId"]; ?></td></tr>
                    <tr><th>Name</th><td><?php echo $user["name"]; ?></td></tr>
                    <tr><th>Email</th><td><?php echo $user["email"]; ?></td></tr>
                    <tr><th>Role</th><td><?php echo $user["role"]; ?></td></tr>
                </table>
            </div>
        </div>

    </div>
</body>

</html>