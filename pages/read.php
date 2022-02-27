<?php

require __DIR__ . '/../part/header.php';
require __DIR__ . '/../utils/bdd.php';
require __DIR__ . '/../utils/createNewHiking.php';

$stm = $bdd->prepare("SELECT * FROM hiking");

if ($stm->execute()){
?>
<table>
    <thead>
    <tr>
        <td>Nom</td>
        <td>Difficulté</td>
        <td>Distance</td>
        <td>Durée</td>
        <td>Dénivelé</td>
    </tr>
    </thead>
    <?php
    foreach ($stm->fetchAll() as $item) {
        ?>
        <tbody>
        <tr>
            <td><a href="update.php"><?= $item['name'] ?></a></td>
            <td><?= $item['difficulty'] ?></td>
            <td><?= $item['distance'] ?></td>
            <td><?= $item['duration'] ?></td>
            <td><?= $item['height_difference'] ?></td>
        </tr>
        </tbody>
        <?php
    }
    }
    ?>

    <p><a href="create.php">Ajouter une nouvelle randonnée</a></p>