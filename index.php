<?php
include_once('functions/header.php');
include('functions/conn.php');
if (isset($_SESSION["error"])) {
    $error = $_SESSION["error"];
    unset($_SESSION['error']);
} else {
    $error = "";
}
?>

<body>
    <section id="main" class="container">
        <button class="button open-button">Logowanie</button>
        <dialog id="modal" class="modal">
            <form action="functions/conn.php" method="post">
                <input type="text" name="login" id="login">
                <input type="text" name="password" id="password">
                <input type="submit" value="Zaloguj sb" name="loguj">
            </form>
            <button class="button close-button">Zamknij</button>
        </dialog>
        <div class="form_container">
            <form action="functions/form.php" method="post" class="form_box" enctype="multipart/form-data">
                <label for="name">Imię</label>
                <input type="text" name="name" placeholder="Twoje imię" required />
                <label for="last_name">Nazwisko</label>
                <input type="text" name="last_name" placeholder="Twoje nazwisko" required />
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
<script>
    const modal = document.querySelector("#modal");
    const openModal = document.querySelector(".open-button");
    const closeModal = document.querySelector(".close-button");

    openModal.addEventListener("click", () => {
        modal.showModal();
    });

    closeModal.addEventListener("click", () => {
        modal.close();
    });
</script>

</html>