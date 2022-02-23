<?php

try {
    $server = 'localhost';
    $db = 'exo_200';
    $user = 'root';
    $pswd = '';

    $bdd = new PDO("mysql:host=$server;dbname=$db;charset=utf8", $user, $pswd);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $bdd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    $stm = $bdd->prepare("SELECT name FROM hiking");

    if($stm->execute()){
        foreach ($stm->fetchAll() as $item) {
            echo "Nom de la randonnée : " . $item['name']  ."<br>";
        }
    }
}
catch (PDOException $e){
    echo $e->getMessage();
}