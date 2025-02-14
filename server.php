<?php
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
}
