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
?>


<!doctype html>
<html>

<head>
    <title>Change Password</title>
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
                <h2>Change Password</h2>
                <span>
                    <?php
                        if(isset($_GET["msg"]))
                            {
                                echo $_GET["msg"];
                            }
                    ?>
                </span>
                <form action="../../controllers/changePasswordControls.php" method="post">
                    <label for="currentPass">Current Password:</label>
                    <input type="password" name="currentPass" id="currentPass"><br>

                    <label for="newPass">New Password:</label>
                    <input type="password" name="newPass" id="newPass"><br>

                    <input type="submit" name="submit" value="Update Password" class="btnOrange">
                </form>
            </div>
        </div>

    </div>
</body>

</html>