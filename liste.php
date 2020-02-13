<?php
    include 'dbe_connect.php';

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Lobster&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <title>Liste</title>
</head>
<body>
<div class="titre">
<div  class="logo">
<img src="movie-clapper-open.png" alt="logo">
<h1>Vidéothèques.fr</h1>
</div>
<nav >
    <ul>
    <li><a href="http://localhost/bd-exercice/location.php">Locations</a></li>
    <li><a href="http://localhost/bd-exercice/recap_location.php">Récapitulatif des locations</a></li>
    <li><a href="http://localhost/bd-exercice/liste.php">Liste des films</a></li>
    <li><a href="http://localhost/bd-exercice/ajouter.php">Ajouter un film</a></li>
    </ul>
</nav>
</div>
<div class= "container">
    <h2>Liste des films</h2>
<?php
    $sql = "select * FROM t_film"; //instruction/requete sql
    $result=$connect->query($sql); //demande a la base de donnée de executer la requete
    echo "<div class='cadre-liste'>";
    while ($resultrow=$result->fetch(PDO::FETCH_ASSOC)) {
        echo '<div class="liste"><h3>'.$resultrow['FILM'].'</h3><p>'.$resultrow['ANNEE'].'<br/>'.$resultrow['DUREE'].'</p><button type="submit"><a href="formulaire.php?id_film='.$resultrow['ID'].'">Modifier</a></button><button><a href="supprimer.php?id_film='.$resultrow['ID'].'">supprimer</a></button></div>';
    }
    echo "</div>";
    echo "<button><a href='ajouter.php'>ajouter</a></button>";

?>
<div>

</body>
</html>