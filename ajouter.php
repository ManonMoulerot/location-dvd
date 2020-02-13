<?php
    include 'dbe_connect.php';
?>


<!DOCTYPE html>
<html lang="fr">

<head>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulaire</title>
    <link href="https://fonts.googleapis.com/css?family=Lobster&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
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
    <h2>Ajouter un film</h2>
<form action="" method="post">
    <div  class="cadre-liste form-disposition">
    <div class="liste">
            <label>Nom film * </label><input type = "text" name = "film" required>
            <label>Date * </label><input type = "text" name = "date" required>
            <label>Durée * </label><input type = "text" name = "duree" required>
    </div> 
    <div class="liste">       
            <label>Nom film * </label><input type = "text" name = "film2" >
            <label>Date * </label><input type = "text" name = "date2" >
            <label>Durée * </label><input type = "text" name = "duree2"> 
</div>
</div>
    <button type = "submit">Envoyer</button>
</form>


<a href="http://localhost/bd-exercice/liste.php">Retour</a>
</div>
<?php
    // echo $_GET[id_film];
    if (isset($_POST['film']) && !empty($_POST['film'])){
    $film=addslashes($_POST['film']);
    $date=$_POST['date'];
    $duree=$_POST['duree'];
    $sql = "INSERT INTO t_film (FILM, ANNEE, DUREE) VALUES ('$film', '$date', '$duree');";
    $result=$connect->query($sql);}

    // echo $_GET[id_film];
    if (isset($_POST['film2']) && !empty($_POST['film2'])){
    $film2=$_POST['film2'];
    $date2=$_POST['date2'];
    $duree2=$_POST['duree2'];
    $sql = "INSERT INTO t_film (FILM, ANNEE, DUREE) VALUES ('$film2', '$date2', '$duree2');";
    $result=$connect->query($sql);}
?>
    
</body>
</html>