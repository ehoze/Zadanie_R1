<?php
include_once('functions/header.php');
if (isset($_SESSION["error"])) {
    $error = $_SESSION["error"];
    unset($_SESSION['error']);
} else {
    $error = "";
}
?>

<body>
    <section id="main" class="container">
        <div class="form_container">
            <form action="functions/form.php" method="post" class="form_box" enctype="multipart/form-data">
                <label for="name">Imię</label>
                <input type="text" name="name" placeholder="Twoje imię" />
                <label for="last_name">Nazwisko</label>
                <input type="text" name="last_name" placeholder="Twoje nazwisko" />
                <!-- <label for="attachment">Załącznik</label> -->
                <input type="file" name="attachment" id="attachment" style="display:none;" />
                <label for="attachment">Wybierz zdjęcie</label>

                <input type="submit" id="submit" />
            </form>
            <?php
            if (!empty($error)) {
                echo 'Proszę wypełnić pola "Imię" oraz "Nazwisko"';
            }
            ?>
        </div>
    </section>



</body>

</html>