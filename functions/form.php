<?php
session_start();
$valid = false;
if (!empty($_POST['name']) && !empty($_POST['last_name'])) {
    // VARIABLES
    $name = $_POST['name'];
    $lname = $_POST['last_name'];
    // CODE
    echo 'Witaj ' . $name . ' ' . $lname . '!';

    $target_dir = "uploads/";
    $file = $_FILES["attachment"]["size"];
    $target_file = $target_dir . basename($_FILES["attachment"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image

    $check = getimagesize($_FILES["attachment"]["tmp_name"]);
    if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }


    // echo '<br>Wielkość wrzuconego pliku wynosi: ' . filesize($file);
} else {
    $_SESSION['error'] = 'error';
    header('Location: ../index.php');
}
