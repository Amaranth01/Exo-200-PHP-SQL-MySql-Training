<?php

try {
    $server = 'localhost';
    $db = 'exo_200';
    $user = 'root';
    $pswd = '';

    $bdd = new PDO("mysql:host=$server;dbname=$db;charset=utf8", $user, $pswd);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $bdd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    $stm = $bdd->prepare("SELECT * FROM hiking");

    if($stm->execute()){
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
                <td><?= $item['name'] ?></td>
                <td><?= $item['difficulty'] ?></td>
                <td><?= $item['distance'] ?></td>
                <td><?= $item['duration'] ?></td>
                <td><?= $item['height_difference'] ?></td>
            </tr>
            </tbody>

            <?php
        }
    }
}
catch (PDOException $e){
    echo $e->getMessage();
}