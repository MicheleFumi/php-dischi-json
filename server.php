<?php
$database_in_string = file_get_contents("./database.json");
$discs = json_decode($database_in_string, true);



if (isset($_POST["titolo"]) && isset($_POST["artista"]) && isset($_POST["genere"])) {

    $titolo =  $_POST["titolo"];
    $artista = $_POST["artista"];
    $genere = $_POST["genere"];
    $url_cover = "./images/1.webp";


    $discs[] = [
        "titolo" => $titolo,
        "artista" => $artista,
        "genere" => $genere,
        "url_cover" => $url_cover
    ];

    $database_in_string_updated = json_encode($discs);
    $database_updated = file_put_contents("./database.json", $database_in_string_updated);
    header('Location: ./index.php');
    exit();
}
