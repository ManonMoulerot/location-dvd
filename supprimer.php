<?php
    include 'dbe_connect.php';

    $update="DELETE FROM t_film WHERE ID=".$_GET['id_film']." ";
	$stmt = $connect->prepare($update);
	$stmt->execute();
	header("Location:index.php");
?>