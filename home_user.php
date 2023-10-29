<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
}

if ($_SESSION['role'] == "admin") {
    header("Location: home_admin.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $_SESSION['role']; ?></title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>

    <div class="main-container d-flex">
        <div class="sidebar" id="side_nav">
            <div class="header-box px-2 pt-3 pb-4 d-flex justify-content-between">
                <h1 class="fs-4"><img class="w-50 mx-3" src="/asset/logo.png" alt="Ostad">
                    <button class="btn d-md-none d-block close-btn px-1 py-0 text-white"><i class="fal fa-stream"></i></button>
            </div>

            <ul class="list-unstyled px-2">
                <li class="active"><a href="#Dashboard" class="text-decoration-none px-3 py-2 d-block">
                        <i class="fal fa-home mx-3"></i> Dashboard</a></li>

            </ul>
            <hr class="h-color mx-2">

            <ul class="list-unstyled px-2">
                <li class=""><a href="logout.php" class="text-decoration-none px-3 py-2 d-block text-dark">
                        <i class="fal fa-user mx-3"></i> Log Out</a></li>

            </ul>

        </div>
        <div class="content">
            <nav class="navbar navbar-expand-md navbar-light bg-light">
                <div class="container-fluid">
                    <div class="d-flex justify-content-between d-md-none d-block">
                        <button class="btn px-1 py-0 open-btn me-2"><i class="fal fa-stream"></i></button>
                        <a class="navbar-brand fs-4" href="#"><span class="bg-dark rounded px-2 py-0 text-white">CL</span></a>

                    </div>
                    <button class="navbar-toggler p-0 border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fal fa-bars"></i>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                        <ul class="navbar-nav mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#">Profile</a>
                            </li>

                        </ul>

                    </div>
                </div>
            </nav>

            <div class="dashboard-content px-3 pt-4">
                <h2 class="fs-5 mb-4" id="Dashboard"> User Dashboard</h2>
                <div class="card">
                    <div class="card-header">User Details</div>
                    <div class="card-body">
                        <h5 class="card-title">Name: <?php echo $_SESSION['username'] ?></h5>
                        <h5 class="card-title">Role: <?php echo $_SESSION['role']; ?></h5>
                        <p class="card-text">Email Address is : <?php echo $_SESSION['email']; ?> </p>
                    </div>
                </div>

                <div class="card mt-4 p-2">
                    <h2 class="fs-5 mt-4" id="UserList"> User Lists</h2>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Username</th>
                                <th scope="col">Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $userfp = fopen("./database/users.txt", "r");
                            $userserial = 1;
                            while ($line = fgets($userfp)) {
                                $usersValues = explode(",", $line);
                                $userRoles = trim($usersValues[0]);
                                $userEmail = trim($usersValues[1]);
                                $UserUsserNmae = trim($usersValues[3]);

                                if ($userRoles == "user") {
                                    echo "<tr>
                                <th scope='row'>{$userserial}</th>
                                <td> {$UserUsserNmae} </td>
                                <td>{$userEmail}</td>
                                </tr>";

                                    $userserial++;
                                }
                            }

                            //fclose($userfp);
                            ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</body>

</html>