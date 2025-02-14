<?php
require_once "./server.php";

?>

<!doctype html>
<html lang="en">

<head>
    <title>Biblioteca</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
        crossorigin="anonymous" />
</head>

<body class="bg-dark text-white">



    <div class="container">
        <h1 class="py-3">Catalogo Dischi</h1>
        <hr>
        <form action="./server.php" method="POST">
            <input type="text" name="titolo" id="titolo">
            <label for="titolo">Inserisci il titolo del brano</label>

            <input type="text" name="artista" id="titolo">
            <label for="artista">Inserisci il nome dell'artista</label>

            <?php
            foreach ($database as $album) {

                echo '<div class="form-check">' .
                    '<input class="form-check-input" type="checkbox" value="' . $album["genere"] . '" id="" />' .
                    '<label class="form-check-label" for="">' . $album["genere"] . '</label>' .
                    '</div>';
            };


            ?>
            <button type="submit">Aggiungi alla collezione</button>
        </form>

        <hr>
        <h2>La tua collezione </h2>

        <?php
        echo '<div class="d-flex flex-wrap justify-content-start">';

        foreach ($database as $album) {
            echo '<div class="card" style="width: 18rem; margin: 10px;">
            <img src="' . $album["url_cover"] . '" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title text-center">' . $album["titolo"] . " - " . $album["artista"] . '</h5>
                <h6 class="card-subtitle mb-2 text-body-secondary text-center">' . $album["genere"] . '</h6>
            </div>
        </div>';
        }

        echo '</div>';
        ?>




    </div>


</body>

</html>