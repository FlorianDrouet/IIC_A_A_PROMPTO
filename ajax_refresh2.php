<?php
require "include/db.php";

$keyword = '%'.$_POST['keyword'].'%';
$sql = "SELECT * FROM service WHERE region LIKE (:keyword) AND region!='' ORDER BY region ASC LIMIT 0, 10";
$query = $bdd->prepare($sql);
$query->bindParam(':keyword', $keyword, PDO::PARAM_STR);
$query->execute();
$list = $query->fetchAll();
foreach ($list as $rs) {
	// put in bold the written text
	$Client = str_replace($_POST['keyword'], '<b>'.$_POST['keyword'].'</b>', $rs['region']);
	// add new option
    echo '<li onclick="set_item2(\''.$rs['region'].'\')">'.$Client.'</li>';
}
?>