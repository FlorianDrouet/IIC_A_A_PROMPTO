<?php
$db_name = 'genie_logiciel';
$db_user = 'root';
$db_pass = 'root';
$db_host = 'localhost';

try
{
	$bdd = new PDO('mysql:host='.$db_host.'; dbname='.$db_name, $db_user, $db_pass, 
		array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
	$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(Exception $e)
{
	die('Erreur : '.$e->getMessage());
}
?>