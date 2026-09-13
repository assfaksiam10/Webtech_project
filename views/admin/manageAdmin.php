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

$adminList=getUsersByRole("admin");
?>


<!doctype html>
<html>

<head>
    <title>Manage Admin</title>
    <link rel="stylesheet" href="../css/style.css">
    <script src="js/adminDashboardJs.js" defer></script>
</head>

<body>
    <div class="layout">

        <div class="sidebar">
            <h3 class="roleTitle roleAdmin">Admin</h3>
            <a href="adminDashboard.php">Dashboard</a>
            <a href="manageAdmin.php">Add / Remove Admin</a>
            <a href="manageAdmin.php">Add / Remove Admin</a>
            <a href="manageStudent.php">Add / Remove Student</a>
            <a href="profile.php">Profile</a>
            <a href="changePassword.php">Change Password</a>
            <button id="logoutBtn" class="logoutBtn">Logout</button>
        </div>

        <div class="main">

            <div class="panel">
                <h2>Add New Admin</h2>
                <span>
                    <?php
                        if(isset($_GET["msg"]))
                            {
                                echo $_GET["msg"];
                            }
                    ?>
                </span>
                <form action="../../controllers/addUserControls.php" method="post">
                    <input type="hidden" name="role" value="admin">

                    <label for="userId">User Id:</label>
                    <input type="text" name="userId" id="userId"><br>

                    <label for="name">Full Name:</label>
                    <input type="text" name="name" id="name"><br>

                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email"><br>

                    <label for="pass">Password:</label>
                    <input type="password" name="pass" id="pass"><br>

                    <input type="submit" name="submit" value="Add Admin" class="btnOrange">
                </form>
            </div>

            <div class="panel">
                <h2>Existing Admin</h2>
                <table>
                    <tr>
                        <th>User Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                    <?php
                        while($row=mysqli_fetch_assoc($adminList))
                        {
                            echo "<tr>";
                            echo "<td>".$row["userId"]."</td>";
                            echo "<td>".$row["name"]."</td>";
                            echo "<td>".$row["email"]."</td>";
                            echo "<td><a href='../../controllers/deleteUserControls.php?userId=".$row["userId"]."&role=admin'><button class='btnRemove'>Remove</button></a></td>";
                            echo "</tr>";
                        }
                    ?>
                </table>
            </div>

        </div>

    </div>
</body>

</html>