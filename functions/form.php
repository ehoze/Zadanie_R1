<?php
include '../functions/conn.php';
$data = new Database;
$valid = false;
if (!empty($_POST['name']) && !empty($_POST['last_name'])) {
    // VARIABLES
    $pic = '0';



    $field = array(
        'name' => $_POST['name'],
        'lname' => $_POST['last_name'],
        'file_name' => $fileName = basename($_FILES["image"]["name"]),
        'file_type' => $fileType = pathinfo($fileName, PATHINFO_EXTENSION),
    );
    // CODE
    $data->insert_data("data", $field);
    header('Location: ../index.php');
} else {
    $_SESSION['error'] = 'Proszę wypełnić wszystkie pola';
    header('Location: ../index.php');
}
