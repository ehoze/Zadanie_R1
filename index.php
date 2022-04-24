<?php
include_once('functions/header.php');
include('functions/conn.php');
// if (isset($_SESSION["error"])) {
//     $error = $_SESSION["error"];
//     unset($_SESSION['error']);
// } else {
//     $error = "";
// }
?>

<body>
    <section id="main" class="container">

        <dialog id="modal" class="modal">
            <form action="functions/login.php" class="dialog" method="post" autocomplete="off">
                <div class="form-group">
                    <!-- <label for="login">Nazwa użytkownika</label> -->
                    <input type="text" name="login" id="login" placeholder="Nazwa użytkownika">
                </div>
                <div class="form-group">
                    <!-- <label for="password">Hasło</label> -->
                    <input type="password" name="password" id="password" placeholder="Hasło">
                </div>
                <button type="submit" name="loguj" class="btn btn-primary">Zaloguj się</button>
            </form>
            <button class="button close-button">Zamknij</button>
        </dialog>
        <div class="form_container">
            <form action="functions/form.php" method="post" class="form_box" enctype="multipart/form-data">
                <label for="name">Imię</label>
                <input type="text" name="name" placeholder="Twoje imię" required />
                <label for="last_name">Nazwisko</label>
                <input type="text" name="last_name" placeholder="Twoje nazwisko" />
                <!-- <label for="attachment">Załącznik</label> -->
                <input type="file" name="image" id="image" style="display:none;" />
                <label for="image">Wybierz zdjęcie</label>

                <input type="submit" id="submit" />
            </form>
            <?php
            if (isset($_SESSION['logged'])) {
                if ($_SESSION['logged'] != true)
                    echo '<button class="button open-button open-buttondi">Przejdź do danych</button>';
                else {
                    echo '<button class="button open-button"><a href="data.php">Przejdź do danych</a></button>';
                }
            } else {
                echo '<button class="button open-button open-buttondi">Przejdź do danych</button>';
            }

            ?>

            <?php
            if (!empty($error)) {
                echo 'Proszę wypełnić pola "Imię" oraz "Nazwisko"';
            }

            if (isset($_SESSION['error'])) {
                echo $_SESSION['error'] . "<br>";
            }
            if (isset($_SESSION['statusMsg'])) {
                echo $_SESSION['statusMsg'] . "<br>";
            }
            ?>
        </div>
    </section>



</body>
<script>
    const modal = document.querySelector("#modal");
    const openModal = document.querySelector(".open-buttondi");
    const closeModal = document.querySelector(".close-button");

    openModal.addEventListener("click", () => {
        modal.showModal();
    });

    closeModal.addEventListener("click", () => {
        modal.close();
    });
</script>

</html>