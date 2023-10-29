<?php

session_start();
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
}

if ($_SESSION['role'] == "user") {
    header("Location: login.php");
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $lineNumber = $_GET["data"];
}

$filename = "./database/users.txt";
$fp = fopen($filename, "r");

if ($fp) {
    $line = false;
    $currentLine = 0;

    while (($currentLine < $lineNumber) && ($line = fgets($fp)) !== false) {
        $currentLine++;
    }

    fclose($fp);
} else {
    echo "Failed to open the file.";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get user input
    $info = $_POST['info'];
    echo $info;

    $lineNumber = $_GET['data'];

    $filename = "./database/users.txt";
    $fileContents = file($filename);

    if ($fileContents) {
        if ($lineNumber >= 1 && $lineNumber <= count($fileContents)) {
            $fileContents[$lineNumber - 1] = $info . PHP_EOL;
            $fileContents = implode("", $fileContents);

            file_put_contents($filename, $fileContents);
            header("Location: home_admin.php");
        } else {
            echo "The specified line does not exist.";
        }
    } else {
        echo "Failed to open the file.";
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <link rel="stylesheet" href="/css/style.css">
</head>

<body>
    <div class="container">
        <div class="shadow-sm p-3 mb-5 bg-body-tertiary rounded">
            <div class="card" style="width: 30rem;">
                <div class="card-body">
                    <div class="mb-3">
                        <h5>Update Info</h5>
                    </div>
                    <form method="post" action="">

                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">User Info
                            </span>
                            <input type="text" name="info" value="<?php if ($line !== false) {
                                                                        echo $line;
                                                                    } else {
                                                                        echo "The specified line does not exist.";
                                                                    } ?>" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
                        </div>

                        <button type="submit" class="btn btn-primary mt-3 mb-3 mybutton">Updata</button>
                    </form>

                    <div id="result">
                        <?php echo "<center> {$Messages} </center>"; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>