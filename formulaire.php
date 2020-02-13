<?php
    include 'dbe_connect.php';
    $sql="SELECT * FROM t_film WHERE ID=".$_GET['id_film']." ";
    $req = $connect->query($sql);
    $resultrow=$req->fetch(PDO::FETCH_ASSOC);

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
<form action="" method="post">
            <label>Nom film * </label><input type = "text" name = "film" <?php echo "value='".$resultrow['FILM']."'";?>required>
            <label>Date * </label><input type = "text" name = "date" required>
            <label>Durée * </label><input type = "text" name = "duree" required>
            <input class="button" type = "submit" value = "Envoyer">
            <a href="http://localhost/bd-exercice/index.php">Retour</a>
</form>
<?php
    // echo $_GET[id_film];
    if (isset($_POST['film'])){
    $film=$_POST['film'];
    $date=$_POST['date'];
    $duree=$_POST['duree'];
    $id=$_GET['id_film'];
    $sql = "UPDATE t_film SET FILM='$film', ANNEE='$date', DUREE='$duree' WHERE ID='$id';"; 
    $result=$connect->query($sql);}
?>
    
</body>
</html>
