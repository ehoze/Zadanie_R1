<?php
include '../functions/conn.php';
session_start();

$data = new Database;

if (isset($_POST["loguj"])) {
    $field = array(
        'login' => $_POST['login'],
        'password' => $_POST['password'],
    );
    if ($data->can_login("users", $field)) {
        $_SESSION['login'] = $_POST['login'];
        header("location:../index.php");
    } else {
        $message = $data->error;
    }
}
header('location:../index.php');
