<?php
require_once('../../../Controller/ActualiteController.php');
require_once('../../../Model/actualite.php');

$actualiteController =  new ActualiteController();

if (isset($_POST['titre']) && isset($_POST['description'])) {
    $actualite = new Actualite($_POST['titre'],$_POST['description'],$_FILES['image']['name']);
    $actualiteController->addActualite($actualite);
    header('Location:index.php');
}
?>
<?php include_once '../header.php'; ?>
<h3><i class="fa fa-angle-right"></i>Ajouter nouvelle actualités</h3>
<form class="form-horizontal style-form" action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label class="col-sm-2 col-sm-2 control-label">Titre</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="titre">
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 col-sm-2 control-label">Description</label>
        <div class="col-sm-10">
            <textarea class="form-control" name="description" placeholder="Description" rows="5"
                      data-msg="Please write something for us"></textarea>
        </div>
    </div>
    <div class="form-group last">
        <label class="control-label col-md-3">Image</label>
        <div class="col-md-9">
            <div class="fileupload fileupload-new" data-provides="fileupload">
                <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                    <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&text=no+image" alt=""/>
                </div>
                <div class="fileupload-preview fileupload-exists thumbnail"
                     style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                <div>
                        <span class="btn btn-theme02 btn-file">
                          <span class="fileupload-new"><i class="fa fa-paperclip"></i> Select image</span>
                        <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                        <input type="file" class="default" name="image"/>
                        </span>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-lg-offset-2 col-lg-10">
            <button class="btn btn-theme" type="submit" name="valider">Ajouter</button>
        </div>
    </div>
</form>
<?php include_once '../footer.php'; ?>