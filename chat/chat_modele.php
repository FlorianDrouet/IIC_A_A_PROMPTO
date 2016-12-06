<?php
function ajout_message($bdd, $pseudo, $message)
{
    try
    {
        $req = $bdd->prepare("INSERT INTO message(Pseudo,Message,Date, destination) VALUE(:Pseudo,:Message,NOW(),'test')");
        $req->execute(array("Pseudo" => $pseudo, "Message" => $message));
    }
    catch(Exception $e)
    {
        die('add chat mes : '.$e->getMessage());
    }    
}
 
function message($bdd)
{
    $req = $bdd->query("SELECT * FROM message ORDER BY Date DESC");     
    return $req;
}
 
function expire_message($bdd)
{     
    $req = $bdd->query("DELETE FROM message WHERE Date < DATE_SUB(NOW(), INTERVAL 30 MINUTE)");     
}
 
function pair($nombre)
{
    if ($nombre%2 == 0) return true;
    else return false;
}
 
function getRelativeTime($date) {
    // Déduction de la date donnée à la date actuelle
    $time = time() - strtotime($date); 
 
    // Calcule si le temps est passé ou à venir
    if ($time > 0) {
        $when = "il y a";
    } else if ($time < 0) {
        $when = "dans environ";
    } else {
        return "il y a 1 seconde";
    }
    $time = abs($time); 
 
    // Tableau des unités et de leurs valeurs en secondes
    $times = array( 31104000 =>  'an{s}',       // 12 * 30 * 24 * 60 * 60 secondes
                    2592000  =>  'mois',        // 30 * 24 * 60 * 60 secondes
                    86400    =>  'jour{s}',     // 24 * 60 * 60 secondes
                    3600     =>  'heure{s}',    // 60 * 60 secondes
                    60       =>  'minute{s}',   // 60 secondes
                    1        =>  'seconde{s}'); // 1 seconde         
 
    foreach ($times as $seconds => $unit) {
        // Calcule le delta entre le temps et l'unité donnée
        $delta = round($time / $seconds); 
 
        // Si le delta est supérieur à 1
        if ($delta >= 1) {
            // L'unité est au singulier ou au pluriel ?
            if ($delta == 1)
                $unit = str_replace('{s}', '', $unit);
            else 
                $unit = str_replace('{s}', 's', $unit);
            
            // Retourne la chaine adéquate
            return $when." ".$delta." ".$unit;
        }
    }
}
?>