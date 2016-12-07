<?php 
require 'include/session.php';

// S'il n'est pas connecté
if(!isset($user) || !isset($_GET['idService']))
{
    header('location: index.php');
    exit;
}

// On récupère le calendrier du service
try
{
    $req = $bdd->prepare("SELECT c.id FROM calendar AS c LEFT JOIN service AS s ON s.id_service = c.id_service WHERE id_service=:idService");
    $req->bindParam(':idService', $_GET['idService']);
    $req->execute();

    if(!$req->rowCount())
    {
        header('location: index.php');
        exit;
    }
    $data = $req->fetch(PDO::FETCH_ASSOC);
    $idCalendrier = $data['id'];
}
catch(Exception $e)
{
    die('sql get calendar : '.$e->getMessage());
}

// Gestion formulaire
if(isset($_POST) && isset($_POST['submit']))
{
    if(isset($_POST['date']) && !empty($_POST['date']) && isset($_POST['heure']) && isset($_POST['minute']))
    {
        $planning->ajouterRDV($_POST, $user);
        $msg = 'Le rendez-vous a été pris.';
    }
    else
        $msg = "Erreur formulaire.";
}

$sessionInclude = true;
$title = "Prendrez un rendez-vous";
require 'include/header.php'; ?>
<div id="fh5co-car" class="fh5co-section-gray">
    <div class="container" style="padding-top: 70px">
        <div class="row">
            <center>  
                <?= isset($msg) ? $msg : ''; ?>
                <form method="POST" action=""> 
                    <div class="input-field">
                        <label for="date-start">Date du rendez-vous (Jour/Mois/Année => format : JJ/MM/AAAA)</label>
                        <input type="text" class="form-control" name="date" placeholder="JJ/MM/AAAA"/>   
                    </div>      
                    <div class="input-field">
                        <label for="date-start">Choix horaire</label>
                        <select name="heure">
                            <?php for($i = 0; $i < 23; $i++) : ?>
                                <option value="<?= $i; ?>"><?= $i; ?>h</option>
                            <?php endfor; ?>
                        </select>
                        <select name="minute">
                            <?php for($i = 0; $i < 4; $i++) : ?>
                                <option value="<?= ($i*15); ?>"><?= ($i*15); ?></option>
                            <?php endfor; ?>
                        </select>
                    </div>
                    <input type="submit" name="submit" class="btn btn-primary btn-block" value="Valider le rendez-vous">
                </form>   
            </center>
        </div>
        <div class="row" style="margin-top:20px;">
            <div class="col-xs-12">
                <div id="calendar"></div>
            </div>
        </div>
        <div id="fullCalModal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span> <span class="sr-only">close</span></button>
                        <h4 id="modalTitle" class="modal-title"></h4>
                    </div>
                    <div id="modalBody" class="modal-body"></div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <a class="btn btn-primary" id="eventUrl" target="_blank">Event Page</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require 'include/footer.php'; ?>