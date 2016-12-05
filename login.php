
<?php
require 'include/db.php';

if (isset($user))
{
    header ('Location:index.php');
    exit();
}

// on teste si le visiteur a soumis le formulaire de connexion
if(isset($_POST))
{
    if(isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['password']) && !empty($_POST['password']))
    {
        $_POST['password'] = sha1($_POST['password'].'#dsqd451FDS_');

        // on teste si une entrée de la base contient ce couple login / pass	
        try
        {
            $req = $bdd->prepare('SELECT * FROM membre WHERE mail=:email AND passe=:mdp');
            $req->bindParam(':email', $_POST['email']);
            $req->bindParam(':mdp', $_POST['password']);
            $req->execute();
            $data = $req->fetch(PDO::FETCH_ASSOC);
        }
        catch(Exception $e)
        {
            die('Erreur login : '.$e->getMessage());
        }            	

        // si on obtient une réponse, alors l'utilisateur est un membre	
        if($data != false)
        {      
            //creation de la session
            session_start();
            $_SESSION['user'] = $_POST['email'].'###___###'.$_POST['password'];

            if ($data['type'] == 'p')						
                header('Location: client.php');			
            else				
                header('Location: index.php');
        }
        else 
            header('Location: index.php');
    }
}
?>