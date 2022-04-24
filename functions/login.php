<?php
// session_start();
include '../functions/conn.php';

$data = new Database;

if (isset($_POST["loguj"])) {
    $field = array(
        'login' => $_POST['login'],
        'password' => $_POST['password'],
    );
    if ($data->can_login("users", $field)) {
        $_SESSION['login'] = $_POST['login'];
        echo $_POST['login'];
        $_SESSION['error'] = '';
        $_SESSION['logged'] = true;
        header("location:../data.php");
    } else {
        $message = $data->error;
        echo $_POST['login'] . " " . $_POST['password'];
        header("location:../index.php");
        $_SESSION['logged'] = false;
        $_SESSION['error'] = '<label>Błędne dane</label>';
    }
}
