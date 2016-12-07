<?php 

require 'include/session.php';

// S'il n'est pas connecté
if(!isset($user))
{
    header('location: index.php');
    exit;
}

// S'il n'est pas un professionnel
if(isset($user) && $user['type'] != 'p')
{
    header('location: index.php');
    exit;
}

// On récupère les données
try
{
    $req = $bdd->prepare('SELECT id, creneau FROM calendar WHERE id_service = :idService');
    $req->bindParam(':idService', $_GET['idService']);
    $req->execute();
    $data = $req->fetch(PDO::FETCH_ASSOC);

    if($req->rowCount()){
        $idCalendrier = $data['id'];
        $heure = ceil($data['creneau'] / 60);
        $minute = $data['creneau'] % 60;
    }
}
catch(Exception $e)
{
    die('Req select agenda : '.$e->getMessage());
}


// Si des données sont postés
if(isset($_POST) && isset($_POST['submit']))
{
    if(isset($_POST['idAgenda']) && !empty($_POST['idAgenda']) && isset($_POST['heure']) && isset($_POST['minute']))
    {
        try
        {
            if(!$req->rowCount())
                $req = $bdd->prepare('INSERT INTO calendar (id, id_membre, creneau) VALUE (:idAgenda, :idMembre, :creneau)');
            else
                $req = $bdd->prepare('UPDATE calendar SET id = :idAgenda, creneau = :creneau WHERE id_membre = :idMembre');

            $creneau = ($_POST['heure'] * 60) + $_POST['minute'];

            $req->bindParam(':creneau', $creneau);
            $req->bindParam(':idMembre', $user['id_membre']);
            $req->bindParam(':idAgenda', $_POST['idAgenda']);

            $req->execute();

            $idCalendrier = $_POST['idAgenda'];
            $minute = $_POST['heure'];
            $heure = $_POST['minute'];
        }
        catch(Exception $e)
        {
            die('Req select agenda : '.$e->getMessage());
        }

        $msg = 'Les données ont été enregistrées.';
    }
    else
        $msg = "Erreur formulaire";
}

$sessionInclude = true;
$title = "Votre agenda";
require 'include/header.php';

?>
<div id="fh5co-car" class="fh5co-section-gray">
    <div class="container" style="padding-top: 70px">
        <div class="row">   
        <?= isset($msg) ? $msg : ''; ?>
            <form method="POST" action ="">
                <div class="col-xs-12">
                    <div class="col-sm-12 mt">
                        <div class="input-field">
                            <label for="class">Votre agenda google</label>
                            <input name="idAgenda" type="text" class="form-control" <?= isset($idCalendrier) ? 'value="'.$idCalendrier.'"' : ''; ?> placeholder="quelquechose@group.calendar.google.com" />
                        </div>
                    </div>
                    <div class="col-sm-12 mt">
                        <div class="input-field">
                            <label for="class">Durée de vos créneaux</label>
                            <select name="heure">
                                <?php for($i = 0; $i < 8; $i++) : ?>
                                    <option <?= isset($heure) && $i == $heure ? 'SELECTED' : ''; ?> value="<?= $i; ?>"><?= $i; ?>h</option>
                                <?php endfor; ?>
                            </select>
                            <select name="minute">
                                <?php for($i = 0; $i < 4; $i++) : ?>
                                    <option <?= isset($minute) && $i == $minute ? 'SELECTED' : ''; ?>  value="<?= ($i*15); ?>"><?= ($i*15); ?></option>
                                <?php endfor; ?>
                            </select>
                        </div>
                    </div>                
                    <div class="col-xs-12">
                        <input type="submit" name="submit" class="btn btn-primary btn-block" value="Enregistrer">
                    </div>
                </div>
            </form>
        </div>
        <div class="row" style="margin-top:20px;">
            <div class="col-xs-12">
                <div id="calendar"></div>
            </div>
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
<?php require 'include/footer.php'; ?>