<?php
require '../include/db.php';
require "chat_modele.php";
 
if(isset($_GET['name']) && isset($_GET['message']))  
    ajout_message($bdd, $_GET['name'], $_GET['message']);  
else
{
    expire_message($bdd);
    $message = message($bdd);
    require "chat_vue.php";
} 
?>