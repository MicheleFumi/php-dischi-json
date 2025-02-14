<?php
$database_in_string = file_get_contents("./database.json");
$database = json_decode($database_in_string, true);
