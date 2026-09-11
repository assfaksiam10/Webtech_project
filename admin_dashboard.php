<?php
require_once "../Controller/AdminDashboardController.php";
?>

<!DOCTYPE html>
<html>

<head>

    <title>Admin Dashboard</title>

    <!-- External CSS -->
    <link rel="stylesheet" href="../css/style.css">

</head>

<body>

<div class="layout">

    <div class="main">

        <!-- Welcome -->
        <h2 class="welcome">
            Welcome Back, Admin
        </h2>


        <!-- Dashboard Cards -->
        <div class="cards">

            <div class="card">
                <div class="label">Total Students</div>

                <div class="value">
                    <?php echo $students; ?>
                </div>
            </div>


            <div class="card">
                <div class="label">Total Faculty</div>

                <div class="value">
                    <?php echo $faculties; ?>
                </div>
            </div>


            <div class="card">
                <div class="label">Courses</div>

                <div class="value">
                    <?php echo $courses; ?>
                </div>
            </div>


            <div class="card">
                <div class="label">Departments</div>

                <div class="value">
                    <?php echo $depts; ?>
                </div>
            </div>

        </div>


        <!-- All Users -->
        <div class="panel">

            <h2>All Users</h2>

            <table>

                <tr>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Role</th>
                </tr>


                <?php foreach ($users as $user): ?>

                    <tr>

                        <td>
                            <?php echo $user["username"]; ?>
                        </td>

                        <td>
                            <?php echo $user["email"]; ?>
                        </td>

                        <td>
                            <?php echo ucfirst($user["role"]); ?>
                        </td>

                    </tr>

                <?php endforeach; ?>

            </table>

        </div>

    </div>

</div>

</body>

</html>