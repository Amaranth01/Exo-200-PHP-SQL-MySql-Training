<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Randonnées, ajout</title>
</head>
<body>
    <form action="" method="post">
        <input type="text" name="name" placeholder="Nom de la randonnée">
        <select name="difficulty" id="difficulty">
            <option value="très facile">Très facile</option>
            <option value="facile">Facile</option>
            <option value="moyen">Moyen</option>
            <option value="difficile">Difficile</option>
            <option value="très difficile">Très difficile</option>
        </select>
        <input type="number" name="distance">
        <input type="number" name="Durée">
        <input type="number" name="height_difference">

        <input type="submit" value="Envoyer">
    </form>
</body>
</html>

<?php
    $name = trim(strip_tags($_POST['name']));
    $difficulty = trim(strip_tags($_POST['difficulty']));
    $distance = trim(strip_tags($_POST['distance']));
    $duration = trim(strip_tags($_POST['duration']));
    $height = trim(strip_tags($_POST['height_difference']));

try {
    $server = 'localhost';
    $db = 'exo_200';
    $user = 'root';
    $pswd = '';

    $bdd = new PDO("mysql:host=$server;dbname=$db;charset=utf8", $user, $pswd);

    $stm = $bdd->prepare("
        INSERT INTO hiking (name, difficulty, distance, duration, height_difference)
        VALUES (:name, :difficulty, :distance, :duration, :height_difference)
    ");


    $stm->bindParam(':name', $name);
    $stm->bindParam(':difficulty', $difficulty,);
    $stm->bindParam(':distance', $distance, PDO::PARAM_INT);
    $stm->bindParam(':duration', $duration);
    $stm->bindParam(':height_difference', $height, PDO::PARAM_INT);

    if ($stm->execute()){
        echo "rando ajoutée";
    }
}
catch (PDOException $e){
    echo $e->getMessage();
}