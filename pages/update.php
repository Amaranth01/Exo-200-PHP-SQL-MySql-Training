<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Randonnées, modification</title>
    <link rel="stylesheet" href="css/basics.css">
</head>
<body>

<form method="post" action="/utils/updateHiking.php">
    <input type="text" name="name" placeholder="Nom de la randonnée">
    <select name="difficulty" id="difficulty">
        <option value="très facile">Très facile</option>
        <option value="facile">Facile</option>
        <option value="moyen">Moyen</option>
        <option value="difficile">Difficile</option>
        <option value="très difficile">Très difficile</option>
    </select>
    <input type="number" name="distance" placeholder="Distance">
    <input type="number" name="duration" >
    <input type="number" name="height_difference" placeholder="Dénivelé">

    <input id="enter" type="submit" name="Enter" value="ajouter">
</form>
</body>
</html>