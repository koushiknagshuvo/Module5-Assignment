<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get user input
    $userName = $_POST['username'] ?? "";
    $email = $_POST['email'] ?? "";
    $password = $_POST['password'] ?? "";

    $errorMessage = "";

    if (!empty($userName) && !empty($email) && !empty($password)) {
        $fp = fopen("./database/users.txt", "a");
        fwrite($fp, "\nuser, {$email}, {$password}, {$userName}");
        fclose($fp);

        header("Location: login.php");
    } else {
        $errorMessage = "Please enter full details";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <link rel="stylesheet" href="/css/style.css">

</head>

<body>
    <div class="container">
        <div class=" p-3 mb-5 bg-body-tertiary rounded">
            <div class="card" style="width: 30rem;">
                <div class="card-body">
                    <div class="mb-3">
                        <h5>Create An Account</h5>
                    </div>
                    <form method="post" action="">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Username</span>
                            <input type="text" name="username" class="form-control" placeholder="Enter your last name"
                                aria-label="Username" aria-describedby="basic-addon1">
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Email
                            </span>
                            <input type="email" name="email" class="form-control" placeholder="example@gmail.com"
                                aria-label="Username" aria-describedby="basic-addon1">
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Password </span>
                            <input type="password" name="password" class="form-control" placeholder="******"
                                aria-label="Username" aria-describedby="basic-addon1">
                        </div>

                        <button type="submit" class="btn btn-primary mt-3 mb-3 mybutton">Sign Up</button>
                        <div>
                            <p>Already have an <a href="login.php">Account ?</a></p>
                        </div>
                        <div>
                            <p> <?php echo $errorMessage ?> </a></p>
                        </div>
                    </form>

                    <div id="result" class="text-danger">
                        <?php
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            // Get user input

                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>