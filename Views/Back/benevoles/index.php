<?php
require_once('../../../Controller/BenevoleController.php');
$benevoleController = new BenevoleController();
$benevoles = $benevoleController->afficherBenevole();
if (isset($_GET['id'])) {
    $benevoleController->deleteBenevole($_GET['id']);
    header('Location:index.php');
}
?>
<?php include_once '../header.php'; ?>
<h3><i class="fa fa-angle-right"></i> Liste des bénévolats</h3>
<div class="form-group">
    <form action="search.php" method='POST'>
        <div class="input-group">
            <div class="col-md-9">
                <input type="text" class="form-control" name="search" placeholder="Rechercher Bénèvole">
            </div>
            <div class="col-md-3">
                <div class="input-group-append">
                    <button class="btn btn-secondary" type="submit" name="Search">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
<table class="table" id="benevoleTable">
    <thead>
    <tr>
        <th>Référence</th>
        <th>Description</th>
        <th>Date début</th>
        <th>Date Fin</th>
        <th>Action</th>
    </tr>
    </thead>
    <?php foreach ($benevoles as $benevole) { ?>
        <tbody id="result">
        <tr>
            <td hidden><?= $benevole['id'] ?></td>
            <td><?= $benevole['reference'] ?></td>
            <td><?= $benevole['description'] ?></td>
            <td><?= $benevole['date_debut'] ?></td>
            <td><?= $benevole['date_fin'] ?></td>
            <td><a href="show.php?id=<?= $benevole['id'] ?>">edit</a>
                <a href="index.php?id=<?= $benevole['id'] ?>">delete</a></td>
        </tr>
        </tbody>
    <?php } ?>
</table>
<a href="add.php">New</a>
<?php include_once '../footer.php'; ?>
<script type="text/javascript" src="../assets/Js/benevoles.js"></script>
