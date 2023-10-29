<?php

session_start();
if(!isset($_SESSION['email'])){
  header("Location: login.php");
}

if($_SESSION['role'] == "user"){
    header("Location: login.php");
}

if(isset($_GET['data'])) {
    $filename = "./database/users.txt";
    $lineNumberToUpdate = $_GET['data'];
    $searchString = "user";
    $replaceString = "admin";
    
    $lines = file($filename);
    
    if ($lines !== false) {
        if ($lineNumberToUpdate >= 1 && $lineNumberToUpdate <= count($lines)) {
            $lines[$lineNumberToUpdate - 1] = str_replace($searchString, $replaceString, $lines[$lineNumberToUpdate - 1]);
    
            if (file_put_contents($filename, implode("", $lines)) !== false) {
                header("Location: home_admin.php");
            } else {
                echo "Failed to write the updated data to the file. Please check file permissions.";
            }
        } else {
            echo "Line number is out of range.";
        }
    } else {
        echo "Error reading the file.";
    }

}else {
    echo 'No data received by PHP.';
}

?>
