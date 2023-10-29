<?php

session_start();
if(!isset($_SESSION['email'])){
  header("Location: login.php");
}

if($_SESSION['role'] == "user"){
    header("Location: login.php");
}

if(isset($_GET['data'])) {
    $receivedData = $_GET['data'];
    $filename = "./database/users.txt";
    $lineToRemove = $receivedData;

    $originalFile = fopen($filename, "r");
    $tempFile = fopen("./database/temp.txt", "w");

    if ($originalFile && $tempFile) {
        $lineNumber = 1;

        while (($line = fgets($originalFile)) !== false) {
            if ($lineNumber != $lineToRemove) {
                fwrite($tempFile, $line);
            }
            $lineNumber++;
        }

        fclose($originalFile);
        fclose($tempFile);

        if (rename("./database/temp.txt", $filename)) {
            //echo "Line $lineToRemove has been removed from the file.";
            header("Location: home_admin.php");
        } else {
            echo "Failed to replace the file. Please check file permissions.";
        }
    } else {
        echo "Error opening the file.";
    }

} else {
    echo 'No data received by PHP.';
}

?>
