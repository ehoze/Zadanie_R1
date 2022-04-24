<?php
session_start();
// $_SESSION['logged'] = false;
class Database
{
    public $error;
    public $conn;

    // public $servername = "db4free.net";
    // public $db = "eryk_kucharski";
    // public $username = "eryk_kucharski";
    // public $password = "eryk_kucharskibazadanych";
    // public function __construct()
    // {
    // $this->dbConnect();
    // }

    public function dbConnect()
    {
        try {
            $conn = new PDO("mysql:host=db4free.net;dbname=eryk_kucharski", "eryk_kucharski", "eryk_kucharskibazadanych");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // return $this->con;
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }


    public function can_login($table_name, $data)
    {
        $this->dbConnect();
        $login = $data['login'];
        $password = $data['password'];

        try {
            $conn = new PDO("mysql:host=db4free.net;dbname=eryk_kucharski", "eryk_kucharski", "eryk_kucharskibazadanych");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // return $this->con;
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
        // $sql = "SELECT * FROM users WHERE login = admin AND password = admin";

        $stmt = $conn->prepare("SELECT * FROM $table_name WHERE login = :login AND password = :password");
        $stmt->bindParam(':login', $login, PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);
        $stmt->execute();

        // foreach ($conn->query($sql) as $row) {
        // echo $row['login'] . ' ' . $row['password'];
        // }
        if ($stmt->rowCount() >= 1) {
            // if ($row->rowCount() >= 1) {
            $_SESSION['logged'] = true;
            header('location:../index.php');
            return true;
        }
        $conn = null;
    }

    public function insert_data($table_name, $data)
    {
        $name = $data['name'];
        $lname = $data['lname'];
        $fileName = $data['file_name'];
        $fileType = $data['file_type'];
        try {
            $conn = new PDO("mysql:host=db4free.net;dbname=eryk_kucharski", "eryk_kucharski", "eryk_kucharskibazadanych");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // return $this->con;
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
        $status = $_SESSION['statusMsg'] = '';

        $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'PNG', 'JPG', 'JPEG', 'GIF');
        if (in_array($fileType, $allowTypes)) {
            $image = $_FILES['image']['tmp_name'];
            $imgContent = addslashes(file_get_contents($image));

            // Insert image content into database 
            // $insert = $conn->query("INSERT into data (obraz) VALUES ('$imgContent')");


        } else {
            $_SESSION['statusMsg'] = '<label>Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.</label>';
        }


        // $stmt = $conn->prepare("INSERT INTO $table_name (imie, nazwisko, obraz) 
        //                         VALUES (:imie, :nazwisko, :pic)");
        // $stmt->bindParam(':imie', $name, PDO::PARAM_STR);
        // $stmt->bindParam(':nazwisko', $lname, PDO::PARAM_STR);
        // $stmt->bindParam(':pic', $imgContent, PDO::PARAM_LOB);
        $stmt = $conn->query("INSERT into data (imie, nazwisko, obraz) VALUES ('$name', '$lname', '$imgContent')");
        // $stmt->execute();
        if ($stmt) {
            $_SESSION['error'] = '<label>Przesłano pomyślnie</label>';
        } else {
            $_SESSION['error'] = '<label>Nie przesłano</label>';
        }
        if ($stmt) {
            $status = 'success';
            $_SESSION['statusMsg'] = "<label>File uploaded successfully.</label>";
        } else {
            $_SESSION['statusMsg'] = "<label>File upload failed, please try again.</label>";
        }
    }

    public function show_data($table_name)
    {

        try {
            $conn = new PDO("mysql:host=db4free.net;dbname=eryk_kucharski", "eryk_kucharski", "eryk_kucharskibazadanych");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // return $this->con;
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
        // $sql = "SELECT * FROM users WHERE login = admin AND password = admin";

        $stmt = $conn->prepare("SELECT * FROM $table_name");
        // $stmt->execute();
        $sql = "SELECT * FROM $table_name";
        foreach ($conn->query($sql) as $row) {
            echo "<tr>
                <td>$row[imie]</td>
                <td>$row[nazwisko]</td>
                <td><img src=\"data:image/jpg;charset=utf8;base64," . base64_encode($row['obraz']) . "\" /></td> 
                </tr>";
            // }
            // if ($stmt->rowCount() >= 1) {

            //     return true;
            // }
            $conn = null;
        }
    }
}
