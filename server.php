<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);
$errore_titolo = "Inserisci il titolo del brano";
$errore_artista = "Inserisci il nome dell'artista";
$errore_genere = "Inserisci il genere";


$database_in_string = file_get_contents("./database.json");
$database = json_decode($database_in_string, true);


$generi = [];

foreach ($database as $album) {
    $lista_generi = explode(",", $album["genere"]);
    foreach ($lista_generi as $genere) {
        $genere = (trim($genere));
        if (!in_array($genere, $generi)) {
            $generi[] = $genere;
        };
    };
};

$titolo = isset($_POST["titolo"]) && !empty(trim($_POST["titolo"])) ? trim($_POST["titolo"]) : $errore_titolo;
$artista = isset($_POST["artista"]) && !empty(trim($_POST["artista"])) ? trim($_POST["artista"]) : $errore_artista;
$genere = isset($_POST["genere"]) && !empty($_POST["genere"]) ? $_POST["genere"] : [];
$url_cover = "./images/1.webp";

$esiste = false;
foreach ($database as $album) {
    if ($album["titolo"] === $titolo && $album["artista"] === $artista) {
        $esiste = true;
        break;
    }
}

if (!$esiste) {
    $database[] = [
        "titolo" => $titolo,
        "artista" => $artista,
        "genere" => implode(", ", $genere),
        "url_cover" => $url_cover
    ];
    header("Location: ./index.php");
}




$database_in_string_updated = json_encode($database);
$database_updated = file_put_contents("./database.json", $database_in_string_updated);
