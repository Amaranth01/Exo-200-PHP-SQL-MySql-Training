<?php

require __DIR__ . '/bdd.php';
require __DIR__ . '/clean.php';
require __DIR__ . '/secured.php';

if(issetPostParam('name', 'difficulty', 'distance', 'duration', 'height_difference')) {
    $name = clean($_POST['name']);
    $difficulty = clean($_POST['difficulty']);
    $distance = clean($_POST['distance']);
    $duration = clean($_POST['duration']);
    $height_difference = clean($_POST['height_difference']);

    $stm = $bdd->prepare("
        INSERT INTO hiking (name, difficulty, distance, duration, height_difference)
        VALUES (:name, :difficulty, :distance, :duration, :height_difference)
    ");

    if ($stm->execute()){
        echo "rando ajoutée";
    }
}
echo "<a href='/pages/read.php'> Les randonnées </a>";