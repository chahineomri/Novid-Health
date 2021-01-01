<?php
require_once('../../../Controller/ActualiteController.php');

$actualiteController = new ActualiteController();

$actualites = $actualiteController->afficherActualite();

if (isset($_GET['id'])) {
    echo $_GET['id'];
    $actualiteController->deleteActualite($_GET['id']);
    header('Location:index.php');
}

?>

<?php include_once '../header.php'; ?>
<h3><i class="fa fa-angle-right"></i> Liste des actualites</h3>
<table class="table table-striped table-bordered" id="example">
    <thead>
    <tr>
        <th>image</th>
        <th>titre</th>
        <th>description</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($actualites as $actualite) { ?>
        <tr>
            <td><img src="../assets/uploads/<?= $actualite['image'] ?>" width="100px" height="100px"/></td>
            <td><?= $actualite['titre'] ?></td>
            <td><?= $actualite['description'] ?></td>
            <td><a href="show.php?id=<?= $actualite['id'] ?>">edit</a>
                <a href="index.php?id=<?= $actualite['id'] ?>">delete</a></td>
        </tr>
    <?php } ?>
    </tbody>
</table>
<a href="add.php">New</a>
<?php include_once '../footer.php'; ?>
<script type="text/javascript">
    $(document).ready(function () {
        var table = $('#example').DataTable();
    });
</script>