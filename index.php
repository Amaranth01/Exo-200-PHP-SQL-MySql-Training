<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Randonnées, ajout</title>
</head>
<body>
    <form action="">
        <input type="text" name="name" placeholder="Nom de la randonnée">
        <select name="difficulty" id="difficulty">
            <option value="très facile">Très facile</option>
            <option value="facile">Facile</option>
            <option value="moyen">Moyen</option>
            <option value="difficile">Difficile</option>
            <option value="très difficile">Très difficile</option>
        </select>
        <input type="number" name="distance">
        <input type="time" name="Durée">
        <input type="number" name="height_difference">
    </form>
</body>
</html>

<?php
try {
    $server = 'localhost';
    $db = 'exo_200';
    $user = 'root';
    $pswd = '';

    $bdd = new PDO("mysql:host=$server;dbname=$db;charset=utf8", $user, $pswd);

    $nom = strip_tags(trim('name'));
    $difficulty = strip_tags(trim('difficulty'));
    $distance = strip_tags(trim('distance'));
    $duration = strip_tags(trim('duration'));
    $height = strip_tags(trim('height_difference'));

    $stm = $bdd->prepare("
        INSERT INTO hiking (name, difficulty, distance, duration, height_difference)
        VALUES (:name, :difficulty, :distance, :duration, :height_difference)
    ");

    $stm->bindParam(':name', $name);
    $stm->bindParam(':difficulty', $difficulty);
    $stm->bindParam(':duration', $duration);
    $stm->bindParam(':height_difference', $height);

    $stm->execute();
}
catch (PDOException $e){
    echo $e->getMessage();
}