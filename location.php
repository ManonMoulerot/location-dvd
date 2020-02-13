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
    <link rel="stylesheet" href="styles.css">
</head>

<body>
<h1>Vidéothèques</h1>
<form action="" method="post">
            <label>Film </label><select name = "film">
            <?php
            $sql = "select FILM,ID FROM t_film"; //instruction/requete sql
            $result=$connect->query($sql); //demande a la base de donnée de executer la requete
            while ($resultrow=$result->fetch(PDO::FETCH_ASSOC)) {
                echo '<option value="'.$resultrow['ID'].'">'.$resultrow['FILM'].'</option>';
            }
            ?>
            </select>


            <label>User</label><select name = "user">
            <?php
            $sql2 = "select NOM_CLIENT,ID FROM t_client"; //instruction/requete sql
            $result=$connect->query($sql2); //demande a la base de donnée de executer la requete
            while ($resultrow2=$result->fetch(PDO::FETCH_ASSOC)) {
                echo '<option value="'.$resultrow2['ID'].'">'.$resultrow2['NOM_CLIENT'].'</option>';
            }
            ?>
            </select>
            <label>Date d'emprunt</label>
            <input type="date" name = "date">

            <label>Date de rendu</label>
            <input type="date" name = "date2">

            <label>Duree * </label><select name = "duree">
            <option value="12h">12h</option>
            <option value="24h">24h</option>
            <option value="48h">48h</option>
            <option value="1 semaine">1 semaine</option>
            <option value="1 mois">1 mois</option>
            </select>
            <input class="button" type = "submit" value = "Envoyer">
            <a href="http://localhost/bd-exercice/recap_location.php">Recapitulatif des locations</a>
</form>
<?php
    if (isset($_POST['film'])){
        echo " ".$_POST['user'];
        echo " ".$_POST['film'];
        echo " ".$_POST['duree'];
       
        $result_client= $_POST['user'];
        $result_film= $_POST['film'];
        $result_duree= $_POST['duree'];
        $result_date= $_POST['date'];
        $result_date2= $_POST['date2'];

    
        $sql4 = "INSERT INTO t_location (ID_client,ID_film,TEMPS,D_location,D_rendu) VALUES ('$result_client','$result_film','$result_duree','$result_date','$result_date2')";
        $result=$connect->query($sql4);}


?>
    <a href="http://localhost/bd-exercice/index.php">Liste des film</a>
</body>
</html>