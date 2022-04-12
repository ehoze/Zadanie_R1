<?php
session_start();
$valid = false;
if (!empty($_POST['name']) && !empty($_POST['last_name'])) {
    // VARIABLES
    $name = $_POST['name'];
    $lname = $_POST['last_name'];
    // CODE
    echo 'Witaj ' . $name . ' ' . $lname . '!';

    // echo '<br>Wielkość wrzuconego pliku wynosi: ' . filesize($file);
} else {
    $_SESSION['error'] = 'error';
    header('Location: ../index.php');
}
