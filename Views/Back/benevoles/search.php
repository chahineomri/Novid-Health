<?php
require_once('../../../Controller/BenevoleController.php');
$benevoleController =  new BenevoleController();
if (isset($_POST['search'])){
    $benevoles = $benevoleController->searchBenevole();
}
if (isset($_GET['id'])) {
    $benevoleController->deleteBenevole($_GET['id']);
    header('Location:index.php');
}
?>
<?php include_once '../header.php'; ?>
<h3><i class="fa fa-angle-right"></i> Liste des bénévolats</h3>
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
        <tbody>
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
<a href="add.php">Ajouter</a><br>
<a href="index.php">Retour</a>
<?php include_once '../footer.php'; ?>

