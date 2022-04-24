<?php
include_once('functions/header.php');
include('functions/conn.php');
if ($_SESSION['logged'] != true)
    header('location: index.php');
?>

<body>
    <section id="main" class="container">
        <button class="open-button" style="margin-bottom: 10px;"><a href="index.php">Wróć na start</a></button>
        <div class="form_container">
            <table>
                <tr>
                    <th>Imię</th>
                    <th>Nazwisko</th>
                    <th>Obraz</th>
                </tr>
                <?php
                $data = new Database;
                $data->show_data("data")
                ?>
            </table>
            <?php
            if (isset($_SESSION['error'])) {
                echo $_SESSION['error'];
            }
            ?>
        </div>
    </section>



</body>

</html>