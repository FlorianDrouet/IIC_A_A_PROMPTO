<?php 
require 'include/db.php';

// on teste si le visiteur a soumis le formulaire
if (isset($_POST) && isset($_POST['Incription'])) 
{
    // on teste l'existence de nos variables. On teste également si elles ne sont pas vides
    if (isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['pass']) && !empty($_POST['pass']) && isset($_POST['pass_confirm']) && !empty($_POST['pass_confirm']) && isset($_POST['nom']) && !empty($_POST['nom']) && isset($_POST['prenom']) && !empty($_POST['prenom']))        
    {
         // on teste les deux mots de passe
        if($_POST['pass'] != $_POST['pass_confirm'])
            $erreur = 'Les 2 mots de passe sont différents.';
        else 
        {  
            try
            {
                // on recherche si ce login est déjà utilisé par un autre membre
                $req = $bdd->prepare('SELECT count(*) AS nb FROM membre WHERE mail=:email');
                $req->bindParam(':email', $_POST['email']);
                $req->execute();
                $data = $req->fetch(PDO::FETCH_ASSOC);                
            }
            catch(Exception $e)
            {
                die('Erreur : ' . $e->getMessage());
            }

            if ($data['nb'] == 0) 
            {
                try
                {
                    $req = $bdd->prepare('INSERT INTO membre (nom, prenom, type, mail, passe) VALUE(:nom, :prenom, :type, :mail, :pass)');
                    $req->bindParam(':nom', $_POST['nom']);
                    $req->bindParam(':prenom', $_POST['prenom']);
                    $req->bindParam(':type', $_POST['type']);
                    $req->bindParam(':mail', $_POST['email']);
                    $req->bindParam(':pass', sha1($_POST['pass_confirm'] . '#dsqd451FDS_'));

                    $req->execute();
                }                
                catch(Exception $e)
                {
                    die('Erreur : ' . $e->getMessage());
                }

                // On connecte le membre
                session_start();
                $_SESSION['user'] = $_POST['email'].'###___###'.$_POST['pass_confirm'];

                $erreur = "Votre compte a été créé.";
            }
            else     
                $erreur = 'Un membre possède déjà cette email.';
        }
    }else
        $erreur = 'Erreur de formulaire.';
}
else 
    $erreur = 'Au moins un des champs est vide.';

if(isset($erreur))
    echo $erreur;

header('Location:'.$_SERVER['HTTP_REFERER']);
?>