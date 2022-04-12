<?php


class Database
{

    public $con;
    public $error;

    public $servername = "db4free.net";
    public $db = "eryk_kucharski";
    public $username = "eryk_kucharski";
    public $password = "eryk_kucharskibazadanych";


    public function __construct()
    {

        try {
            $conn = new PDO("mysql:host=db4free.net;dbname=eryk_kucharski", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connected successfully";
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function can_login($table_name, $field)
    {

        $login = $field['login'];
        $password = $field['password'];
        $password = md5($password);



        $stmt = $this->con->prepare("SELECT * FROM $table_name WHERE login = :login AND password = :password");
        $stmt->bindParam(':login', $login, PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);
        $stmt->execute();
        if ($stmt->rowCount() <= 0) {
            $this->error = "POPRAW";
        } else {
            return true;
        }
    }
}
