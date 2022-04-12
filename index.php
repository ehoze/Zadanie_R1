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
        <h1 id="modalOpen"></h1>
        <dialog id="modal" class="modal">
            <h2>Test</h2>
            <h1 id="modalClose">X</h1>
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
    const modalOpenButton = document.querySelector("#modalOpen");
    const modalCloseButton = document.querySelector("#modalClose");

    modalOpenButton.addEventListener("click", () => {
        modal.showModal();
    });

    modalCloseButton.addEventListener("click", () => {
        modal.close();
    });
</script>

</html>