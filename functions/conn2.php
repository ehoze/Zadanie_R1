<?php


class Database
{

    public $con;
    public $error;

    // public $servername = "db4free.net";
    // public $db = "eryk_kucharski";
    // public $username = "eryk_kucharski";
    // public $password = "eryk_kucharskibazadanych";

    public $servername = "localhost";
    public $db = "r1";
    public $username = "root";
    public $password = "";


    public function __construct()
    {

        try {
            $conn = new PDO("mysql:host=localhost;dbname=r1", "root", "");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
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
            header('location:../index.php');
            return true;
        }
    }

    public function insert_data($table_name, $name, $lname, $pic)
    {
        $stmt = $this->con->prepare("INSERT INTO $table_name ('imie', 'nazwisko') VALUES ('imie = :name', 'nazwisko = :last_name')");
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':last_name', $lname, PDO::PARAM_STR);
        $stmt->execute();
        echo 'Dane zostały wpierdolone do bazy';
        return true;
    }
}
