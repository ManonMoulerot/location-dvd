<?php
    include 'dbe_connect.php';
?>
<!DOCTYPE html>
<html lang="fr">

<head>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulaire</title>
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Abril+Fatface&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body>
<h1>PROJET LOCATION</h1>
<?php
    $sql = "select * from t_location inner join t_client on t_location.ID_client = t_client.ID inner join t_film on t_location.ID_film = t_film.ID"; //instruction/requete sql
    $result=$connect->query($sql); //demande a la base de donnée de executer la requete
    echo "<ul>";
    while ($resultrow=$result->fetch(PDO::FETCH_ASSOC)) {
        echo '<li>'."Client : ".$resultrow['NOM_CLIENT']." Nom du film : ".$resultrow['FILM']." Duree : ".$resultrow['TEMPS'].'</li>';
    }
    echo "</ul>";
    echo "<a href='http://localhost/bd-exercice/location.php'>Retour</a>";
?>


<h2>TRIER PAR CLIENT</h2>
<form action="" method="post">
    <select name = "user">
    <?php
    $sql2 = "select NOM_CLIENT,ID FROM t_client"; //instruction/requete sql
    $result=$connect->query($sql2); //demande a la base de donnée de executer la requete
    while ($resultrow2=$result->fetch(PDO::FETCH_ASSOC)) {
        echo '<option value="'.$resultrow2['ID'].'">'.$resultrow2['NOM_CLIENT'].'</option>';
    }
    ?>
    </select>
    <input class="button" type = "submit" value = "Envoyer">
            
</form>
<?php
    // echo $_GET[id_film];
    if (isset($_POST['user'])){
    $film=$_POST['user'];

    $sql3 = "select * from t_location inner join t_client on t_location.ID_client = t_client.ID inner join t_film on t_location.ID_film = t_film.ID WHERE t_client.ID = '$film'"; //instruction/requete sql
    $result=$connect->query($sql3); //demande a la base de donnée de executer la requete
    echo "<ul>";
    while ($resultrow=$result->fetch(PDO::FETCH_ASSOC)) {
        echo '<li>'."Client : ".$resultrow['NOM_CLIENT']." Nom du film : ".$resultrow['FILM']." Duree : ".$resultrow['TEMPS'].'</li>';
    }
    echo "</ul>";
}
?>

<h2>TRIER PAR DUREE</h2>
<form action="" method="post">
    <select name = "duree">
            <option value="12h">12h</option>
            <option value="24h">24h</option>
            <option value="48h">48h</option>
            <option value="1 semaine">1 semaine</option>
            <option value="1 mois">1 mois</option>
    </select>

    <input class="button" type = "submit" value = "Envoyer">
            
</form>
<?php
    // echo $_GET[id_film];
    if (isset($_POST['duree'])){
    $temps=$_POST['duree'];

    $sql5 = "select * from t_location inner join t_client on t_location.ID_client = t_client.ID inner join t_film on t_location.ID_film = t_film.ID WHERE t_location.TEMPS = '$temps'"; //instruction/requete sql
    $result=$connect->query($sql5); //demande a la base de donnée de executer la requete
    echo "<ul>";
    while ($resultrow=$result->fetch(PDO::FETCH_ASSOC)) {
        echo '<li>'."Client : ".$resultrow['NOM_CLIENT']." Nom du film : ".$resultrow['FILM']." Duree : ".$resultrow['TEMPS'].'</li>';
    }
    echo "</ul>";
}
?>

<form action="" method="post">

    <select name = "test">
            <option value="1">superieur a 12h</option>
            <option value="2">superieur a 48h</option>
            <option value="7">superieur a 1 semaine</option>
    </select>

    <input class="button" type = "submit" value = "Envoyer">
            
</form>

<?php
if (isset($_POST['test'])){
    $test=$_POST['test'];

    $sql5 = "select * from t_location inner join t_client on t_location.ID_client = t_client.ID inner join t_film on t_location.ID_film = t_film.ID "; //instruction/requete sql
    $result=$connect->query($sql5); //demande a la base de donnée de executer la requete
    echo "<ul>";
    while ($resultrow=$result->fetch(PDO::FETCH_ASSOC)) {
        $date=$resultrow['D_location'];
        $date2=$resultrow['D_rendu'];
        $datetime1 = new DateTime($date2);
        $datetime2 = new DateTime($date);
        $interval = $datetime2->diff($datetime1);
        $var = (int)$interval->format('%a');
        if($var >= $test){
        echo '<li>'."Client : ".$resultrow['NOM_CLIENT']." Nom du film : ".$resultrow['FILM']." Nombre de jour : ".$var.'</li>';
    }
    }
    echo "</ul>";
}
?>

<form action="" method="post">

    <select name = "compris_1_date">
            <option value="1">superieur a 12h</option>
            <option value="2">superieur a 48h</option>
            <option value="7">superieur a 1 semaine</option>
    </select>

    <select name = "compris_2_date">
            <option value="2">inferieur a 48h</option>
            <option value="7">inferieur a 1 semaine</option>
            <option value="31">inferieur a 1 mois</option>
    </select>

    <input class="button" type = "submit" value = "Envoyer">
            
</form>

<?php
if (isset($_POST['compris_1_date'])){
    $compris_entre_date1=$_POST['compris_1_date'];
    $compris_entre_date2=$_POST['compris_2_date'];

    $sql6 = "select * from t_location inner join t_client on t_location.ID_client = t_client.ID inner join t_film on t_location.ID_film = t_film.ID "; //instruction/requete sql
    $result=$connect->query($sql6); //demande a la base de donnée de executer la requete
    echo "<ul>";
    while ($resultrow=$result->fetch(PDO::FETCH_ASSOC)) {
        $date=$resultrow['D_location'];
        $date2=$resultrow['D_rendu'];
        $datetime1 = new DateTime($date2);
        $datetime2 = new DateTime($date);
        $interval = $datetime2->diff($datetime1);
        $var = (int)$interval->format('%a');
        if($var >= $compris_entre_date1 && $var <= $compris_entre_date2){
        echo '<li>'."Client : ".$resultrow['NOM_CLIENT']." Nom du film : ".$resultrow['FILM']." Nombre de jour : ".$var.'</li>';
    }
    }
    echo "</ul>";
}
?>
    
</body>
</html>
