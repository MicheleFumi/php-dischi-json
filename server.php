<?php


/* var_dump($_POST); */


if (isset($_POST["titolo"]) && isset($_POST["artista"]) && isset($_POST["genere"])) {

    $titolo =  $_POST["titolo"];
    $artista = $_POST["artista"];
    $genere =  $_POST["genere"];
    $url_cover = "./images/1.webp";



    $database_in_string = file_get_contents("./database.json");
    $database = json_decode($database_in_string, true);







    $database[] = [
        "titolo" => $titolo,
        "artista" => $artista,
        "genere" => $genere,
        "url_cover" => $url_cover
    ];





    $database_in_string_updated = json_encode($database);
    $database_updated = file_put_contents("./database.json", $database_in_string_updated);
    header("Location: ./index.php");
    exit;
} else {
    header('Location: ./index.php');
}
