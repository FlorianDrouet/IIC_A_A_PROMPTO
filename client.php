<?php 
$title = "Prendrez un rendez-vous";
require 'include/header.php'; ?>
<div id="fh5co-car" class="fh5co-section-gray">
    <div class="container" style="padding-top: 70px">
        <div class="row">
            <div class="col-xs-12">                
                <div class="input-field">
                    <label for="date-start">Choix horaire</label>
                    <select name="heure">
                        <?php for($i = 8; $i < 13; $i++) : ?>
                            <option value="<?= $i; ?>"><?= $i; ?>h</option>
                        <?php endfor; ?>
                        <?php for($i = 14; $i < 19; $i++) : ?>
                            <option value="<?= $i; ?>"><?= $i; ?>h</option>
                        <?php endfor; ?>
                    </select>
                    <select name="minute">
                        <?php for($i = 0; $i < 4; $i++) : ?>
                            <option value="<?= ($i*15); ?>"><?= ($i*15); ?></option>
                        <?php endfor; ?>
                    </select>
                </div>
                <input type="submit" class="btn btn-primary btn-block" value="Go">
           </div>
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