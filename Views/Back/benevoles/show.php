<?php
require_once('../../../Controller/BenevoleController.php');
require_once('../../../Model/Benevole.php');

$benevoleController = new BenevoleController();
if (isset($_POST['reference']) && isset($_POST['description']) && isset($_POST['date_debut']) && isset($_POST['date_fin'])) {
    $benevole = new  Benevole($_POST['reference'], $_POST['description'], new DateTime($_POST['date_debut']), new DateTime($_POST['date_fin']));
    $benevoleController->updateBenevole($benevole, $_POST['id']);
    header('Location:index.php');
}
?>

<?php include_once '../header.php'; ?>
    <h3><i class="fa fa-angle-right"></i> Modifier infos bénévolat</h3>
<?php
if (isset($_GET['id'])) {
    $benevole = $benevoleController->getBenevoleById($_GET['id']);
    if ($benevole !== false) {
        ?>
        <form class="form-horizontal style-form" action="" method="POST" enctype="multipart/form-data">
            <input type="text" class="form-control hidden" name="id" value=" <?php echo $benevole['id'] ?>">
            <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Référence</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="reference"
                           value="<?php echo $benevole['reference']; ?>">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Description</label>
                <div class="col-sm-10">
                    <textarea class="form-control" name="description"
                              rows="5"><?php echo $benevole['description']; ?></textarea>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3">Date Début</label>
                <div class="col-md-3 col-xs-11">
                    <input class="form-control form-control-inline input-medium default-date-picker" size="16"
                           type="date" name="date_debut"
                           value="<?php echo $benevole['date_debut']; ?>">
                    <span class="help-block">Select date</span>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3">Date fin</label>
                <div class="col-md-3 col-xs-11">
                    <input class="form-control form-control-inline input-medium default-date-picker" size="16"
                           type="date" name="date_fin" value="<?php echo $benevole['date_fin']; ?>">
                    <span class="help-block">Select date</span>
                </div>
            </div>

            <div class="form-group">
                <div class="col-lg-offset-2 col-lg-10">
                    <button class="btn btn-theme" type="submit" name="valider">Modifier</button>
                </div>
        </form>
        <?php
    }
} else {
    header('Location:index.php');
}
?>
<?php include_once '../footer.php'; ?>