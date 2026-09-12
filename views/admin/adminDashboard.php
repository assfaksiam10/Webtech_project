<?php
session_start();
if(isset($_SESSION["userId"]) && isset($_SESSION["role"]))
{
    if($_SESSION["role"]=="admin")
    {

    }
    else if($_SESSION["role"]=="faculty")
    {
        header("Location: ../faculty/facultyDashboard.php");
    }
    else if($_SESSION["role"]=="student")
    {
        header("Location: ../student/studentDashboard.php");
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
require_once "../../models/coursesModel.php";

$totalStudents=countByRole("student");
$totalFaculty=countByRole("faculty");
$totalCourses=countCourses();

$allUsers=getUsersByRole("student");
?>


<!doctype html>
<html>

<head>
    <title>Admin Dashboard</title>
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
            <h1>Welcome admin, <?php echo $_SESSION["userId"]; ?></h1>

            <div class="cards">
                <div class="card">
                    <div class="label">Total Students</div>
                    <div class="value"><?php echo $totalStudents; ?></div>
                </div>
                <div class="card">
                    <div class="label">Total Faculty</div>
                    <div class="value"><?php echo $totalFaculty; ?></div>
                </div>
                <div class="card">
                    <div class="label">Total Courses</div>
                    <div class="value"><?php echo $totalCourses; ?></div>
                </div>
            </div>

            <div class="panel">
                <h2>All Students</h2>
                <table>
                    <tr>
                        <th>User Id</th>
                        <th>Name</th>
                        <th>Email</th>
                    </tr>
                    <?php
                        while($row=mysqli_fetch_assoc($allUsers))
                        {
                            echo "<tr>";
                            echo "<td>".$row["userId"]."</td>";
                            echo "<td>".$row["name"]."</td>";
                            echo "<td>".$row["email"]."</td>";
                            echo "</tr>";
                        }
                    ?>
                </table>
            </div>
        </div>

    </div>
</body>

</html>