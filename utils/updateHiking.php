<?php

require __DIR__ . '/clean.php';
require __DIR__ . '/bdd.php';
require __DIR__ . '/secured.php';

if (issetPostParam('name', 'difficulty', 'distance', 'duration', 'height_difference')) {

    $name = clean($_POST['name']);
    $difficulty = clean($_POST['difficulty']);
    $distance = clean($_POST['distance']);
    $duration = clean($_POST['duration']);
    $height_difference = clean($_POST['height_difference']);

    $stm = $bdd->prepare("UPDATE hiking SET name = :name, difficulty = :difficulty, distance = :distance, duration = :duration, height_difference = :height_difference WHERE id = :id");

    $stm->bindParam(':name', $name);
    $stm->bindParam(':difficulty', $difficulty);
    $stm->bindParam(':distance', $distance, PDO::PARAM_INT);
    $stm->bindParam(':duration', $duration, PDO::PARAM_INT);
    $stm->bindParam(':height_difference', $height_difference, PDO::PARAM_INT);
    $stm->bindParam(':id', $id);

    $stm->execute();

    echo "<div> La randonnée a bien été modifiée !</div>";

    echo "<a href='/pages/read.php'> Les randonnées </a>";
}