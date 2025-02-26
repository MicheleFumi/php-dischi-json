<?php

$discs_in_string = file_get_contents("./database.json");
$discs = json_decode($discs_in_string, true);

?>

<!doctype html>
<html lang="en">

<head>
    <title>Biblioteca</title>

    <meta charset="utf-8" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no" />

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
        <form action="./server.php" method="POST" class="p-4 bg-secondary rounded shadow-lg">
            <div class="mb-3">
                <label for="titolo" class="form-label text-white">Inserisci il titolo del brano</label>
                <input type="text" name="titolo" id="titolo" class="form-control" placeholder="Es. Hey Jude">

            </div>

            <div class="mb-3">
                <label for="artista" class="form-label text-white">Inserisci il nome dell'artista</label>
                <input type="text" name="artista" id="artista" class="form-control" placeholder="Es. The Beatles">

            </div>

            <div class="mb-3">

                <label for="genere" class="form-label text-white">scegli il genere</label>
                <input type="text" name="genere" id="genere" class="form-control" placeholder="Es. Rock">

            </div>

            <button type="submit" class="btn btn-primary w-100 ">Aggiungi alla collezione</button>
        </form>


        <hr>
        <h2>La tua collezione </h2>


        <div class="d-flex flex-wrap justify-content-start">
            <?php
            foreach ($discs as $disc) {
            ?>
                <div class="card" style="width: 18rem; margin: 10px;">
                    <img src="<?php echo $disc["url_cover"] ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title text-center"> <?php echo $disc["titolo"] . '-' . $disc["artista"] ?></h5>
                        <h6 class="card-subtitle mb-2 text-body-secondary text-center"><?php echo $disc["genere"] ?></h6>
                    </div>
                </div>

            <?php } ?>








        </div>


</body>

</html>