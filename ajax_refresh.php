<?php
require "include/db.php";

$keyword = '%'.$_POST['keyword'].'%';
$sql = "SELECT nom_categ FROM categorie WHERE nom_categ LIKE (:keyword) ORDER BY nom_categ ASC LIMIT 0, 10";
$query = $bdd->prepare($sql);
$query->bindParam(':keyword', $keyword, PDO::PARAM_STR);
$query->execute();
$list = $query->fetchAll();
foreach ($list as $rs) {
	// put in bold the written text
	$Client = str_replace($_POST['keyword'], '<b>'.$_POST['keyword'].'</b>', $rs['nom_categ']);
	// add new option
    echo '<li onclick="set_item(\''.$rs['nom_categ'].'\')">'.$Client.'</li>';
}
?>