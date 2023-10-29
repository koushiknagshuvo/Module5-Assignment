<?php

session_start();

$Messages = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get user input
    $email = $_POST['email'];
    $password = $_POST['password'];
    $submitBTN = $_POST['submit'];
}

$fp = fopen("./database/users.txt", "r");

// arrays
$roles = [];
$emails = [];
$passwords = [];
$userName = [];

// while loop for get all data
while ($line = fgets($fp)) {
    $values = explode(",", $line);
    $roles[] = trim($values[0]);
    $emails[] = trim($values[1]);
    $passwords[] = trim($values[2]);
    $userName[] = trim($values[3]);
}

fclose($fp);

for ($i = 0; $i < count($roles); $i++) {
    if ($email == $emails[$i] && $password == $passwords[$i]) {
        $_SESSION['role'] = $roles[$i];
        $_SESSION['email'] = $emails[$i];
        $_SESSION['username'] = $userName[$i];
        header("Location: index.php");
    } else {
        $Messages = "Wrong Password";
    }
}




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <style>
    .container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    .mybutton {
        width: 100%;
    }
    </style>

    <link rel="stylesheet" href="/css/style.css">
</head>

<body>
    <div class="container">
        <div class=" p-3 mb-5 ">
            <div class="card" style="width: 30rem;">
                <div class="card-body">
                    <div class="mb-3">
                        <h5>User Login</h5>
                    </div>
                    <form method="post" action="">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Email</span>
                            <input type="email" name="email" class="form-control" placeholder="example@gmail.com"
                                aria-label="Username" aria-describedby="basic-addon1">
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Password</span>
                            <input type="password" name="password" class="form-control" placeholder="******"
                                aria-label="Username" aria-describedby="basic-addon1">
                        </div>

                        <button type="submit" class="btn btn-primary mt-3 mb-3 mybutton">Login</button>
                        <div class='text-center'>
                            <p>Don't have an account ? <a href="signup.php">sign up</a></p>
                        </div>
                    </form>

                    <div id="result" class="text-danger">
                        <?php echo "<center> {$Messages} </center>"; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>